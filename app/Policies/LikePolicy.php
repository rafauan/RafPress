<?php

namespace App\Policies;

use App\Models\User;

class LikePolicy
{
    public function viewAny(User $user): bool
    {
        // Allow all authenticated users to view categories
        return in_array($user->role, ['admin', 'editor']);
    }

    public function view(User $user): bool
    {
        // Allow all authenticated users to view likes
        return in_array($user->role, ['admin', 'editor', 'publisher']);
    }

    public function create(User $user): bool
    {
        // Allow all authenticated users to create likes
        return in_array($user->role, ['admin']);
    }

    public function update(User $user): bool
    {
        // Allow only admin to update likes
        return $user->role === 'admin';
    }

    public function delete(User $user): bool
    {
        // Allow only admin to delete likes
        return $user->role === 'admin';
    }
}
