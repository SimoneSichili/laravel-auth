@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('message'))
    <p class="alert alert-info">{{ Session::get('message') }}</p>
    @endif
    <table class="table table-striped table-bordered my-5">
        <thead>
            <tr>
                <td>ID</td>
                <td>Titolo</td>
                <td>Autore</td>
                <td>Testo</td>
                <td>Immagine</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->user->name }}</td>
                <td>{{ substr($post->text, 0 , 250) . "..." }}</td>
                <td><img src="{{ asset('storage/' . $post->img_path) }}" alt="{{ $post->title }}" style="width: 100px"></td>
                <td><a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary"><i
                            class="fas fa-search-plus"></i></a>
                </td>
                <td>
                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary"><i
                            class="fas fa-pencil-alt"></i></a>
                </td>
                <td>
                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST"
                        onsubmit="return confirm('Sei sicuro di voler eliminare questo articolo?')">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
