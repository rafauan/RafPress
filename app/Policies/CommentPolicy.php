<?php

namespace App\Policies;

use App\Models\User;

class CommentPolicy
{
    public function view(User $user): bool
    {
        return in_array($user->role, ['admin', 'editor', 'publisher']);
    }

    public function create(User $user): bool
    {
        return in_array($user->role, ['admin']);
    }

    public function update(User $user): bool
    {
        return in_array($user->role, ['admin']);
    }

    public function delete(User $user): bool
    {
        return in_array($user->role, ['admin']);
    }
}
