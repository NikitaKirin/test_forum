<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // Выводим страницу с формой регистрации
    public function index() {
        return view('auth.registration-form');
    }

    // Регистрируем нового пользователя, для валидации используется "формальный запрос"
    public function register( RegisterRequest $request ): RedirectResponse {
        $validated = $request->safe()->only(['name', 'email', 'password']);
        $user = new User($validated);
        if ( !$user->save() ) {
            return redirect()->withErrors('Произошла ошибка при регистрации. Повторите попытку');
        }
        Auth::login($user);

        return redirect()->route('users.home')
                         ->with(['success' => 'Вы успешно зарегистрированы!']);
    }
}
