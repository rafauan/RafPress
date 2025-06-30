<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Tag;

class TagPolicy
{
    public function view(User $user, Tag $model): bool
    {
        return $user->id === $model->id
            || $user->role->name === 'Admin'
            || $user->role->name === 'Editor';
    }

    public function create(User $user): bool
    {
        return $user->role->name === 'Admin' || $user->role->name === 'Editor';
    }

    public function update(User $user): bool
    {
        return $user->role->name === 'Admin' || $user->role->name === 'Editor';
    }

    public function delete(User $user): bool
    {
        return $user->role->name === 'Admin' || $user->role->name === 'Editor';
    }
}
