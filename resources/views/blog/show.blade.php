@extends('layouts.app')
@section('content')
<div class="flex flex-col gap-2">
    <div class="flex flex-row"><h2 class="w-3/4">{{ $post->title }}</h2><div class="ml-auto flex flex-col gap-2 text-end">
        <aside>First posted <time datetime="{{ $post->created_at->toISOString() }}" data-local-date>{{ $post->created_at->format('d/m/Y') }}</time></aside>
        <aside>Last updated <time datetime="{{ $post->updated_at->toISOString() }}" data-local-date>{{ $post->updated_at->format('d/m/Y') }}</time></aside>
    </div></div>
    <x-markdown :markdown="$post->content" />
</div>
@endsection
