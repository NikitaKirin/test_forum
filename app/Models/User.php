<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Мутатор для хеширования пароля пользователя
    public function setPasswordAttribute( $value ) {
        $this->attributes['password'] = Hash::make($value);
    }

    // Прямая связь "один-ко-многим" с сущностью Post (Тема).
    public function posts(): HasMany {
        return $this->hasMany(Post::class);
    }

    // Прямая связь "один-ко-многим" с сущностью Comment (Комментарий темы).
    public function comments(): HasMany {
        return $this->hasMany(Comment::class);
    }
}
