@extends('layouts.app')
@section('title', __("Главная страница"))
@section('main')
    <div class="alert alert-primary" role="alert">
        {{ $user->name }}, добро пожаловать на форум!
    </div>
@endsection
