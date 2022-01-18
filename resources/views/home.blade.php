@extends('layouts.app')
@section('title', __("Главная страница"))
@section('main')
    <div class="alert alert-primary" role="alert">
        {{ \Illuminate\Support\Facades\Auth::user()->name }}, добро пожаловать на форум!
    </div>
    <ul>
        <li>Количество созданных тем: {{ \Illuminate\Support\Facades\Auth::user()->posts()->count() }}</li>
        <li>Количество написанных комментариев: {{ \Illuminate\Support\Facades\Auth::user()->comments()->count() }}</li>
    </ul>
    @include('inc.user-edit-form')
@endsection
