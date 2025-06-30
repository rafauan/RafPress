<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use App\Policies\PostPolicy;

class CommentPolicy
{
    public function view(User $user, Comment $item): bool
    {
        return app(PostPolicy::class)->view($user, $item->post);
    }

    public function create(User $user): bool
    {
        return app(PostPolicy::class)->create($user);
    }

    public function update(User $user, Comment $item): bool
    {
        return app(PostPolicy::class)->update($user, $item->post);
    }

    public function delete(User $user, Comment $item): bool
    {
        return app(PostPolicy::class)->delete($user, $item->post);
    }
}
