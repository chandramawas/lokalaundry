<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OutletResource\Pages;
use App\Filament\Resources\OutletResource\RelationManagers;
use App\Filament\Resources\OutletResource\RelationManagers\BookingsRelationManager;
use App\Filament\Resources\OutletResource\RelationManagers\MachinesRelationManager;
use App\Models\Outlet;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
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

class OutletResource extends Resource
{
    protected static ?string $model = Outlet::class;

    protected static ?string $navigationGroup = 'Aset';
    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $modelLabel = 'Outlet';
    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->label('Nama')->required()->unique()->maxLength(255)
                    ->placeholder('Outlet Jakarta 1'),
                TextInput::make('address')->label('Alamat')->required()->maxLength(255)
                    ->placeholder('Jl. RS Fatmawati Raya No.24'),
                TextInput::make('city')->label('Kota')->required()->maxLength(255)
                    ->datalist(Outlet::query()->pluck('city')->unique()->values()->toArray())
                    ->placeholder('Jakarta'),
                TextInput::make('phone')->label('No. Telepon')->prefix('+62')->required()->maxLength(255)
                    ->placeholder('81234567890')->numeric(),
                Select::make('session_duration')->label('Durasi Sesi')->required()->native(false)
                    ->options([
                        25 => '25 Menit',
                        55 => '55 Menit',
                    ])->default(55),
                Select::make('session_gap')->label('Jeda Sesi')->required()->native(false)
                    ->options([
                        5 => '5 Menit',
                    ])->default(5),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nama')->searchable(),
                TextColumn::make('address')->label('Alamat')->wrap(),
                TextColumn::make('city')->label('Kota'),
                TextColumn::make('phone')->label('No. Telepon')->prefix('+62'),
                TextColumn::make('session_duration')->label('Durasi Sesi')->suffix(' Menit'),
                TextColumn::make('machines_count')->label('Total Mesin')->counts('machines')->suffix(' Mesin')->sortable(),
            ])
            ->filters([
                SelectFilter::make('city')
                    ->label('Kota')
                    ->options(Outlet::query()->pluck('city', 'city')->unique()->toArray())
                    ->searchable(),
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                ]),
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
                Section::make('Informasi Outlet')
                    ->collapsible()
                    ->icon('heroicon-o-information-circle')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('id')->label('ID Outlet')->badge()->columnSpanFull(),
                        TextEntry::make('name')->label('Nama'),
                        TextEntry::make('address')->label('Alamat'),
                        TextEntry::make('city')->label('Kota'),
                        TextEntry::make('phone')->label('Nomor Telepon')->prefix('+62 '),
                        TextEntry::make('session_duration')->label('Durasi per Sesi')->suffix(' Menit'),
                        TextEntry::make('session_gap')->label('Jeda per Sesi')->suffix(' Menit'),
                        TextEntry::make('created_at')->label('Data Dibuat'),
                        TextEntry::make('updated_at')->label('Data Diperbarui'),
                    ]),

                Section::make('Ringkasan Mesin')
                    ->collapsed()
                    ->icon('heroicon-o-cog-8-tooth')
                    ->columns(5)
                    ->schema([
                        TextEntry::make('machines_count')
                            ->label('Total Mesin')
                            ->state(fn($record) => $record->machines()->count()),
                        TextEntry::make('washing_machines_count')
                            ->label('Mesin Cuci')
                            ->state(fn($record) => $record->machines()->whereHas('machineType', function ($query) {
                                $query->where('type', 'w');
                            })->count()),
                        TextEntry::make('dryer_machines_count')
                            ->label('Pengering')
                            ->state(fn($record) => $record->machines()->whereHas('machineType', function ($query) {
                                $query->where('type', 'd');
                            })->count()),
                        TextEntry::make('available_machines_count')
                            ->label('Mesin Aktif')->color('success')
                            ->state(fn($record) => $record->machines()->where('status', 'available')->count()),
                        TextEntry::make('maintenance_machines_count')
                            ->label('Mesin Rusak')->color('danger')
                            ->state(fn($record) => $record->machines()->where('status', 'maintenance')->count()),
                    ]),

                Section::make('Ringkasan Booking')
                    ->collapsed()
                    ->icon('heroicon-o-clipboard-document-check')
                    ->columns(3)
                    ->schema([
                        TextEntry::make('total_revenue')
                            ->label('Total Pendapatan')->badge()->color('primary')
                            ->state(fn($record) => 'Rp' . number_format($record->bookings()->sum('subtotal'), 0, ',', '.')),
                        TextEntry::make('total_booking_last_30_days')
                            ->label('Total Booking 30 Hari Terakhir')->badge()->color('success')
                            ->state(fn($record) => $record->bookings()
                                ->where('date', '>=', now()->subDays(30))
                                ->count() . ' Booking'),
                        TextEntry::make('total_revenue_last_30_days')
                            ->label('Total Pendapatan 30 Hari Terakhir')->badge()->color('success')
                            ->state(fn($record) => 'Rp' . number_format($record->bookings()
                                ->where('date', '>=', now()->subDays(30))
                                ->sum('subtotal'), 0, ',', '.')),
                    ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            MachinesRelationManager::class,
            BookingsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOutlets::route('/'),
            'create' => Pages\CreateOutlet::route('/create'),
            'view' => Pages\ViewOutlet::route('/{record}'),
            'edit' => Pages\EditOutlet::route('/{record}/edit'),
        ];
    }
}
