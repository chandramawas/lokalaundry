<?php

namespace App\Livewire\Wallet;

use App\Models\Wallet;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\TopUp;

class WalletTopUp extends Component
{
    use LivewireAlert;

    public $selectedAmount = 0;
    public $orderId;

    protected $listeners = [
        'paymentSuccess' => 'handleSuccess',
        'paymentPending' => 'handlePending',
        'paymentError' => 'handleError',
        'paymentClosed' => 'handleClosed',
    ];

    public function selectAmount($amount)
    {
        $this->selectedAmount = $amount;
    }

    public function initiatePayment()
    {
        // Config Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $this->orderId = 'T' . auth()->id() . '-' . uniqid();

        $topUp = TopUp::create([
            'user_id' => auth()->id(),
            'amount' => $this->selectedAmount,
            'status' => 'pending',
            'order_id' => $this->orderId,
        ]);

        // Snap Payload
        $params = [
            'transaction_details' => [
                'order_id' => $this->orderId,
                'gross_amount' => $this->selectedAmount,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'phone' => '+62' . auth()->user()->phone,
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        $topUp->update([
            'snap_token' => $snapToken,
        ]);

        $this->dispatch('midtrans-payment', snapToken: $snapToken);
    }

    public function handleSuccess($result)
    {
        $this->updateTopUp($result, 'success');

        // Tambah saldo
        $wallet = Wallet::firstOrCreate(['user_id' => auth()->id()]);
        $wallet->balance += $this->selectedAmount;
        $wallet->save();

        $topUp = TopUp::where('order_id', $result['order_id'])->first();
        $this->flash('success', 'Top Up berhasil!', [], route('topup.detail', $topUp->order_id));
    }

    public function handleError($result)
    {
        $this->updateTopUp($result, 'failed');
        $this->alert('error', 'Pembayaran gagal.');
    }

    private function updateTopUp($result, $status)
    {
        $topUp = TopUp::where('order_id', $result['order_id'])->first();

        if ($topUp) {
            $topUp->update([
                'status' => $status,
                'payment_type' => $result['payment_type'] ?? null,
                'transaction_id' => $result['transaction_id'] ?? null,
            ]);
        }
    }

    public function handleClosed()
    {
        if ($this->orderId) {
            $topUp = TopUp::where('order_id', $this->orderId)->first();

            if ($topUp && $topUp->status === 'pending') {
                $topUp->delete();
                $this->alert('info', 'Pembayaran dibatalkan.');
            }

            // Reset state
            $this->orderId = null;
        }
    }

    public function render()
    {
        return view('livewire.wallet.wallet-top-up');
    }
}
