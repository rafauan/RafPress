<?php

namespace App\Policies;

use App\Models\Media;
use App\Models\User;
use App\Policies\PostPolicy;

class MediaPolicy
{
    public function view(User $user, Media $item): bool
    {
        return app(PostPolicy::class)->view($user, $item->post);
    }

    public function create(User $user): bool
    {
        return app(PostPolicy::class)->create($user);
    }

    public function update(User $user, Media $item): bool
    {
        return app(PostPolicy::class)->update($user, $item->post);
    }

    public function delete(User $user, Media $item): bool
    {
        return app(PostPolicy::class)->delete($user, $item->post);
    }
}
