<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules(): array {
        return [
            "email"    => ["required", "email", "unique:users"],
            "name"     => ["required", "string"],
            "password" => ["required", "string"],
        ];
    }

    public function messages(): array {
        return [
            "required"     => "Данное поле обязательно для заполнения",
            "email"        => "Введен некорректный email",
            "email.unique" => "Данный email уже занят",
            "string"       => "Введены недопустимые символы",
        ];
    }

    public function authorize(): bool {
        return true;
    }
}
