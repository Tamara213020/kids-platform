<?php

namespace App\Filament\Resources\CourseResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Table;

class UsersRelationManager extends RelationManager
{
    protected static string $relationship = 'users';

    protected static ?string $recordTitleAttribute = 'name';

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')
                ->label('Име')
                ->required()
                ->maxLength(255),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('resources.fields.name'))
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->label(__('resources.fields.email'))
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('resources.fields.created_at'))
                    ->dateTime()
                    ->sortable(),
            ])
            ->headerActions([
                AttachAction::make()
                    ->label('Поврзи')
                    ->modalHeading('Поврзи корисник')
                    ->modalDescription('Дали сте сигурни дека сакате да го поврзете корисникот?')
                    ->modalSubmitActionLabel('Потврди')
                    ->preloadRecordSelect()
                    ->form(function (AttachAction $action): array {
                        return [
                            $action->getRecordSelect(),
                        ];
                    }),

            ])
            ->actions([
                Tables\Actions\DetachAction::make()
                    ->label('Отстрани')
                    ->modalHeading('Отстрани корисник')
                    ->modalDescription('Дали сте сигурни дека сакате да го отстраните корисникот?')
                    ->modalSubmitActionLabel('Потврди'),
            ]);
    }
}
