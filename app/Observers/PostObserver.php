<?php

namespace App\Observers;

use App\Models\Post;
use App\Models\User;
use App\Mail\PostPublishedMail;
use Illuminate\Support\Facades\Mail;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function created(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "updated" event.
     */
    public function updated(Post $post): void
    {
        if ($post->wasChanged('status') && $post->status === 'published') {
            $post->updateQuietly([
                'published_at' => now(),
            ]);

            $admins = User::whereHas('role', fn ($query) => $query->where('name', 'Admin'))->get();

            foreach ($admins as $admin) {
                Mail::to($admin->email)->queue(new PostPublishedMail($post->fresh('user'), auth()->user()));
            }
        }

        if ($post->wasChanged('status') && $post->status === 'archived') {
            $post->delete();
        }
    }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleted(Post $post): void
    {
        if ($post->trashed()) {
            $post->status = 'archived';
            $post->saveQuietly();
        }
    }

    /**
     * Handle the Post "restored" event.
     */
    public function restored(Post $post): void
    {
        if ($post->status === 'archived') {
            $post->status = 'draft';
            $post->saveQuietly();
        }
    }

    /**
     * Handle the Post "force deleted" event.
     */
    public function forceDeleted(Post $post): void
    {
        //
    }
}
