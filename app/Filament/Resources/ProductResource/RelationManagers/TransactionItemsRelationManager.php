<?php

namespace App\Filament\Resources\ProductResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransactionItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'transactionItems';

    public function isReadOnly(): bool
    {
        return true;
    }

    protected static ?string $title = 'Transaksi Produk';
    protected static ?string $icon = 'heroicon-o-receipt-refund';


    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('transaction.code')
            ->columns([
                TextColumn::make('transaction.code')->label('Kode Pengambilan')->weight('bold')->searchable(),
                TextColumn::make('transaction.user.name')->label('Pemesan')->searchable(),
                TextColumn::make('quantity')->label('Kuantitas')->suffix('pcs')->sortable(),
                TextColumn::make('price')->label('Harga (Hanya Produk)')->badge()->sortable()
                    ->formatStateUsing(fn($state, $record) => 'Rp ' . number_format($state * $record->quantity, 0, ',', '.')),
                IconColumn::make('transaction.status')->label('Pengambilan')
                    ->icon(fn($state) => $state ? 'heroicon-o-check-circle' : 'heroicon-o-x-circle')
                    ->color(fn($state) => $state ? 'success' : 'gray'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('transaction.status')
                    ->label('Status Pengambilan')
                    ->options([
                        '1' => 'Sudah Diambil',
                        '0' => 'Belum Diambil',
                    ])
                    ->query(function (Builder $query, array $data) {
                        if (isset($data['value'])) {
                            $query->whereHas('transaction', function ($q) use ($data) {
                                $q->where('status', $data['value']);
                            });
                        }
                    }),
            ]);
    }
}
