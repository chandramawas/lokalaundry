<?php

namespace App\Filament\Resources\MachineTypeResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MachinesRelationManager extends RelationManager
{
    protected static string $relationship = 'machines';

    public function isReadOnly(): bool
    {
        return true;
    }

    protected static ?string $icon = 'heroicon-o-cog-8-tooth';
    protected static ?string $title = 'Mesin';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('number')
            ->columns([
                TextColumn::make('number')->label('No. Mesin')->weight('bold')->searchable(),
                TextColumn::make('outlet.name')->label('Outlet')->searchable(),
                TextColumn::make('status')->label('Status')->badge()
                    ->formatStateUsing(fn($state) => $state == 'available' ? 'Tersedia' : 'Rusak')
                    ->color(fn($state) => $state == 'available' ? 'success' : 'danger'),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->native(false)
                    ->options([
                        'available' => 'Tersedia',
                        'maintenance' => 'Rusak',
                    ]),

                SelectFilter::make('outlet_id')
                    ->label('Outlet')
                    ->relationship('outlet', 'name')
                    ->searchable()
                    ->preload(),
            ]);
    }
}
