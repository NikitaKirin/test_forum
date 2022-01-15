@extends('layouts.app')
@section('title', __('Список всех тем'))
@section('main')
    <h1>Все доступные темы:</h1>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название темы</th>
            <th scope="col">Количество комментариев</th>
            <th scope="col">Создатель</th>
            <th scope="col">Дата создания / последнего обновления</th>
        </tr>
        </thead>
        <tbody>
        @for($i=0; $i < count($posts); $i++)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>
                    <a href="{{ route('posts.show', ['post' => $posts[$i]]) }}">
                        {{ $posts[$i]->title }}
                    </a>
                </td>
                <td>{{ $posts[$i]->comments()->count() }}</td>
                <td>
                    <a href="{{ route('users.show', ['user' => $posts[$i]->user]) }}">
                        {{ $posts[$i]->user->name }}
                    </a>
                </td>
                <td>
                    {{ $posts[$i]->updated_at }}
                </td>
            </tr>
        @endfor
        </tbody>
    </table>
@endsection
