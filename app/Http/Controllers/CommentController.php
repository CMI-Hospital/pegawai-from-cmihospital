<?php
// app/Http/Controllers/CommentController.php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        /// Validate the request data...
        //$comment = new Comment;

        // Set attributes
        //$comment->article_id = $request->input('article_id');
        //$comment->comment = $request->input('comment');
        // Set other necessary fields...

        // Save the comment
        //$comment->save();
        Comment::create($request->all());

        return back()->with('success', 'Comment added successfully.');
    }

    public function edit(Comment $comment)
    {
        // Show the form for editing the comment
        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        // Update the comment in the database
        $comment->update($request->all());

        return redirect()->route('articles.show', $comment->article_id)->with('success', 'Comment updated successfully.');
    }

    public function destroy(Comment $comment)
    {
        // Delete the comment from the database
        $comment->delete();

        return back()->with('success', 'Comment deleted successfully.');
    }
}
