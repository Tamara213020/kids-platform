<?php

namespace App\Filament\Resources\ChallengeResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ChallengeCodePartsRelationManager extends RelationManager
{
    protected static string $relationship = 'challengeCodeParts';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('code')
                    ->label(__('resources.fields.code'))
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->label(__('resources.fields.code')),
            ])
            ->filters([

            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label(__('resources.actions.create')),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label(__('resources.actions.edit')),
                Tables\Actions\DeleteAction::make()
                    ->label(__('resources.actions.delete')),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label(__('resources.actions.delete')),
                ]),
            ])
            ->reorderable('order')
            ->defaultSort('order');
    }
}
