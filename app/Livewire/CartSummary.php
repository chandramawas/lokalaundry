<?php

namespace App\Livewire;

use App\Models\Cart;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use App\Models\Wallet;
use App\Models\ProductTransaction;
use DB;

class CartSummary extends Component
{
    use LivewireAlert;

    public $items;
    public $subtotal;
    public $totalQuantity;

    protected $listeners = [
        'cartUpdated' => 'loadCart',
        'confirmedPayment' => 'processPayment',
    ];

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

    public function confirmPayment()
    {
        $wallet = Wallet::where('user_id', auth()->id())->first();

        if (!$wallet || $wallet->balance < $this->subtotal) {
            $this->alert('error', 'Saldo tidak cukup untuk melakukan pembayaran');
            return;
        }

        $this->confirm('Apakah kamu yakin ingin melanjutkan pembayaran?', [
            'confirmButtonText' => 'Ya, Bayar',
            'onConfirmed' => 'confirmedPayment',
        ]);
    }

    public function processPayment()
    {
        DB::beginTransaction();

        try {
            $wallet = Wallet::where('user_id', auth()->id())->first();

            if (!$wallet || $wallet->balance < $this->subtotal) {
                $this->alert('error', 'Saldo tidak cukup untuk melakukan pembayaran');
                return;
            }

            // Buat transaksi
            $transaction = ProductTransaction::create([
                'user_id' => auth()->id(),
                'code' => uniqid(),
                'subtotal' => $this->subtotal,
            ]);

            // Masukin item produk
            foreach ($this->items as $item) {
                $transaction->items()->create([
                    'product_id' => $item->product->id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);
            }

            // Potong saldo wallet
            $wallet->balance -= $this->subtotal;
            $wallet->save();

            // Kosongin keranjang
            Cart::where('user_id', auth()->id())->delete();

            DB::commit();

            $this->flash(
                'success',
                'Pembayaran berhasil!',
                [],
                route('product.detail', $transaction->code)
            );
        } catch (\Exception $e) {
            DB::rollBack();

            dd($e);
            $this->alert('error', 'Terjadi kesalahan saat memproses pembayaran!');
        }
    }

    public function render()
    {
        return view('livewire.cart-summary');
    }
}
