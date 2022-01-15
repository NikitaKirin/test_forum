@extends('layouts.app')
@section('title', __('Изменить комментарий'))
@section('main')
    <form method="post" action="{{ route('posts.comments.update', ['comment' => $comment]) }}" style="margin-top: 15px">
        @csrf
        <h3>Изменить комментарий</h3>
        <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="comment"
                      style="height: 100px" name="comment"></textarea>
            <label for="comment">Comments</label>
        </div>
        <button type="submit" class="btn btn-success" style="margin-top: 10px">Изменить</button>
    </form>
@endsection
