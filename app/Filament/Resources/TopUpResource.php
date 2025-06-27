<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TopUpResource\Pages;
use App\Models\TopUp;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TopUpResource extends Resource
{
    protected static ?string $model = TopUp::class;

    protected static ?string $navigationGroup = 'Transaksi';
    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'order_id';
    protected static ?string $modelLabel = 'Top Up';
    protected static ?string $navigationIcon = 'heroicon-o-wallet';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('order_id')
                    ->label('Order ID')
                    ->disabled(),

                Forms\Components\Select::make('user_id')
                    ->label('User')
                    ->relationship('user', 'name')
                    ->disabled(),

                Forms\Components\TextInput::make('amount')
                    ->label('Jumlah')
                    ->disabled()
                    ->prefix('Rp'),

                Forms\Components\TextInput::make('payment_type')
                    ->label('Tipe Pembayaran')
                    ->disabled(),

                Forms\Components\TextInput::make('transaction_id')
                    ->label('Transaction ID')
                    ->disabled(),

                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'success' => 'Sukses',
                        'failed' => 'Gagal',
                    ])
                    ->required(),

                Forms\Components\TextInput::make('created_at')
                    ->label('Data Dibuat')
                    ->disabled(),

                Forms\Components\TextInput::make('updated_at')
                    ->label('Data Diperbarui')
                    ->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order_id')->label('Order ID')->searchable()->copyable()->weight('bold'),
                TextColumn::make('user.name')->label('User')->searchable(),
                TextColumn::make('amount')->label('Jumlah')->money('IDR'),
                TextColumn::make('payment_type')->label('Tipe Pembayaran')->badge(),
                TextColumn::make('status')->label('Status')->badge()
                    ->color(fn($state) => match ($state) {
                        'pending' => 'warning',
                        'success' => 'success',
                        'failed' => 'danger',
                    }),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'success' => 'Sukses',
                        'failed' => 'Gagal',
                    ])
                    ->label('Status')
                    ->native(false),
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\Action::make('setSuccess')
                        ->label('Set Sukses')
                        ->icon('heroicon-o-check-circle')
                        ->requiresConfirmation()
                        ->color('success')
                        ->visible(fn($record) => in_array($record->status, ['pending', 'failed']))
                        ->action(function ($record) {
                            $record->update(['status' => 'success']);
                            session()->flash('notification', 'Status berhasil diubah menjadi sukses.');
                        }),
                    ViewAction::make(),
                ])
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageTopUps::route('/'),
        ];
    }
}
