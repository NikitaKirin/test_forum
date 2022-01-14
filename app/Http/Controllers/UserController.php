<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Выводим главную страницу для авторизованных пользователей
    public function index() {
        return view('home', ["user" => Auth::user()]);
    }
}
