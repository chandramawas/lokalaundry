<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
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

    protected static ?string $title = 'Booking';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')->label('Kode Booking')->weight('bold'),
                Tables\Columns\TextColumn::make('outlet.name')->label('Outlet'),
                Tables\Columns\TextColumn::make('date')->label('Tanggal')->sortable(),
                Tables\Columns\TextColumn::make('session_start')->label('Mulai'),
                Tables\Columns\TextColumn::make('session_end')->label('Selesai'),
                Tables\Columns\TextColumn::make('subtotal')->label('Subtotal')->money('idr'),
                Tables\Columns\TextColumn::make('bookingMachines.machine.number')
                    ->label('Mesin')
                    ->badge()
                    ->separator(', ')
                    ->listWithLineBreaks(),
            ]);
    }
}
