@extends('layouts.app')

@section('content')
<div class="container my-5">
    <form action="{{ route("admin.posts.update", $post) }}" method="POST">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci il titolo"
                value="{{ $post->title }}">
        </div>
        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="text">Testo</label>
            <textarea class="form-control" name="text" id="text" rows="6" placeholder="Inserisci il testo"
                value="">{{ $post->text }}</textarea>
        </div>
        @error('text')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary">Salva</button>

        <a href="{{ route("admin.posts.index") }}" class="btn btn-dark">Indietro</a>
    </form>
</div>
@endsection
