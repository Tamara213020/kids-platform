<?php

namespace App\Filament\Resources\CourseQuizQuestionResource\Pages;

use App\Filament\Resources\CourseQuizQuestionResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCourseQuizQuestion extends ViewRecord
{
    protected static string $resource = CourseQuizQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
