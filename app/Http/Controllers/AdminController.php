<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function manage()
    {
        //$articles = Article::where('approved', false)->get();

        //return view('welcome', compact('articles'));
        return redirect()->route('h');
    }

    public function approve(Article $article)
    {
        // Perform any additional logic for approval, e.g., sending to WordPress

        $article->update(['approved' => true]);

        return redirect()->route('admin.manage')->with('success', 'Article approved successfully.');
    }
}
