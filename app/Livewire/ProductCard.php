<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;

class ProductCard extends Component
{
    public string $name;
    public ?string $image;
    public int $price;
    public int $quantity = 0;

    protected $listeners = ['cartUpdated' => 'refreshQuantity'];

    public function mount($name, $image = null, $price)
    {
        $this->name = $name;
        $this->image = $image;
        $this->price = $price;

        $product = Product::where('name', $this->name)->first();

        if ($product && auth()->check()) {
            $cartItem = Cart::where('user_id', auth()->id())
                ->where('product_id', $product->id)
                ->first();

            if ($cartItem) {
                $this->quantity = $cartItem->quantity;
            }
        }
    }

    public function refreshQuantity()
    {
        $product = Product::where('name', $this->name)->first();

        if ($product && auth()->check()) {
            $cartItem = Cart::where('user_id', auth()->id())
                ->where('product_id', $product->id)
                ->first();

            $this->quantity = $cartItem?->quantity ?? 0;
        }
    }

    public function increment()
    {
        $userId = auth()->id();

        $product = Product::where('name', $this->name)->first();

        $cartItem = Cart::firstOrCreate([
            'user_id' => $userId,
            'product_id' => $product->id
        ]);

        $cartItem->increment('quantity');

        $this->quantity = $cartItem->quantity;
        $this->dispatch('cartUpdated');
    }

    public function decrement()
    {
        $userId = auth()->id();

        $product = Product::where('name', $this->name)->first();

        $cartItem = Cart::where('user_id', $userId)->where('product_id', $product->id)->first();

        if ($cartItem && $cartItem->quantity > 1) {
            $cartItem->decrement('quantity');
            $this->quantity = $cartItem->quantity;
        } elseif ($cartItem) {
            $cartItem->delete();
            $this->quantity = 0;
        }

        $this->dispatch('cartUpdated');
    }

    public function render()
    {
        return view('livewire.product-card');
    }
}
