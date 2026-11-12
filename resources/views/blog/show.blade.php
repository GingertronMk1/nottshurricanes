@extends('layouts.app')
@section('content')
    <div class="flex flex-col gap-2">
        <div class="flex flex-col gap-4 sm:flex-row sm:justify-between">
            <h1 class="min-w-0 flex-1 text-3xl break-words">{{ $post->title }}</h1>
            <div class="flex flex-col gap-1 text-sm sm:text-end">
                <aside>
                    First posted
                    <time
                        datetime="{{ $post->created_at->toISOString() }}"
                        data-local-date
                    >{{ $post->created_at->format('d/m/Y') }}</time>
                </aside>
                <aside>
                    Last updated
                    <time
                        datetime="{{ $post->updated_at->toISOString() }}"
                        data-local-date
                    >{{ $post->updated_at->format('d/m/Y') }}</time>
                </aside>
            </div>
        </div>
        <x-markdown :markdown="$post->content" />
    </div>
@endsection
