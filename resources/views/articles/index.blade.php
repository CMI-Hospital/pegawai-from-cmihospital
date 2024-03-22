<!-- resources/views/articles/index.blade.php -->

@extends('layout.base')

@section('content')
    <div class="container">
        <h1 class="mt-5 mb-4">Article List</h1>

        <div class="row">
            @foreach ($articles as $article)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('public/' . $article->image) }}" class="card-img-top img-thumbnail" alt="{{ $article->title }}">
                      
                        <!--<img src="{{ url('public/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}">6-->
                  
                        
                        <!--<img src="{{ URL::to('public/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}">11-->
           
                        
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ substr($article->content, 0, 200) }}</p>
                            <p class="card-text"><small class="text-muted">Author: {{ $article->pegawai->nama }}</small></p>
                            <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary">View Article</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
