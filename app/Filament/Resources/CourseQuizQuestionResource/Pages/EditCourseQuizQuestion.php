<?php

namespace App\Filament\Resources\CourseQuizQuestionResource\Pages;

use App\Filament\Resources\CourseQuizQuestionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCourseQuizQuestion extends EditRecord
{
    protected static string $resource = CourseQuizQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
