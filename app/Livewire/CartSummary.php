<?php

namespace App\Livewire;

use App\Models\Cart;
use Livewire\Component;

class CartSummary extends Component
{
    public $items;
    public $subtotal;
    public $totalQuantity;

    protected $listeners = ['cartUpdated' => 'loadCart'];

    public function mount()
    {
        $this->loadCart();
    }

    public function loadCart()
    {
        $userId = auth()->id();

        $this->items = Cart::with('product')->where('user_id', $userId)->get();
        $this->subtotal = $this->items->sum(fn($item) => $item->product->price * $item->quantity);
        $this->totalQuantity = $this->items->sum('quantity');
    }

    public function clearCart()
    {
        Cart::where('user_id', auth()->id())->delete();
        $this->loadCart();
        $this->dispatch('cartUpdated');
    }

    public function render()
    {
        return view('livewire.cart-summary');
    }
}
