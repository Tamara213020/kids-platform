<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChallengeCodePart extends Model
{
    public function challenge(): BelongsTo
    {
        return $this->belongsTo(Challenge::class);
    }
}
