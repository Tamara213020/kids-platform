<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Models\ChallengeUser;
use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;

class ChallengeUserRelationManager extends RelationManager
{
    protected static string $relationship = 'challenges';

    public static function getTitle(\Illuminate\Database\Eloquent\Model $ownerRecord, string $pageClass): string
    {
        return __('resources.labels.challenges');
    }

    public function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('challenge.id')
                    ->label(__('Challenge ID'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('Date'))
                    ->dateTime(),
            ])->query(ChallengeUser::with('challenge'));
    }

    public function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('challenge_id')
                    ->relationship('challenge', 'id')
                    ->required(),
            ]);
    }
}
