<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Course extends Model
{
    use HasFactory;

    protected $appends = [
        'image_full_url'
    ];
    public function imageFullUrl(): Attribute
    {
        return Attribute::get(fn() => Storage::url($this->attributes['image_url']));
    }
    public function lectures(): HasMany
    {
        return $this->hasMany(Lecture::class);
    }

    public function courseQuizzes(): HasMany
    {
        return $this->hasMany(CourseQuiz::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'course_users', 'course_id', 'user_id');
    }
}
