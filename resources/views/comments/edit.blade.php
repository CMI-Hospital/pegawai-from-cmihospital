<!-- resources/views/comments/edit.blade.php -->

@extends('layout.base')

@section('content')
    <h1>Edit Comment</h1>

    <!-- Form to edit an existing comment -->
    <form action="{{ route('comments.update', $comment->id) }}" method="post">
        @csrf
        @method('PUT')

        <textarea name="content">{{ $comment->content }}</textarea>

        <button type="submit">Update Comment</button>
    </form>
@endsection
