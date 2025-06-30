<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Models\Post;
use App\Policies\PostPolicy;
use App\Models\Media;
use App\Policies\MediaPolicy;
use App\Models\Comment;
use App\Policies\CommentPolicy;
use App\Models\Role;
use App\Policies\RolePolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Post::class => PostPolicy::class,
        Media::class => MediaPolicy::class,
        Comment::class => CommentPolicy::class,
        Role::class => RolePolicy::class,
    ];

    public function boot(): void
    {
        // Unstandard way to register policies
    }
}
