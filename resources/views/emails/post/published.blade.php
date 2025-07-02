<x-mail::message>
# New post has been published

User <strong>{{ $post->user->name }}</strong> has published a new post titled:

<h2>{{ $post->title }}</h2>

@if($post->image)
<img src="{{ asset('storage/' . $post->image) }}" alt="Post image" style="max-width: 100%; height: auto; margin-top: 20px;">
@endif

<x-mail::button :url="route('posts.show', $post)">
Check it out
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
