@extends('layouts.app')
@section('title', __('Создать новую тему'))
@section('main')
    <form method="post" action="{{ route('posts.store') }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Название темы</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                   value="{{ old('title') }}">
            @error('title')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Описание темы</label>
            <textarea class="form-control  @error('description') is-invalid @enderror" id="description"
                      name="description">{{ old('description') }}</textarea>
            @error('description')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection
