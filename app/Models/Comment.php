<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'text',
    ];

    // Создаем обратную связь "один-ко-многим" с сущностью User.
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    // Создаем обратную связь "один-ко-многим" с сущностью Post
    public function post(): BelongsTo {
        return $this->belongsTo(Post::class);
    }

    //Акцессор для преобразования формата timestamp у атрибута "updated_at"
    public function getUpdatedAtAttribute( $value ): string {
        return Carbon::parse($value)->format('d.m.Y / H:i');
    }
}
