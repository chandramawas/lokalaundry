<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use App\Models\ProductTransaction;
use App\Models\TopUp;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $today = Carbon::today();

        // Total booking hari ini
        $bookingTotal = Booking::query()
            ->whereDate('date', $today)
            ->count();

        // Ambil semua transaksi produk hari ini
        $productTransactions = ProductTransaction::query()
            ->whereDate('created_at', $today)
            ->with('items')
            ->get();
        $totalProductsSold = $productTransactions->sum(function ($transaction) {
            return $transaction->items->sum('quantity');
        });

        // Total top up wallet hari ini
        $totalTopUp = TopUp::query()
            ->whereDate('created_at', $today)
            ->where('status', 'success')
            ->sum('amount');

        // Total saldo wallet yang dipakai buat booking hari ini
        $totalUsedBooking = Booking::query()
            ->whereDate('date', $today)
            ->sum('subtotal');

        // Total saldo wallet yang dipakai buat produk hari ini
        $totalUsedProduct = ProductTransaction::query()
            ->whereDate('created_at', $today)
            ->sum('subtotal');

        // Total saldo wallet yang dipakai hari ini (gabungan)
        $totalUsed = $totalUsedBooking + $totalUsedProduct;

        // Total User
        $totalUsers = User::count();
        $activeUsers = DB::table('sessions')
            ->distinct()
            ->count('user_id');

        return [
            Stat::make('Booking Hari Ini', $bookingTotal)
                ->description('Total booking di sesi hari ini')
                ->color('success'),


            Stat::make('Top Up Hari Ini', 'Rp ' . number_format($totalTopUp, 0, ',', '.'))
                ->description('Total saldo masuk')
                ->color('primary'),

            Stat::make('Saldo Dipakai Hari Ini', 'Rp ' . number_format($totalUsed, 0, ',', '.'))
                ->description('Total saldo yang dibelanjakan')
                ->color('warning'),

            Stat::make('Produk Terjual Hari Ini', $totalProductsSold)
                ->description('Total produk yang terjual')
                ->color('success'),

            Stat::make('Total User', $totalUsers)
                ->description('Total user terdaftar')
                ->color('info'),

            Stat::make('User Aktif', $activeUsers)
                ->description('User yang sedang aktif')
                ->color('info'),
        ];
    }
}