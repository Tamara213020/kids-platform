<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseQuizQuestion extends Model
{
    //
    public function courseQuiz(): BelongsTo
    {
        return $this->belongsTo(CourseQuiz::class);
    }

    public function courseQuizQuestionAnswers(): HasMany
    {
        return $this->hasMany(CourseQuizQuestionAnswer::class);
    }
}
