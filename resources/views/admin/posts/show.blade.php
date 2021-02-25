@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Singolo post</h1>
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-body">
                      <h5 class="card-title">{{ $post->title }}</h5>
                      <h6 class="card-subtitle mb-2 text-muted">{{ $post->user->name }}</h6>
                      <p class="card-text">{{ $post->text }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection