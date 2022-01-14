<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules(): array {
        return [
            "email"    => ["required", "email", "unique:users"],
            "name"     => ["required", "string"],
            "password" => ["string"],
        ];
    }

    public function authorize(): bool {
        return true;
    }
}
