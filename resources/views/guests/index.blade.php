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
                      <p class="card-text">{{ substr($post->text, 0 , 300) }}</p>
                      <a href="#" class="btn btn-primary">Leggi</a>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection