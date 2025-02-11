<?php

namespace App\Filament\Resources\CourseQuizQuestionResource\Pages;

use App\Filament\Resources\CourseQuizQuestionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCourseQuizQuestions extends ListRecords
{
    protected static string $resource = CourseQuizQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
