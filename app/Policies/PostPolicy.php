<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Post $post): bool
    {
        return $user->role->name === 'Admin'
            || $user->role->name === 'Editor'
            || $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return in_array($user->role->name, ['Admin', 'Editor', 'Publisher']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): bool
    {
        return $user->role->name === 'Admin'
            || $user->role->name === 'Editor'
            || $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): bool
    {
        return $user->role->name === 'Admin'
            || $user->role->name === 'Editor'
            || $user->id === $post->user_id;
    }

    // On the future
    // /**
    //  * Determine whether the user can restore the model.
    //  */
    // public function restore(User $user, Post $post): bool
    // {
    //     return $user->role->name === 'Admin' || $user->id === $post->user_id;
    // }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  */
    // public function forceDelete(User $user, Post $post): bool
    // {
    //     return $user->role->name === 'Admin' || $user->id === $post->user_id;
    // }
}
