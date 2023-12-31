@props(['comment'])

<article class="flex items-start gap-x-4 mt-8">
    <img class="rounded-full" src="https://i.pravatar.cc/70?u={{$comment->user_id}}" alt="">

    <div>
        <h1 class="font-bold">
            {{ $comment->author->name }}
        </h1>
        <p>{{ $comment->created_at }}</p>

        <p>
            {{ $comment->body }}
        </p>
    </div>
</article>
