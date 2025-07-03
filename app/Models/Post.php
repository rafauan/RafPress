<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Mail\PostPublishedMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'image',
        'status',
        'user_id',
        'published_at',
        'category_id',
    ];

    protected $attributes = [
        'status' => 'draft',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    protected static function booted()
    {
        static::updated(function ($post) {
            if ($post->wasChanged('status') && $post->status === 'published') {

                $admins = User::whereHas('role', function ($query) {
                    $query->where('name', 'Admin');
                })->get();
                foreach ($admins as $admin) {
                    Mail::to($admin->email)->send(new PostPublishedMail($post->load('user')));
                }
            }
        });
    }
}
