<x-mail::message>
# New post has been published

User <strong>{{ $author->name }}</strong> has published a new post.

<h2>{{ $post->title }}</h2>

@if($post->image)
<img src="{{ asset('storage/' . $post->image) }}" alt="Post image" style="width: 506px; height: 300px; margin-top: 20px; object-fit: contain; display: block;" />
@endif

<x-mail::button :url="route('posts.show', $post)">
Check it out
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
