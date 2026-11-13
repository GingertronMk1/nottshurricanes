@extends('layouts.app')
@section('title', 'Club news')
@section('content')
    <h1 class="mb-6">Club news</h1>
    <div class="flex flex-col gap-3">
        @forelse ($posts as $post)
            <article class="border-l-hurricanes-purple grid gap-5 border border-l-4 border-[#ded6d8] bg-white p-5 md:grid-cols-[minmax(9rem,1fr)_minmax(12rem,3.5fr)_auto] md:items-center md:gap-6 md:px-7">
                <div class="flex flex-col gap-1">
                    <span class="text-xs font-extrabold tracking-[.12em] text-[#8b465a] uppercase">Published</span>
                    <time
                        datetime="{{ $post->created_at->toISOString() }}"
                        class="font-bold"
                    >{{ $post->created_at->format('j M Y') }}</time>
                </div>
                <div class="flex min-w-0 flex-col gap-1">
                    <span class="text-xs font-extrabold tracking-[.12em] text-[#8b465a] uppercase">Club news</span>
                    <h3 class="text-2xl">
                        <a
                            href="{{ route('blog.show', $post->slug) }}"
                            wire:navigate
                            class="hover:text-hurricanes-purple focus-visible:outline-hurricanes-purple focus-visible:outline-2 focus-visible:outline-offset-2"
                        >{{ $post->title }}</a>
                    </h3>
                    <div class="line-clamp-2 text-sm text-[#62595d]"><x-markdown :markdown="$post->content" /></div>
                </div>
                <a
                    href="{{ route('blog.show', $post->slug) }}"
                    wire:navigate
                    class="focus-visible:outline-hurricanes-purple hover:text-hurricanes-purple flex items-center justify-between gap-6 border-t border-[#e8e1e3] pt-4 text-xs font-extrabold tracking-[.08em] uppercase focus-visible:outline-2 focus-visible:outline-offset-2 md:border-0 md:pt-0"
                >Read article <span aria-hidden="true" class="text-hurricanes-purple text-xl">↗</span></a>
            </article>
        @empty
            <p class="border-hurricanes-purple border-l-4 bg-white p-6">No news posts yet.</p>
        @endforelse
    </div>
    <x-pagination :pagination="$posts" />
@endsection
