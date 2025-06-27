<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers\BookingsRelationManager;
use App\Filament\Resources\UserResource\RelationManagers\FeedbackRelationManager;
use App\Filament\Resources\UserResource\RelationManagers\ProductTransactionsRelationManager;
use App\Filament\Resources\UserResource\RelationManagers\TopUpsRelationManager;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationGroup = 'Pelanggan';
    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $modelLabel = 'User';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('avatar')->columnSpanFull()
                    ->label('Avatar')
                    ->image()
                    ->directory('user_avatar')
                    ->imageEditor(),

                TextInput::make('name')->label('Nama')->required(),
                Toggle::make('is_admin')->label('Admin')->inline(false),

                TextInput::make('email')->label('Email')->email()->required(),
                TextInput::make('phone')->label('Nomor HP')->required()->prefix('+62 '),

                TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->dehydrateStateUsing(fn($state) => filled($state) ? Hash::make($state) : null)
                    ->dehydrated(fn($state) => filled($state))
                    ->required(fn(string $context) => $context === 'create'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('avatar')->label('Avatar')->circular()->size(50)
                    ->defaultImageUrl(fn($record) => 'https://ui-avatars.com/api/?name=' . urlencode($record->name) . '&background=random&size=150'),
                TextColumn::make('name')->label('Nama')->searchable()->icon(fn($record) => $record->is_admin ? 'heroicon-o-building-library' : '')
                    ->iconColor(fn($record) => $record->is_admin ? 'primary' : '')
                    ->color(fn($record) => $record->is_admin ? 'primary' : ''),
                TextColumn::make('email')->label('Email')->searchable(),
                IconColumn::make('email_verified_at')->label('Verifikasi Email')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('gray'),
                TextColumn::make('phone')->label('Nomor HP')->searchable()->prefix('+62 '),
                IconColumn::make('is_admin')->label('Admin')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('gray'),
            ])
            ->filters([])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
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
                Section::make('Detail User')
                    ->icon('heroicon-o-user-circle')
                    ->columns(2)
                    ->schema([
                        ImageEntry::make('avatar')->hiddenLabel()->columnSpanFull()->alignCenter()->circular()
                            ->defaultImageUrl(fn($record) => 'https://ui-avatars.com/api/?name=' . urlencode($record->name) . '&background=random&size=150'),
                        TextEntry::make('id')->label('ID User')->hiddenLabel()->badge()->columnSpanFull()->alignCenter(),
                        TextEntry::make('name')->label('Nama')
                            ->icon(fn($record) => $record->is_admin ? 'heroicon-o-building-library' : '')
                            ->iconColor(fn($record) => $record->is_admin ? 'primary' : '')
                            ->color(fn($record) => $record->is_admin ? 'primary' : ''),
                        TextEntry::make('email')->label('Email'),
                        TextEntry::make('email_verify')->label('Verifikasi Email')
                            ->state(fn($record) => $record->email_verified_at ? 'Terverifikasi' : 'Belum Diverifikasi'),
                        TextEntry::make('phone')->label('Nomor HP')->prefix('+62 '),
                        TextEntry::make('created_at')->label('Dibuat'),
                        TextEntry::make('updated_at')->label('Diperbarui'),
                    ]),

                Section::make('Wallet')
                    ->icon('heroicon-o-wallet')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('wallet.balance')->label('Saldo')->money('idr')->color('primary')
                    ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            FeedbackRelationManager::class,
            BookingsRelationManager::class,
            ProductTransactionsRelationManager::class,
            TopUpsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
