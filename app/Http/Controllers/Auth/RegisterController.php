<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    // Выводим страницу с формой регистрации
    public function index() {
        return view('auth.registration-form');
    }

    // Регистрируем нового пользователя, для валидации используется "формальный запрос"
    public function register( RegisterRequest $request ) {
        $user = new User([
            "name"     => $request->input('name'),
            "email"    => $request->input("email"),
            "password" => $request->input("password"),
        ]);
    }
}
