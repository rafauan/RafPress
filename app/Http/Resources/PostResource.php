<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'status' => $this->status,
            'excerpt' => Str::limit($this->content, 150),
            'image' => $this->media ? [
                'id' => $this->media->id,
                'path' => $this->media->path,
                'caption' => $this->media->caption,
            ] : null,
            'author' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
            ],
            'category' => $this->category->name,
            'tags' => $this->tags->map(function ($tag) {
                return [
                    'id' => $tag->id,
                    'name' => $tag->name,
                ];
            })->toArray(),
            'likes_count' => $this->likes->count(),
            'comments_count' => $this->comments ? $this->comments->count() : 0,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
            'published_at' => $this->published_at ? $this->published_at->toDateTimeString() : null,
        ];
    }
}
