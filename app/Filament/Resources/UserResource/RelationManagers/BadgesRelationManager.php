<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Models\Badge;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BadgesRelationManager extends RelationManager
{
    protected static string $relationship = 'badges';

    protected static ?string $title = 'Badges';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('badge_id')
                    ->label('Badge')
                    ->options(Badge::all()->pluck('name', 'id')) // Prikazhuva ime na badge
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('badges')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Badge Name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('color_hash')
                    ->label('Color Code')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Assigned At')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
