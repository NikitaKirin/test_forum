@extends('layouts.app')
@section('title', __('Тестовый форум'))
@section('main')
    <div style="max-width: 400px; margin: 15px auto 0 auto;">
        <form method="post" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                       aria-describedby="emailHelp" value="{{ old('name') }}">
                @error('email')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                       value="{{ old('password') }}">
                @error('password')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
            <a href="{{ route('index.register') }}" class="btn btn-primary">Зарегистрироваться</a>
        </form>
    </div>
@endsection
