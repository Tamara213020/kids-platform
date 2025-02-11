<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseQuizQuestionResource\Pages;
use App\Filament\Resources\CourseQuizQuestionResource\RelationManagers;
use App\Filament\Resources\CourseQuizQuestionResource\RelationManagers\CourseQuizQuestionAnswersRelationManager;
use App\Models\CourseQuizQuestion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseQuizQuestionResource extends Resource
{
    protected static ?string $model = CourseQuizQuestion::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    protected static bool $shouldRegisterNavigation = false;

    public static function getModelLabel(): string
    {
        return __('resources.labels.course_quiz_question');
    }

    public static function getPluralModelLabel(): string
    {
        return __('resources.labels.course_quiz_questions');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('course_quiz_id')
                    ->relationship('courseQuiz', 'id')
                    ->label(__('resources.fields.course_quiz'))
                    ->required(),
                Forms\Components\Textarea::make('question')
                    ->label(__('resources.fields.question'))
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('points')
                    ->label(__('resources.fields.points'))
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('courseQuiz.id')
                    ->label(__('resources.fields.course_quiz'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('points')
                    ->label(__('resources.fields.points'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('resources.fields.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('resources.fields.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label(__('resources.actions.view')),
                Tables\Actions\EditAction::make()->label(__('resources.actions.edit')),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->label(__('resources.actions.delete')),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            CourseQuizQuestionAnswersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCourseQuizQuestions::route('/'),
            'create' => Pages\CreateCourseQuizQuestion::route('/create'),
            'view' => Pages\ViewCourseQuizQuestion::route('/{record}'),
            'edit' => Pages\EditCourseQuizQuestion::route('/{record}/edit'),
        ];
    }
}
