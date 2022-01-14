<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(): array {
        return [
            "email"    => ['required', 'email'],
            "password" => ["required", "string"],
        ];
    }

    public function messages(): array {
        return [
            "required" => "Данное поле обязательно для заполнения",
            "email"    => "Введен некорректный email",
            "string"   => "Данное поле должно быть строкой",
        ];
    }

    public function authorize(): bool {
        return true;
    }
}
