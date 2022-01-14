@extends('layouts.app')
@section('title', __($post->title))
@section('main')
    <h1>Название: {{ $post->title }}</h1>
    <p>Описание: {{ $post->description }}</p>
    <p>Автор: {{ $post->user->name }}</p>
@endsection
