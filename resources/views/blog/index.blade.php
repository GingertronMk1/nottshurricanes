@extends('layouts.app')
@section('content')
    <div class="flex flex-col gap-2">
        @foreach ($posts as $post)
            <article>
                <h3>{{ $post->title }}</h3>
                <div class="truncate"><x-markdown :markdown="$post->content" /></div>
                <a
                    href="{{ route('blog.show', $post->slug) }}"
                    wire:navigate
                    class="font-hurricanes-header hover:text-hurricanes-purple"
                >Go to post</a>
            </article>
        @endforeach
    </div>
    <x-pagination :pagination="$posts" />
@endsection
