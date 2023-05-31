<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('technologies', 'type')->get();

        return response()->json([
            'success' => 'true',
            'results' => $posts
        ]);

    }

    public function show($id)
    {
        $post = Post::where('id', $id)->with(['technologies', 'type'])->first();
        return response()->json([
            'success' => true,
            'post' => $post
        ]);
    }
}