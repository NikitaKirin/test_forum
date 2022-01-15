@extends('layouts.app')
@section('title', __("Главная страница"))
@section('main')
    <div class="alert alert-primary" role="alert">
        {{ $user->name }}, добро пожаловать на форум!
    </div>
    <ul>
        <li>Количество созданных тем: {{ $user->posts()->count() }}</li>
        <li>Количество написанных комментариев: {{ $user->comments()->count() }}</li>
    </ul>
    @include('inc.user-edit-form')
@endsection
