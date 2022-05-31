<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostCreateRequest;

class PostCreate extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(PostCreateRequest $request)
    {
        $post = Post::create($request->all());
        return response()->json([
            'message' => 'Post created successfully.',
            'post' => $post
        ], 201);
    }
}
