@extends('layouts.app')
@section('title', __('Изменить комментарий'))
@section('main')
    <form method="post" action="{{ route('posts.comments.update', ['comment' => $comment]) }}" style="margin-top: 15px">
        @csrf
        @method('PATCH')
        <h3>Изменить комментарий</h3>
        <div class="form-floating">
            <textarea class="form-control @error('text') is-invalid @enderror" placeholder="Leave a comment here"
                      id="text"
                      style="height: 100px" name="text">{{ old('text', $comment->text) }}</textarea>
            <label for="text">Comments</label>
        </div>
        <button type="submit" class="btn btn-success" style="margin-top: 10px">Изменить</button>
    </form>
@endsection
