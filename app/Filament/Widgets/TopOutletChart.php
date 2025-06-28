<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Carbon\Carbon;
use DB;
use Filament\Widgets\ChartWidget;

class TopOutletChart extends ChartWidget
{
    protected static ?int $sort = 4;
    protected static ?string $heading = 'Top 5 Outlet Paling Laris (7 Hari Terakhir)';

    protected function getData(): array
    {
        $outlets = Booking::query()
            ->whereBetween('date', [Carbon::now()->subDays(6), Carbon::now()]) // 7 hari terakhir termasuk hari ini
            ->select('outlet_id', DB::raw('SUM(subtotal) as total_income'))
            ->groupBy('outlet_id')
            ->orderByDesc('total_income')
            ->with('outlet')
            ->limit(5)
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Total Pendapatan (Rp)',
                    'data' => $outlets->pluck('total_income'),
                    'backgroundColor' => '#3b82f6', // Warna biru cakep
                ],
            ],
            'labels' => $outlets->pluck('outlet.name'), // Pastikan relasi outlet ada
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
