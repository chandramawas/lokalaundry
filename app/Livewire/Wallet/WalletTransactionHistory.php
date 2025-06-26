<?php

namespace App\Livewire\Wallet;

use App\Models\Booking;
use App\Models\ProductTransaction;
use App\Models\TopUp;
use Livewire\Component;

class WalletTransactionHistory extends Component
{
    public $selectedMonth;
    public $transactions = [];
    public $allTransactions = [];

    public function mount()
    {
        $userId = auth()->id();

        // Top Up History
        $topUps = TopUp::where('user_id', $userId)
            ->where('status', 'success')
            ->get()
            ->map(function ($item) {
                return [
                    'type' => 'income',
                    'title' => 'Isi Saldo',
                    'subtitle' => $item->order_id,
                    'date' => $item->created_at,
                    'amount' => $item->amount,
                    'href' => route('topup.detail', $item->order_id),
                ];
            });

        // Booking History
        $bookings = Booking::where('user_id', $userId)
            ->get()
            ->map(function ($item) {
                return [
                    'type' => 'expense',
                    'title' => 'Booking',
                    'subtitle' => $item->code,
                    'date' => $item->created_at,
                    'amount' => $item->subtotal,
                    'href' => route('booking.detail', $item->code),
                ];
            });

        // Product Tran History
        $productTransactions = ProductTransaction::where('user_id', $userId)
            ->get()
            ->map(function ($item) {
                return [
                    'type' => 'expense',
                    'title' => 'Transaksi Produk',
                    'subtitle' => $item->code,
                    'date' => $item->created_at,
                    'amount' => $item->subtotal,
                    'href' => route('product.detail', $item->code),
                ];
            });

        // Menggabungkan semua data
        $this->allTransactions = collect($topUps)
            ->merge($bookings)
            ->merge($productTransactions)
            ->sortByDesc('date')
            ->values()
            ->toArray();

        $this->selectedMonth = now()->format('m');
        $this->filterTransactions();
    }

    public function getMonthsProperty()
    {
        return collect([
            now()->subMonths(2),
            now()->subMonths(1),
            now(),
        ])->map(function ($date) {
            return [
                'month' => $date->format('m'),
                'label' => $date->isSameMonth(now()) ? 'Bulan Ini' : $date->translatedFormat('F Y'),
            ];
        })->values();
    }

    public function selectMonth($month)
    {
        $this->selectedMonth = $month;
        $this->filterTransactions();
    }

    public function filterTransactions()
    {
        $this->transactions = collect($this->allTransactions)
            ->filter(function ($transaction) {
                return \Carbon\Carbon::parse($transaction['date'])->format('m') == $this->selectedMonth;
            })
            ->sortByDesc('date')
            ->values()
            ->map(function ($item) {
                $item['date'] = \Carbon\Carbon::parse($item['date'])->format('d F Y');
                return $item;
            })
            ->toArray();
    }

    public function render()
    {
        return view('livewire.wallet.wallet-transaction-history');
    }
}
