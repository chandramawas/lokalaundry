<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TopUpsRelationManager extends RelationManager
{
    protected static string $relationship = 'topUps';

    public function isReadOnly(): bool
    {
        return true;
    }

    protected static ?string $title = 'Top Up';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order_id')->label('Order ID')->weight('bold'),
                Tables\Columns\TextColumn::make('amount')->label('Jumlah')->money('idr'),
                Tables\Columns\TextColumn::make('payment_type')->label('Metode Pembayaran')->badge(),
                Tables\Columns\TextColumn::make('status')->label('Status')->badge()
                    ->color(fn($state) => match ($state) {
                        'pending' => 'warning',
                        'success' => 'success',
                        'failed' => 'danger',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('created_at')->label('Tanggal')->dateTime(),
            ]);
    }
}
