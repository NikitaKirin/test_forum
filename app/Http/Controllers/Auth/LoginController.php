<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index() {
        return view('auth.login-form');
    }

    public function login( LoginRequest $request ): RedirectResponse {
        $validated = $request->safe()->only(['email', 'password']);
        if ( Auth::attempt($validated) ) {
            $user = User::where('email', $validated['email'])->get()->first();
            Auth::login($user);
            return redirect()->route('users.home')->with('success', 'Вы успешно вошли в систему!');
        }

        return redirect()->back()->withErrors('Введен неверный email или пароль')
                         ->withInput(['email' => $request->input('email')]);
    }
}
