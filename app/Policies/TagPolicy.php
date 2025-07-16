<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Tag;

class TagPolicy
{
    public function viewAny(User $user): bool
    {
        return in_array($user->role, ['admin', 'editor']);
    }

    public function view(User $user): bool
    {
        return in_array($user->role, ['admin', 'editor']);
    }

    public function create(User $user): bool
    {
        return $user->role === 'admin' || $user->role === 'editor';
    }

    public function update(User $user): bool
    {
        return $user->role === 'admin' || $user->role === 'editor';
    }

    public function delete(User $user): bool
    {
        return $user->role === 'admin' || $user->role === 'editor';
    }
}
