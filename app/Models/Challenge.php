<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Challenge extends Model
{
    public function challengeCodeParts(): HasMany
    {
        return $this->hasMany(ChallengeCodePart::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'challenge_users', 'challenge_id', 'user_id');
    }
}
