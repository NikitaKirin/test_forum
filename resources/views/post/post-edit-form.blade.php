@extends('layouts.app')
@section('title', __('Изменить тему:' . $post->title))
@section('main')
    <form method="post" action="{{ route('posts.update', ['post'=>$post]) }}">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="title" class="form-label">Название темы</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                   value="{{ old('title', $post->title) }}">
            @error('title')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Описание темы</label>
            <textarea class="form-control  @error('description') is-invalid @enderror" id="description"
                      name="description">{{ old('description', $post->description) }}</textarea>
            @error('description')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Изменить</button>
    </form>
@endsection
