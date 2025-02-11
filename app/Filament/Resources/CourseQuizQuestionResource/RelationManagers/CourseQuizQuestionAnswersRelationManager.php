<?php

namespace App\Filament\Resources\CourseQuizQuestionResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class CourseQuizQuestionAnswersRelationManager extends RelationManager
{
    protected static string $relationship = 'courseQuizQuestionAnswers';

    public static function getModelLabel(): string
    {
        return __('resources.labels.course_quiz_question_answer');
    }

    public static function getPluralModelLabel(): string
    {
        return __('resources.labels.course_quiz_questions_answers');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('answer')
                    ->label(__('resources.fields.answer'))
                    ->required(),
                Forms\Components\Checkbox::make('correct')
                    ->label(__('resources.fields.correct'))
                    ->default(false),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('answer')
            ->columns([
                Tables\Columns\TextColumn::make('answer')
                    ->label(__('resources.fields.answer'))
                    ->sortable(),
                Tables\Columns\BooleanColumn::make('correct')
                    ->label(__('resources.fields.correct'))
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label(__('resources.actions.edit')),
                Tables\Actions\DeleteAction::make()->label(__('resources.actions.delete')),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
