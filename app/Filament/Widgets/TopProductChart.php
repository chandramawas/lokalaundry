<?php

namespace App\Filament\Widgets;

use App\Models\ProductTransactionItem;
use Carbon\Carbon;
use DB;
use Filament\Widgets\ChartWidget;

class TopProductChart extends ChartWidget
{
    protected static ?int $sort = 5;
    protected static ?string $heading = 'Top 5 Produk Paling Laku (7 Hari Terakhir)';

    protected function getData(): array
    {
        $topProducts = ProductTransactionItem::query()
            ->whereHas('transaction', function ($query) {
                $query->whereBetween('created_at', [Carbon::now()->subDays(6), Carbon::now()]);
            })
            ->select('product_id', DB::raw('SUM(quantity) as total_sold'))
            ->groupBy('product_id')
            ->orderByDesc('total_sold')
            ->with('product') // pastikan relasi product sudah ada
            ->limit(5)
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Total Terjual (Qty)',
                    'data' => $topProducts->pluck('total_sold'),
                    'backgroundColor' => '#f59e0b', // warna orange cakep
                ],
            ],
            'labels' => $topProducts->pluck('product.name'), // pastikan relasi product ada
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
