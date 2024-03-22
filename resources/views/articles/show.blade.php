<!-- resources/views/articles/show.blade.php -->

@extends('layout.base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1>{{ $article->title }}</h1>
                <img src="{{ asset('public/' . $article->image) }}" class="img-fluid mx-auto my-4 d-block" alt="{{ $article->title }}">
                @php
                $content = $article->content;
                // Define sentence delimiters
                $sentence_delimiters = ['.', '!', '?'];
            
                // Initialize variables
                $paragraphs = [];
                $current_paragraph = '';
            
                // Split content into sentences
                $sentences = preg_split('/(?<=[.!?])\s+(?=[a-zA-Z])/', $content);
            
                // Group sentences into paragraphs
                $sentence_count = 0;
                foreach ($sentences as $sentence) {
                    // Add the sentence to the current paragraph
                    $current_paragraph .= $sentence;
            
                    // Increment the sentence count
                    $sentence_count++;
            
                    // If we've reached 4 or 5 sentences, start a new paragraph
                    if ($sentence_count >= 4 || substr_count($current_paragraph, '.') >= 5) {
                        // Add the current paragraph to the list
                        $paragraphs[] = $current_paragraph;
            
                        // Reset the current paragraph and sentence count
                        $current_paragraph = '';
                        $sentence_count = 0;
                    }
                }
            
                // Add any remaining sentences as the last paragraph
                if (!empty($current_paragraph)) {
                    $paragraphs[] = $current_paragraph;
                }
            @endphp
            
            @foreach ($paragraphs as $paragraph)
                <p class="text-justify">{{ $paragraph }}</p>
            @endforeach
                <p>Author: {{ $article->pegawai->nama }}</p>

                <!-- Display the "Edit" button if the current user is the author -->
                @can('update', $article)
                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary">Edit</a>
                @endcan

                <!-- Display comments -->
                <div class="mt-4">
                    <h4>Comments</h4>
                    @foreach ($article->comments as $comment)
                        <div class="card mb-2">
                            <div class="card-body">
                                <p class="card-text">{{ $comment->pegawai->nama }} says: {{ $comment->comment }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Display comment form if the user is logged in -->
                @auth
                <div class="mt-4">
                    <h4>Add Comment</h4>
                    <form action="{{ route('comments.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="pegawai_id" value="{{ $pegawaiId }}">
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                        <div class="form-group">
                            <textarea class="form-control" name="comment" placeholder="Add a comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Comment</button>
                    </form>
                </div>
                @else
                    <p class="mt-4">Please log in to leave a comment.</p>
                @endauth

                <!-- Button to go back to articles.index -->
                <div class="mt-4">
                    <a href="{{ route('articles.index') }}" class="btn btn-secondary">Go Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
