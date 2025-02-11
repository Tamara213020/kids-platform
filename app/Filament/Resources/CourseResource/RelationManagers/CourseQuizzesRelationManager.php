<?php

namespace App\Filament\Resources\CourseResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class CourseQuizzesRelationManager extends RelationManager
{
    protected static string $relationship = 'courseQuizzes';

    public static function getTitle(\Illuminate\Database\Eloquent\Model $ownerRecord, string $pageClass): string
    {
        return __('resources.labels.course_quizzes');
    }


    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('min_points')
                ->label(__('resources.fields.min_points'))
                ->required()
                ->numeric(),
            Forms\Components\Textarea::make('goal')
                ->label(__('resources.fields.goal'))
                ->required(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('min_points')
                ->label(__('resources.fields.min_points'))
                ->sortable(),
            Tables\Columns\TextColumn::make('goal')
                ->label(__('resources.fields.goal'))
                ->wrap(),
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
