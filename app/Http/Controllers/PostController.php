<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index()
    {
        //loss of performances
//        $years = Post::query()->with('author')->latest('published_at')->get()->groupBy(fn($post) => $post->published_at->year);

        $years = Post::query()
            ->select('id', 'title', 'slug', 'published_at', 'author_id')
            ->with('author:id,name')
            ->latest('published_at')->get()->groupBy(fn($post) => $post->published_at->year);
        return view('posts', ['years' => $years]);
    }
}
