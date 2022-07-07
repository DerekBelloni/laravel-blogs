<x-layout>
    <article>
        <h1>{!! $post->title !!}</h1>
        <div>{!! $post->body !!}</div>
        <p>
            By <a href="#">Derek Belloni</a> in <a
                href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
        </p>
    </article>
    <a href="/">Go Back</a>
</x-layout>
