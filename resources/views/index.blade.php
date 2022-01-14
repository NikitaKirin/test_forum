@extends('layouts.app')
@section('title', __('Тестовый форум'))
@section('main')
    <p>Чтобы просматривать список тем необходимо <a href="{{ route('login') }}">войти</a> или <a
            href="{{ route('register') }}">зарегистрироваться</a>.</p>
@endsection
