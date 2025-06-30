<?php

namespace App\Policies;

use App\Models\User;

class RolePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->role->name === 'Admin';
    }
}
