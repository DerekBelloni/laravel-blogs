<x-layout>
    <article>
        <h1>{!! $post->title !!}</h1>
        <div>{!! $post->body !!}</div>
        <p>
            <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
        </p>
    </article>
    <a href="/">Go Back</a>
</x-layout>
