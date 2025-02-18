<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseQuiz extends Model
{
    use HasFactory;

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function courseQuizQuestions(): HasMany
    {
        return $this->hasMany(CourseQuizQuestion::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'course_quiz_users', 'course_quiz_id', 'user_id')
            ->withPivot('score');
    }
}
