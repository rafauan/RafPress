<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Http\Resources\PostDetailsResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PostPublishedMail;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'category', 'media', 'tags', 'likes'])
            ->orderBy('created_at', 'desc')
            ->get();
        return PostResource::collection($posts);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->load(['user', 'category', 'media', 'tags', 'likes']);
        return new PostDetailsResource($post);
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
