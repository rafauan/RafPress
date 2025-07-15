<?php

namespace App\Exports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PostsExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    public function collection()
    {
        return Post::with(['user:name', 'category', 'tags', 'comments', 'likes'])
            ->withTrashed()
            ->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Title',
            'Status',
            'Author',
            'Category',
            'Tags',
            'Comments Count',
            'Likes Count',
            'Created At',
            'Published At',
        ];
    }

    public function map($post): array
    {
        return [
            $post->id,
            $post->title,
            ucfirst($post->status),
            $post->user->name ?? 'No Author',
            $post->category->name ?? 'No Category',
            $post->tags->pluck('name')->join(', '),
            $post->comments->count() ?? 0,
            $post->likes->count() ?? 0,
            $post->published_at ? $post->published_at->format('Y-m-d H:i:s') : 'Not Published',
            $post->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
