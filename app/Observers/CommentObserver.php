<?php

namespace App\Observers;

use App\Mail\CommentCreatedMail;
use App\Models\Comment;
use Illuminate\Support\Facades\Mail;

class CommentObserver
{
    /**
     * Handle the Comment "created" event.
     */
    public function created(Comment $comment): void
    {
        $email = $comment->post->user->email;

        Mail::to($email)->queue(new CommentCreatedMail(
            $comment,
            $comment->user,
            $comment->post->user
        ));
    }
}
