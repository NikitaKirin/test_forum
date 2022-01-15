@extends('layouts.app')
@section('title', __($post->title))
@section('main')
    <h1>Название: {{ $post->title }}</h1>
    <p>Описание: {{ $post->description }}</p>
    <p>Автор: {{ $post->user->name }}</p>
    @if(\Illuminate\Support\Facades\Auth::id() == $post->user_id)
        <a href="{{ route('posts.edit', ['post' => $post]) }}" class="btn btn-primary">Изменить тему</a>
        <a href="{{ route('posts.destroy', ['post' => $post]) }}" class="btn btn-danger" rel="nofollow">Удалить тему</a>
    @endif
    <form method="post" action="{{ route('posts.comments.store', ['post' => $post]) }}" style="margin-top: 15px">
        @csrf
        <h3>Оставьте свой комментарий!</h3>
        <div class="form-floating">
            <textarea class="form-control @error('text') is-invalid @enderror" placeholder="Leave a comment here"
                      id="comment"
                      style="height: 100px" name="text">{{ old('text') }}</textarea>
            <label for="comment">Comments</label>
            @error('text')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-success" style="margin-top: 10px">Отправить</button>
    </form>

    <h3 style="margin-top: 15px;">Список комментариев</h3>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Текст комментария</th>
            <th scope="col">Автор</th>
            <th scope="col">Дата и время</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @if(count($comments) < 1)
            <tr>
                <td colspan="5" style="text-align: center; font-size: 20px;"><p class="alert alert-info">Пока
                        что комментариев нет, будьте первыми!</p>
                </td>
            </tr>
        @endif
        @isset($comments)
            @for($i=0; $i < count($comments); $i++)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $comments[$i]->text }}</td>
                    <td>{{ $comments[$i]->user->name }}</td>
                    <td>{{ $comments[$i]->updated_at }}</td>
                    @if($comments[$i]->user_id == \Illuminate\Support\Facades\Auth::id())
                        <td>
                            <a href="{{ route('posts.comments.edit', ['comment' => $comments[$i]]) }}"
                               class="btn btn-success">Изменить</a>
                            <a href="{{ route('posts.comments.destroy', ['comment' => $comments[$i]]) }}"
                               class="btn btn-danger">Удалить</a>
                        </td>
                    @else
                        <td></td>
                    @endif
                </tr>
            @endfor
        @endisset
        </tbody>
    </table>
@endsection
