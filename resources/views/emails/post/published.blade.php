<x-mail::message>
# 🎉 New Post Published!

Hello there,

We're excited to share that **{{ $author->name }}** has just published a new post on {{ config('app.name') }}!

## 📖 {{ $post->title }}

@if($post->excerpt)
<x-mail::panel>
{{ $post->excerpt }}
</x-mail::panel>
@endif

@if($post->image)
<div style="text-align: center; margin: 20px 0;">
    <img src="{{ asset('storage/' . $post->image) }}"
         alt="{{ $post->title }}"
         style="max-width: 100%; height: auto; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);" />
</div>
@endif

**Author:** {{ $author->name }}
**Category:** {{ $post->category->name ?? 'Uncategorized' }}
**Published:** {{ $post->created_at->format('M j, Y \a\t g:i A') }}

<x-mail::button :url="url('/admin/posts/' . $post->id)">
Read Full Post
</x-mail::button>

---

Don't miss out on the latest content! 📚✨

Best regards,<br>
{{ config('app.name') }} Team
</x-mail::message>
