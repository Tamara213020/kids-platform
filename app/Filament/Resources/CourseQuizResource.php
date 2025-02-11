<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseQuizResource\Pages;
use App\Filament\Resources\CourseQuizResource\RelationManagers;
use App\Filament\Resources\CourseQuizResource\RelationManagers\CourseQuizQuestionsRelationManager;
use App\Models\CourseQuiz;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseQuizResource extends Resource
{
    protected static ?string $model = CourseQuiz::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard';

    protected static bool $shouldRegisterNavigation = false;

    public static function getModelLabel(): string
    {
        return __('resources.labels.course_quiz');
    }

    public static function getPluralModelLabel(): string
    {
        return __('resources.labels.course_quizzes');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('course_id')
                    ->relationship('course', 'title')
                    ->label(__('resources.fields.course'))
                    ->required(),
                Forms\Components\TextInput::make('min_points')
                    ->label(__('resources.fields.min_points'))
                    ->required()
                    ->numeric(),
                Forms\Components\Textarea::make('goal')
                    ->label(__('resources.fields.goal'))
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('course.title')
                    ->label(__('resources.fields.course'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('min_points')
                    ->label(__('resources.fields.min_points'))
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
                Tables\Actions\ViewAction::make()
                    ->label(__('resources.actions.view')),
                Tables\Actions\EditAction::make()
                    ->label(__('resources.actions.edit')),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label(__('resources.actions.delete')),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            CourseQuizQuestionsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCourseQuizzes::route('/'),
            'create' => Pages\CreateCourseQuiz::route('/create'),
            'view' => Pages\ViewCourseQuiz::route('/{record}'),
            'edit' => Pages\EditCourseQuiz::route('/{record}/edit'),
        ];
    }
}
