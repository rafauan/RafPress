<x-mail::message>
# 💬 New Comment on Your Post

Hello **{{ $postAuthor->name }}**,

Great news! **{{ $commentAuthor->name }}** has left a comment on your post "**{{ $comment->post->title }}**".

## Comment Details

<x-mail::panel>
"{{ $comment->content }}"
</x-mail::panel>

**Author:** {{ $commentAuthor->name }}
**Posted:** {{ $comment->created_at->format('M j, Y \a\t g:i A') }}

<x-mail::button :url="url('/admin/comments/' . $comment->id)">
View Comment in Admin Panel
</x-mail::button>

---

Keep engaging with your community! 🚀

Best regards,<br>
{{ config('app.name') }} Team
</x-mail::message>
