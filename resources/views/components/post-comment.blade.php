@props(['comment'])
<article class="flex bg-gray-100 rounded-xl border border-gray-200 p-6 space-x-4">
    <div class="flex-shrink-0">
        <img class="rounded" src="https://i.pravatar.cc/100" alt="" width="60" height="60">
    </div>
    <div>
        <header class="mb-4">
            <h3 class="font-bold">
                {{ $comment->author->username }}
            </h3>
            <p class="text-xs">
                <time>{{ $comment->created_at }}</time>
            </p>
        </header>
        <p>{{ $comment->body }}</p>
    </div>
</article>
