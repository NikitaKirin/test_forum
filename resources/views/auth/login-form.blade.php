@extends('layouts.app')
@section('title', __('Войти'))
@section('main')
    <div class="row">
        <form method="post" action="{{ route('login') }}" class="col-12 col-md-4 mt-3 m-auto">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                       aria-describedby="emailHelp" value="{{ old('email') }}" autofocus name="email">
                @error('email')
                <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                       value="{{ old('password') }}" name="password">
                @error('password')
                <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;">Войти</button>
        </form>
    </div>
@endsection
