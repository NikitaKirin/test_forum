@extends('layouts.app')
@section('title', __($post->title))
@section('main')
    <h1>Название: {{ $post->title }}</h1>
    <p>Описание: {{ $post->description }}</p>
    <p>Автор: {{ $post->user->name }}</p>
    <a href="{{ route('posts.edit', ['post' => $post]) }}" class="btn btn-primary">Изменить тему</a>
    <a href="{{ route('posts.destroy', ['post' => $post]) }}" class="btn btn-danger" rel="nofollow">Удалить тему</a>
@endsection
