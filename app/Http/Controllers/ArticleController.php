<?php
// app/Http/Controllers/ArticleController.php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;

class ArticleController extends Controller
{
public function index()
{
// Display a list of articles
$articles = Article::all();
return view('articles.index', compact('articles'));
}

public function show(Article $article)
{
    $pegawaiId = Auth::id();
// Display a specific article
return view('articles.show', compact('article', 'pegawaiId'));
}

public function create()
{
// Show the form for creating a new article
    $pegawaiId = Auth::id();
    $categories = Category::all();
return view('articles.create', compact('pegawaiId', 'categories'));
}

public function store(Request $request)
{
// Store a new article in the database
// Include logic for image upload if needed
//Article::create($request->all());
    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'category' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
    ]);

    // Handle image upload
    // if ($request->hasFile('image')) {
    //     $imagePath = $request->file('image')->store('article_images', 'public');
    // } else {
    //     $imagePath = null; // Set default image path if no image is uploaded
    // }
    
    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('article_images'), $imageName);
        $imagePath = 'article_images/' . $imageName;
    } else {
        $imagePath = null; // Set default image path if no image is uploaded
    }

    // Create new article
    Article::create([
        'pegawai_id' => $request->pegawai_id,
        'title' => $request->title,
        'content' => $request->content,
        'category' => $request->category,
        'image' => $imagePath, // Save image path in the database
    ]);

    return redirect()->route('articles.index')->with('success', 'Article created successfully');


}

public function edit(Article $article)
{
// Show the form for editing the article
return view('articles.edit', compact('article'));
}

public function update(Request $request, Article $article)
{
// Update the article in the database
// Include logic for image update if needed
$article->update($request->all());

return redirect()->route('articles.index')->with('success', 'Article updated successfully.');
}

public function destroy(Article $article)
{
// Delete the article from the database
$article->delete();

return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
}

    public function manage()
    {
        $articles = Artikel::where('approved', false)
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('articles.manage', compact('articles'));
        //return redirect()->route('h');
    }

    public function approve(Article $article)
    {
        // Perform any additional logic for approval, e.g., sending to WordPress

        //$article->update(['approved' => true]);

        //return redirect()->route('articles.manage')->with('success', 'Article approved successfully.');

        // Perform any additional logic for approval, e.g., sending to WordPress

        // Assuming the WordPress REST API endpoint for creating posts
        $wordpressApiEndpoint = 'https://rumahsakitkanker.id/wp-json/wp/v2/posts';

        // Prepare the data to send to WordPress
        $postData = [
            'title' => $article->title,
            'content' => $article->content,
            'status' => 'publish',
            // Add other fields as needed
        ];

        // Set the path to the downloaded CA certificate bundle
        $caBundlePath = storage_path('cacert.pem');

        // Create the Guzzle client with the custom handler stack
        $client = new Client([
            'verify' => $caBundlePath,
        ]);

        try {
            $response = $client->post($wordpressApiEndpoint, [
                'auth' => ['siadmin', 'Pohonpisang2024'],
                'form_params' => $postData,
            ]);

            // Check the response status and update the article status in Laravel accordingly
            if ($response->getStatusCode() === 201) {
                //$article->update(['approved' => true]);
                return redirect()->route('articles.manage')->with('success', 'Article approved and sent to WordPress successfully.');
            } else {
                return redirect()->route('articles.manage')->with('error', 'Failed to send article to WordPress.');
            }
        } catch (RequestException $e) {
            // Handle the exception, log it, or display an error message
            return redirect()->route('articles.manage')->with('error', 'Failed to login to WordPress. ' . $e->getMessage());
        }
    }

}
