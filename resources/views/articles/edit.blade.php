<!-- resources/views/articles/edit.blade.php -->

@extends('layout.base')

@section('content')
    <h1>Edit Article</h1>

    <!-- Form to edit an existing article -->
    <form action="{{ route('articles.update', $article->id) }}" method="post">
        @csrf
        @method('PUT')

        <label for="title">Title</label>
        <input type="text" name="title" value="{{ $article->title }}">

        <label for="content">Content</label>
        <textarea name="content">{{ $article->content }}</textarea>

        <!-- Add other necessary fields, such as image upload -->

        <button type="submit">Update Article</button>
    </form>
@endsection
