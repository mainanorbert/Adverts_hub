<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticlesController extends Controller
{
    public function index(Request $request)
    {
        // return 1;
        // $category = $request->query('category');

        // if ($category) {
            // $articles = Article::where('category', $category)->get();
        // } else {
            $articles = Article::all();
        // }
        return response()->json($articles);
    }
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required',
            'article' => 'required',
            'category' => 'required',
            'user_id' => 'required|exists:users,id', // Validate the user ID exists in the users table
        ]);

        $post = new Article();
        $post->title = $validatedData['title'];
        $post->article = $validatedData['article'];
        $post->user_id = $validatedData['user_id'];
        $post->category = $validatedData['category'];
        $post->save();

        return response()->json($post, 201);
    }
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return response()->json(['message' => 'One article deleted successful']);
    }
    public function edit($id)
    {

        $article = Article::find($id);

        return response()->json($article);

    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'article' => 'required',
            'category' => 'required',
            'user_id' => 'required|exists:users,id', // Validate the user ID exists in the users table
        ]);

        $post = Article::FindOrFail($request->post_id);
        $post->title = $validatedData['title'];
        $post->article = $validatedData['article'];
        $post->category = $validatedData['category'];
        $post->user_id = $validatedData['user_id'];
        $post->save();

        return response()->json($post, 201);
    }
}