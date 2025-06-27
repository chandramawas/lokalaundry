<?php

namespace App\Filament\Resources\OutletResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookingsRelationManager extends RelationManager
{
    protected static string $relationship = 'bookings';

    public function isReadOnly(): bool
    {
        return true;
    }

    protected static ?string $icon = 'heroicon-o-clipboard-document-check';
    protected static ?string $title = 'Booking';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('code')
            ->columns([
                TextColumn::make('code')->label('Kode')->weight('bold')->searchable(),
                TextColumn::make('user.name')->label('Pelanggan')->searchable(),
                TextColumn::make('date')->label('Tanggal')->sortable(),
                TextColumn::make('session_start')->label('Mulai'),
                TextColumn::make('session_end')->label('Selesai'),
                TextColumn::make('subtotal')->label('Subtotal')->money('IDR')->sortable(),
                TextColumn::make('bookingMachines.machine.number')
                    ->label('Mesin')
                    ->badge()
                    ->separator(', ')
                    ->listWithLineBreaks(),
            ])
            ->filters([
                Filter::make('Upcoming')
                    ->query(fn($query) => $query->where('date', '>=', now()))
                    ->label('Akan Datang')
                    ->default(true),
            ]);
    }
}
