<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostSingleResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function index()
    {
        return PostResource::collection(Post::paginate(10));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        try {
            $post = Post::create([
                'title' => $request->title,
                'slug' => strtolower(Str::slug($request->title . '-'. Str::random(5))),
                'content' => $request->content, // alasan menggunakan $request->content
                'user_id' => auth()->user()->id,
                'category_id' => $request->category_id,
            ]);

            return response()->json([
                'message' => 'Post created successfully',
                'post' => new PostSingleResource($post),
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create post',
                'error' => $e->getMessage(),
            ], 400);
        }
    }




    public function show(Post $post)
    {
        return new PostSingleResource($post);
    }


    public function update(Request $request, Post $post)
    {
        // Memastikan pengguna yang sedang login adalah pemilik posting
        if (auth()->user()->id !== $post->user_id) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 403);
        }

        // Validasi data
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        try {
            $post->update([
                'title' => $request->title,
                'slug' => strtolower(Str::slug($request->title . '-' . Str::random(5))),
                'content' => $request->content,
                'category_id' => $request->category_id,
            ]);

            return response()->json([
                'message' => 'Post updated successfully',
                'post' => new PostSingleResource($post),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update post',
                'error' => $e->getMessage(),
            ], 400);
        }
    }




    public function destroy(Post $post)
    {
        try {
            $post->delete();

            return response()->json([
                'message' => 'Post deleted successfully',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete post',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

}
