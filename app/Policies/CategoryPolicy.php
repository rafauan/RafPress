<?php

namespace App\Policies;

use App\Models\User;

class CategoryPolicy
{
    public function viewAny(User $user): bool
    {
        // Allow all authenticated users to view categories
        return in_array($user->role, ['admin', 'editor']);
    }

    public function view(User $user): bool
    {
        // Allow all authenticated users to view a specific category
        return in_array($user->role, ['admin', 'editor']);
    }

    public function create(User $user): bool
    {
        // Allow only admin and editor to create categories
        return in_array($user->role, ['admin', 'editor']);
    }

    public function update(User $user): bool
    {
        // Allow only admin and editor to update categories
        return in_array($user->role, ['admin', 'editor']);
    }

    public function delete(User $user): bool
    {
        // Allow only admin to delete categories
        return $user->role === 'admin';
    }
}
