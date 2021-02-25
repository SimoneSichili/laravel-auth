@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tutti i posts</h1>
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-4 d-flex align-items-stretch">
                <div class="card my-4">
                    <div class="card-body">
                      <h5 class="card-title">{{ $post->title }}</h5>
                      <h6 class="card-subtitle mb-2 text-muted">{{ $post->user->name }}</h6>
                      <p class="card-text">{{ substr($post->text, 0 , 250) . "..." }}</p>
                      <a href="{{ route('post', $post->id) }}" class="btn btn-primary">Leggi</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection