<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Carbon\Carbon;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class RecentBookings extends BaseWidget
{
    protected static ?int $sort = 2;
    protected int|string|array $columnSpan = 'full';

    protected function getTableQuery(): Builder
    {
        return Booking::query()
            ->latest()
            ->with(['user', 'outlet'])
            ->limit(10);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('user.name')
                ->label('User'),

            Tables\Columns\TextColumn::make('outlet.name')
                ->label('Outlet'),

            Tables\Columns\TextColumn::make('session')
                ->label('Sesi')
                ->state(function ($record) {
                    $date = Carbon::parse($record->date)->format('d M Y');
                    $start = Carbon::parse($record->session_start)->format('H:i');
                    $end = Carbon::parse($record->session_end)->format('H:i');

                    return "{$date} {$start} - {$end}";
                }),
            Tables\Columns\TextColumn::make('created_at')
                ->label('Tanggal Booking')
                ->date('d M Y H:i'),

            Tables\Columns\TextColumn::make('subtotal')
                ->label('Total')
                ->money('IDR'),
        ];
    }
}
