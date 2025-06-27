<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductTransactionResource\Pages;
use App\Filament\Resources\ProductTransactionResource\RelationManagers;
use App\Models\ProductTransaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductTransactionResource extends Resource
{
    protected static ?string $model = ProductTransaction::class;

    protected static ?string $navigationGroup = 'Transaksi';
    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'code';
    protected static ?string $modelLabel = 'Transaksi Produk';
    protected static ?string $navigationIcon = 'heroicon-o-receipt-refund';

    public static function form(Form $form): Form
    {
        return $form;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')->label('Kode')->weight('bold')->searchable(),
                TextColumn::make('user.name')->label('Pelanggan')->searchable(),
                TextColumn::make('created_at')->label('Tanggal')->sortable(),
                TextColumn::make('subtotal')->label('Subtotal')->money('idr')->sortable(),
                TextColumn::make('status')->label('Status')->badge()
                    ->formatStateUsing(fn($state) => $state ? 'Diambil' : 'Belum Diambil')
                    ->color(fn($state) => $state ? 'success' : 'gray'),
            ])
            ->filters([
                SelectFilter::make('status')->label('Status Pengambilan')
                    ->options([
                        1 => 'Diambil',
                        0 => 'Belum Diambil',
                    ])
                    ->native(false)
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Informasi Transaksi')
                    ->collapsible()
                    ->icon('heroicon-o-information-circle')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('code')->label('Kode Transaksi')->badge(),
                        TextEntry::make('user.name')->label('Pelanggan'),
                        TextEntry::make('subtotal')->label('Subtotal')->money('idr'),
                        TextEntry::make('status')->label('Status')->badge()
                            ->formatStateUsing(fn($state) => $state ? 'Diambil' : 'Belum Diambil')
                            ->color(fn($state) => $state ? 'success' : 'gray'),
                        TextEntry::make('created_at')->label('Dibuat Pada'),
                        TextEntry::make('updated_at')->label('Diperbarui Pada'),
                    ]),

                Section::make('Item Produk')
                    ->icon('heroicon-o-list-bullet')
                    ->schema([
                        RepeatableEntry::make('items')
                            ->label('Daftar Produk')
                            ->getStateUsing(fn($record) => $record->items) // Ini udah bener
                            ->schema([
                                TextEntry::make('product.name')->label('Nama Produk'),
                                TextEntry::make('quantity')->label('Jumlah')->suffix('pcs'),
                                TextEntry::make('price')->label('Harga per Item')->money('idr'),
                                TextEntry::make('total')
                                    ->label('Total')
                                    ->money('idr')
                                    ->state(fn($record) => $record['quantity'] * $record['price']),
                            ])
                            ->columns(4),
                    ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductTransactions::route('/'),
            'view' => Pages\ViewProductTransaction::route('/{record}'),
        ];
    }
}
