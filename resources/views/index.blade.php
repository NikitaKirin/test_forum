@extends('layouts.app')
@section('title', __('Тестовый форум'))
@section('main')
    <form>
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="password">
        </div>
        <button type="submit" class="btn btn-primary">Войти</button>
    </form>
@endsection
