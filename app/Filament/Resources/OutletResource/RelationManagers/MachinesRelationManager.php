<?php

namespace App\Filament\Resources\OutletResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;

class MachinesRelationManager extends RelationManager
{
    protected static string $relationship = 'machines';

    protected static ?string $icon = 'heroicon-o-cog-8-tooth';
    protected static ?string $title = 'Mesin';

    public ?array $machineTypeDetails = null;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('number')
                    ->label('Nomor Mesin')
                    ->required()
                    ->placeholder('W-01')
                    ->maxLength(255),

                Select::make('status')
                    ->label('Status')
                    ->native(false)
                    ->required()
                    ->options([
                        'available' => 'Tersedia',
                        'maintenance' => 'Rusak'
                    ])
                    ->default('available'),

                Select::make('machine_type_id')
                    ->label('Tipe Mesin')
                    ->required()
                    ->native(false)
                    ->relationship('machineType', 'name')
                    ->preload()
                    ->searchable()
                    ->reactive()
                    ->columnSpanFull()
                    ->afterStateUpdated(function ($state) {
                        $machineType = \App\Models\MachineType::find($state);

                        if ($machineType) {
                            $this->machineTypeDetails = [
                                'Nama' => $machineType->name,
                                'Tipe' => $machineType->type == 'w' ? 'Mesin Cuci' : 'Pengering',
                                'Kapasitas' => $machineType->capacity ? $machineType->capacity . 'Kg' : '-',
                                'Harga' => 'Rp ' . number_format($machineType->price, 0, ',', '.'),
                            ];
                        } else {
                            $this->machineTypeDetails = null;
                        }
                    })
                    ->afterStateHydrated(function ($state) { // 👈 Biar detailnya langsung muncul waktu edit
                        $machineType = \App\Models\MachineType::find($state);

                        if ($machineType) {
                            $this->machineTypeDetails = [
                                'Nama' => $machineType->name,
                                'Tipe' => $machineType->type == 'w' ? 'Mesin Cuci' : 'Pengering',
                                'Kapasitas' => $machineType->capacity ? $machineType->capacity . 'Kg' : '-',
                                'Harga' => 'Rp ' . number_format($machineType->price, 0, ',', '.'),
                            ];
                        } else {
                            $this->machineTypeDetails = null;
                        }
                    }),

                Placeholder::make('machine_type_detail')
                    ->label('Detail Tipe Mesin')
                    ->columnSpanFull()
                    ->content(function () {
                        if (!$this->machineTypeDetails) {
                            return 'Belum ada tipe mesin yang dipilih.';
                        }

                        $rows = collect($this->machineTypeDetails)->map(function ($value, $key) {
                            return "
                                <tr class='border-b last:border-none'>
                                    <td class='py-2 pr-4 font-medium'>{$key}</td>
                                    <td class='py-2'>{$value}</td>
                                </tr>
                            ";
                        })->implode('');

                        return new HtmlString("
                            <table class='table w-full text-sm'>
                                <tbody>{$rows}</tbody>
                            </table>
                        ");
                    })
                    ->visible(fn() => filled($this->machineTypeDetails)),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('number')
            ->columns([
                TextColumn::make('number')->label('No. Mesin')->weight('bold')->searchable(),
                TextColumn::make('machineType.name')->label('Nama Mesin')->searchable(),
                TextColumn::make('machineType.type')->label('Tipe')
                    ->formatStateUsing(fn($state) => $state == 'w' ? 'Mesin Cuci' : 'Pengering'),
                TextColumn::make('machineType.capacity')->label('Kapasitas')->suffix('Kg'),
                TextColumn::make('machineType.price')->label('Harga')->money('idr'),
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
                SelectFilter::make('machineType.type')
                    ->label('Tipe Mesin')
                    ->native(false)
                    ->options([
                        'w' => 'Mesin Cuci',
                        'd' => 'Pengering',
                    ])
                    ->modifyQueryUsing(function ($query, $data) {
                        if ($data['value']) {
                            $query->whereHas('machineType', function ($q) use ($data) {
                                $q->where('type', $data['value']);
                            });
                        }
                    }),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\Action::make('Set Tersedia')
                        ->icon('heroicon-o-check-circle')
                        ->requiresConfirmation()
                        ->color('success')
                        ->visible(fn($record) => $record->status === 'maintenance')
                        ->action(function ($record) {
                            $record->update(['status' => 'available']);
                        }),

                    Tables\Actions\Action::make('Set Rusak')
                        ->icon('heroicon-o-x-circle')
                        ->requiresConfirmation()
                        ->color('danger')
                        ->visible(fn($record) => $record->status === 'available')
                        ->action(function ($record) {
                            $record->update(['status' => 'maintenance']);
                        }),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
