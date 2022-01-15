<form method="post" action="{{ route('user.update') }}">
    @csrf
    @method('PATCH')
    <h3>Изменить свои данные</h3>
    <div class="mb-3">
        <label for="name" class="form-label">ФИО</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
               value="{{ old('name', $user->name) }}">
        @error('name')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Изменить данные</button>
</form>
