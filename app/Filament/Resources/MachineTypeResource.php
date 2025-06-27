<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MachineTypeResource\Pages;
use App\Filament\Resources\MachineTypeResource\RelationManagers;
use App\Filament\Resources\MachineTypeResource\RelationManagers\MachinesRelationManager;
use App\Models\MachineType;
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

class MachineTypeResource extends Resource
{
    protected static ?string $model = MachineType::class;

    protected static ?string $navigationGroup = 'Aset';
    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $modelLabel = 'Tipe Mesin';
    protected static ?string $navigationIcon = 'heroicon-o-cog-8-tooth';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->label('Nama Mesin')->maxLength(255)->required()->placeholder('Mesin Cuci 13Kg'),
                Select::make('type')->label('Tipe Mesin')->required()->native(false)
                    ->options([
                        'w' => 'Mesin Cuci',
                        'd' => 'Pengering'
                    ])->default('w'),
                TextInput::make('capacity')->label('Kapasitas')->numeric()->nullable()->suffix('Kg')->placeholder('13'),
                TextInput::make('price')->label('Harga')->numeric()->required()->prefix('Rp')->placeholder('8000'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nama Mesin')->searchable(),
                TextColumn::make('type')->label('Tipe Mesin')->formatStateUsing(fn($state) => $state == 'w' ? 'Mesin Cuci' : 'Pengering'),
                TextColumn::make('capacity')->label('Kapasitas')->suffix(' Kg')->sortable(),
                TextColumn::make('price')->label('Harga')->money('idr')->sortable(),
                TextColumn::make('machines_count')->label('Total Mesin')->counts('machines')->suffix(' Mesin')->sortable(),
            ])
            ->filters([
                SelectFilter::make('type')->label('Tipe Mesin')->native(false)
                    ->options([
                        'w' => 'Mesin Cuci',
                        'd' => 'Pengering'
                    ])
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
                Section::make('Detail Tipe Mesin')
                    ->icon('heroicon-o-information-circle')
                    ->collapsible()
                    ->schema([
                        TextEntry::make('id')->label('ID Tipe')->badge()->columnSpanFull(),
                        TextEntry::make('name')->label('Nama Tipe'),
                        TextEntry::make('type')->label('Tipe')
                            ->formatStateUsing(fn($state) => $state === 'w' ? 'Mesin Cuci' : 'Pengering'),
                        TextEntry::make('capacity')->label('Kapasitas')->suffix('Kg'),
                        TextEntry::make('price')->label('Harga per Mesin')->money('idr'),
                        TextEntry::make('created_at')->label('Data Dibuat'),
                        TextEntry::make('updated_at')->label('Data Diperbarui'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            MachinesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMachineTypes::route('/'),
            'create' => Pages\CreateMachineType::route('/create'),
            'view' => Pages\ViewMachineType::route('/{record}'),
            'edit' => Pages\EditMachineType::route('/{record}/edit'),
        ];
    }
}
