<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FeedbackRelationManager extends RelationManager
{
    protected static string $relationship = 'feedback';

    public function isReadOnly(): bool
    {
        return true;
    }

    protected static ?string $title = 'Feedback';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('message')->label('Pesan')->wrap(),
                Tables\Columns\TextColumn::make('created_at')->label('Tanggal')->dateTime(),
            ]);
    }
}
