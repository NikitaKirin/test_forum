<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
