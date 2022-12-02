<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function author():BelongsTo
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
}
