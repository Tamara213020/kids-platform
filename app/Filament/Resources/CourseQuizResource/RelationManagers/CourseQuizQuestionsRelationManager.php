<?php

namespace App\Filament\Resources\CourseQuizResource\RelationManagers;

use App\Models\CourseQuizQuestion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class CourseQuizQuestionsRelationManager extends RelationManager
{
    protected static string $relationship = 'courseQuizQuestions';

    protected static ?string $recordTitleAttribute = 'question';

    public static function getModelLabel(): string
    {
        return __('resources.labels.course_quiz_question');
    }

    public static function getPluralModelLabel(): string
    {
        return __('resources.labels.course_quiz_questions');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('question')
                    ->label(__('resources.fields.question'))
                    ->required(),
                Forms\Components\TextInput::make('points')
                    ->label(__('resources.fields.points'))
                    ->numeric()
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('question')
            ->columns([
                Tables\Columns\TextColumn::make('question')
                    ->label(__('resources.fields.question'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('points')
                    ->label(__('resources.fields.points'))
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\Action::make('view')
                    ->action(fn (CourseQuizQuestion $record) => redirect(route('filament.admin.resources.course-quiz-questions.view', $record))),
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
