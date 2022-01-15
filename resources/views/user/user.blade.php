@extends('layouts.app')
@section('title', __($user->name))
@section('main')
    <h1>Страница пользователя: {{ $user->name }}</h1>
    <h3>Список тем пользователя</h3>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название темы</th>
            <th scope="col">Количество комментариев</th>
            <th scope="col">Дата создания / последнее обновление</th>
        </tr>
        </thead>
        <tbody>
        @if(count($posts) < 1)
            <tr>
                <td colspan="4" style="text-align: center; font-size: 20px;"><p class="alert alert-info">Пока
                        что нет ни одной созданной темы</p>
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
                </tr>
            @endfor
        @endisset
        </tbody>
    </table>
@endsection
