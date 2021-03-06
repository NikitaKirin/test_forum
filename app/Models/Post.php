<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
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

    //Акцессор для преобразования формата timestamp у атрибута "updated_at"
    public function getUpdatedAtAttribute( $value ): string {
        return Carbon::parse($value)->format('d.m.Y / H:i');
    }
}
