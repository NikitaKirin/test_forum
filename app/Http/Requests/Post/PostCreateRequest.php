<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
{
    public function rules(): array {
        return [
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ];
    }

    public function messages(): array {
        return [
            'required'  => 'Данное поле обязательно для заполнения',
            'string'    => 'Введены недопустимые символы',
            'title.max' => 'Превышен допустимый лимит: :max символов',
        ];
    }

    public function authorize(): bool {
        return true;
    }
}
