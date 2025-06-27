<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Filament\Resources\ProductResource\RelationManagers\TransactionItemsRelationManager;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationGroup = 'Aset';
    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $modelLabel = 'Produk';
    protected static ?string $navigationIcon = 'heroicon-o-gift-top';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->label('Nama Poduk')->maxLength(255)->required()
                    ->placeholder('Molto Sachet 40ml'),
                TextInput::make('price')->label('Harga')->numeric()->prefix('Rp')->required()
                    ->placeholder('3000'),
                FileUpload::make('image')->label('Foto Produk')->directory('product_image')
                    ->image()->imageEditor(),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->label('Foto')->square()->size(50)
                    ->defaultImageUrl(asset('images/placeholder.jpg')),
                TextColumn::make('name')->label('Nama Produk')->searchable(),
                TextColumn::make('price')->label('Harga')->money('idr')->badge()->sortable(),
                TextColumn::make('transaction_items_sum_quantity')->label('Total Penjualan')->sortable()->default(0)
                    ->sum('transactionItems', 'quantity')->suffix('pcs')
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Informasi Produk')
                    ->collapsible()
                    ->icon('heroicon-o-information-circle')
                    ->columns(2)
                    ->schema([
                        ImageEntry::make('image')->hiddenLabel()
                            ->defaultImageUrl(asset('images/placeholder.jpg')),
                        TextEntry::make('id')->label('ID Produk')->badge(),
                        TextEntry::make('name')->label('Nama Produk'),
                        TextEntry::make('price')->label('Harga')->money('idr')->badge(),
                        TextEntry::make('created_at')->label('Data Dibuat'),
                        TextEntry::make('updated_at')->label('Data Diperbarui'),
                    ]),

                Section::make('Ringkasan Penjualan')
                    ->collapsed()
                    ->icon('heroicon-o-chart-bar-square')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('total_sold')->label('Total Penjualan')->suffix('pcs')
                            ->getStateUsing(fn($record) => $record->transactionItems()->sum('quantity')),
                        TextEntry::make('total_revenue')->label('Pendapatan')->money('idr')->badge()
                            ->getStateUsing(
                                fn($record) =>
                                $record->transactionItems->sum(fn($item) => $item->quantity * $item->price)
                            ),
                        TextEntry::make('last_30_days_sold')->label('Penjualan 30 Hari Terakhir')->suffix('pcs')
                            ->getStateUsing(fn($record) => $record->transactionItems()
                                ->where('created_at', '>=', now()->subDays(30))->sum('quantity')),
                        TextEntry::make('last_30_days_revenue')->label('Pendapatan 30 Hari Terakhir')->money('idr')->badge()
                            ->getStateUsing(
                                fn($record) => $record->transactionItems()->where('created_at', '>=', now()->subDays(30))
                                    ->get()->sum(fn($item) => $item->quantity * $item->price),
                            ),
                    ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            TransactionItemsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'view' => Pages\ViewProduct::route('/{record}'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
