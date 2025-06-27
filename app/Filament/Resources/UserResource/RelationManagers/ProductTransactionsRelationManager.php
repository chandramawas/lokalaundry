<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductTransactionsRelationManager extends RelationManager
{
    protected static string $relationship = 'productTransactions';

    public function isReadOnly(): bool
    {
        return true;
    }

    protected static ?string $title = 'Transaksi Produk';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')->label('Kode Transaksi')->weight('bold'),
                Tables\Columns\TextColumn::make('subtotal')->label('Subtotal')->money('idr'),
                Tables\Columns\TextColumn::make('created_at')->label('Tanggal')->dateTime(),
            ]);
    }
}
