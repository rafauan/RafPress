<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'post_id',
        'path',
        'caption',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
