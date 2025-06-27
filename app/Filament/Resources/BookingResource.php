<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Models\Booking;
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
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationGroup = 'Transaksi';
    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'code';
    protected static ?string $modelLabel = 'Booking';
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

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
                SelectFilter::make('outlet_id')
                    ->label('Outlet')
                    ->relationship('outlet', 'name')
                    ->preload()
                    ->searchable()
                    ->native(false)
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                ])
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Detail Booking')
                    ->collapsible()
                    ->icon('heroicon-o-information-circle')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('code')->label('Kode Booking')->badge(),
                        TextEntry::make('user.name')->label('Nama Pelanggan'),
                        TextEntry::make('outlet.name')->label('Outlet'),
                        TextEntry::make('date')->label('Tanggal Booking'),
                        TextEntry::make('session')
                            ->label('Sesi')
                            ->state(fn($record) => $record->session_start . ' - ' . $record->session_end),
                        TextEntry::make('subtotal')->label('Subtotal')->money('IDR'),
                        TextEntry::make('created_at')->label('Dibuat pada'),
                        TextEntry::make('updated_at')->label('Diperbarui pada'),
                    ]),

                Section::make('Mesin yang Dibooking')
                    ->icon('heroicon-o-cog-6-tooth')
                    ->collapsible()
                    ->schema([
                        RepeatableEntry::make('bookingMachines')
                            ->label('Daftar Mesin')
                            ->schema([
                                TextEntry::make('machine.number')->label('Nomor Mesin')->badge(),
                                TextEntry::make('machine.machineType.name')->label('Nama Mesin'),
                                TextEntry::make('machine.machineType.price')->label('Harga per Sesi')->money('IDR'),
                            ])
                            ->columns(3)
                            ->columnSpanFull(),
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
            'index' => Pages\ListBookings::route('/'),
            'view' => Pages\ViewBooking::route('/{record}'),
        ];
    }
}
