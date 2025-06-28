<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class WeeklyBookingChart extends ChartWidget
{
    protected static ?int $sort = 3;
    protected static ?string $heading = 'Grafik Booking 7 Hari Terakhir';
    protected int|string|array $columnSpan = 'full';


    protected function getData(): array
    {
        // Ambil 7 hari terakhir
        $startDate = Carbon::now()->subDays(6);
        $endDate = Carbon::now();

        // Siapin array tanggalnya
        $dates = collect();
        for ($date = $startDate->copy(); $date->lte($endDate); $date->addDay()) {
            $dates->put($date->format('d M Y'), 0);
        }

        // Ambil total booking per hari
        $bookings = Booking::query()
            ->selectRaw('DATE(date) as booking_date, COUNT(*) as total')
            ->whereBetween('date', [$startDate, $endDate])
            ->groupBy('booking_date')
            ->orderBy('booking_date')
            ->pluck('total', 'booking_date');

        // Masukin hasilnya ke array tanggal
        foreach ($bookings as $date => $total) {
            $formattedDate = Carbon::parse($date)->format('d M Y');
            if ($dates->has($formattedDate)) {
                $dates[$formattedDate] = $total;
            }
        }

        return [
            'datasets' => [
                [
                    'label' => 'Total Booking',
                    'data' => $dates->values(),
                    'borderColor' => '#10b981', // warna hijau cakep
                    'fill' => false,
                    'tension' => 0.4, // biar line-nya agak melengkung
                ],
            ],
            'labels' => $dates->keys(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getMaxHeight(): string
    {
        return '300px';
    }
}
