@extends('layouts.app')
@section('title', __('Мои темы'))
@section('main')
    <h1>Мои темы:</h1>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название темы</th>
            <th scope="col">Количество комментариев</th>
            <th scope="col">Дата и время</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @if(count($posts) < 1)
            <tr>
                <td colspan="5" style="text-align: center; font-size: 20px;"><p class="alert alert-info">Пока
                        что у вас нет ни одной темы</p>
                </td>
            </tr>
        @endif
        @isset($posts)
            @for($i=0; $i < count($posts); $i++)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>
                        <a href="{{ route('posts.show', ['post' => $posts[$i]]) }}">
                            {{ $posts[$i]->title }}
                        </a>
                    </td>
                    <td>{{ $posts[$i]->comments()->count() }}</td>
                    <td>{{ $posts[$i]->updated_at }}</td>
                    <td>
                        <a href="{{ route('posts.edit', ['post' => $posts[$i]]) }}" class="btn btn-success">Изменить</a>
                        <a href="{{ route('posts.destroy', ['post' => $posts[$i]]) }}"
                           class="btn btn-danger">Удалить</a>
                    </td>
                </tr>
            @endfor
        @endisset
        </tbody>
    </table>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Создать новую тему</a>
@endsection
