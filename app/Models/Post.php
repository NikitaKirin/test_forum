<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    protected $fillable = [
        'title',
        'description',
    ];

    // Устанавливаем обратную связь "один-ко-многим" с сущностью User
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    // Устанавливаем прямую связь "один-ко-многим" с сущностью Comment
    public function comments(): HasMany {
        return $this->hasMany(Comment::class);
    }
}
