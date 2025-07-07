<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Http\Resources\PostDetailsResource;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;
use App\Mail\PostPublishedMail;
use Illuminate\Http\Request;
use App\Http\Resources\CommentResource;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->query('per_page', 10);

        $posts = Post::with(['user', 'category', 'tags', 'likes'])
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);

        return PostResource::collection($posts);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->load(['user', 'category', 'comments', 'tags', 'likes']);
        return new PostDetailsResource($post);
    }

    public function comments(Post $post)
    {
        $items = $post
            ->comments()
            ->with(['user'])
            ->where('is_approved', true)
            ->get();

        return CommentResource::collection($items);
    }

    public function sendTestMail()
    {
        // Mail::raw('This is a test email', function ($message) {
        //     $message->to('test@example.com')
        //             ->subject('Test Email');
        // });
        $post = Post::first();
        Mail::to('test@example.com')->send(new PostPublishedMail($post));
    }
}
