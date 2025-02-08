<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CourseQuizQuestionAnswer extends Model
{
    //
    public function courseQuizQuestion(): BelongsTo
    {
        return $this->belongsTo(CourseQuizQuestion::class);
    }
}
