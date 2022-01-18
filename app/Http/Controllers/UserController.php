<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    const USER_RULES = ['name' => 'required|string'];
    const USER_MESSAGES = [
        'required' => 'Данное поле обязательно для заполнения',
        'string'   => 'Введены недопустимые символы',
    ];

    // Вывести главную страницу для авторизованных пользователей
    public function index() {
        return view('home');
    }

    // Изменить свои данные
    public function update( Request $request ): RedirectResponse {
        $validated = $request->validate(self::USER_RULES, self::USER_MESSAGES);
        if ( Auth::user()->update($validated) ) {
            return redirect()->back()->with('success', 'Ваши данные успешно обновлены');
        }
        return redirect()->back()->withErrors('Произошла ошибка. Попробуйте еще раз');
    }

    // Вывести страницу определенного пользователя
    public function show( Request $request, User $user ) {
        if ( Auth::id() == $user->id )
            return redirect()->route('users.home');
        return view('user.user', [
            'user'     => $user,
            "posts"    => $user->posts()->paginate(5),
            "comments" => $user->comments()->paginate(5),
        ]);
    }
}
