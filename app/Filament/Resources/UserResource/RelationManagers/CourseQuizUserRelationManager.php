<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Models\CourseQuizUser;
use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;

class CourseQuizUserRelationManager extends RelationManager
{
    protected static string $relationship = 'passedCourseQuizzes';

    public static function getTitle(\Illuminate\Database\Eloquent\Model $ownerRecord, string $pageClass): string
    {
        return __('resources.labels.quizzes');
    }

    public function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('courseQuiz.id')
                    ->label(__('Quiz ID'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('score')
                    ->label(__('Score')),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('Date'))
                    ->dateTime(),
            ])->query(CourseQuizUser::with('courseQuiz'));
    }

    public function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('course_quiz_id')
                    ->relationship('courseQuiz', 'id')
                    ->required(),
                Forms\Components\TextInput::make('score')
                    ->label(__('Score'))
                    ->numeric()
                    ->required(),
            ]);
    }
}
