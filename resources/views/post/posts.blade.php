@extends('layouts.app')
@section('title', __('Список всех тем'))
@section('main')
    <h1>Все доступные темы:</h1>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название темы</th>
            <th scope="col">Создатель</th>
        </tr>
        </thead>
        <tbody>
        @for($i=1; $i <= count($posts); $i++)
            <tr>
                <td>{{ $i }}</td>
                <td>
                    <a href="{{ route('posts.show', ['post' => $posts[$i-1]->id]) }}">
                        {{ $posts[$i-1]->title }}
                    </a>
                </td>
                <td>{{ $posts[$i-1]->user->name }}</td>
            </tr>
        @endfor
        </tbody>
    </table>
@endsection
