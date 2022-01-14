@extends('layouts.app')
@section("title", __('Зарегистрироваться'))
@section('main')
    <div class="row">
        <form method="post" action="{{ route('register') }}" class="col-12 col-md-4 mt-3 m-auto">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">ФИО</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                       value="{{ old('name') }}">
                @error('name')
                <span class="invalid-feedback">
                {{ $message }}
            </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                       aria-describedby="emailHelp" name="email" value="{{ old('email') }}">
                @error('email')
                <span class="invalid-feedback">
                {{ $message }}
            </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                       name="password">
                @error('password')
                <span class="invalid-feedback">
                {{ $message }}
            </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        </form>
    </div>
@endsection
