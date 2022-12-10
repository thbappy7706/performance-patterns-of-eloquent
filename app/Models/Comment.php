<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    public function feature():BelongsTo
    {
        return $this->belongsTo(Feature::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function isAuthor()
    {
        return $this->feature->comments->first()->user_id === $this->user->id;
    }
}
