@extends('layouts.app')
@section('content')
<div class="flex flex-col gap-2">
    <h2>External Links</h2>
    <x-markdown :markdown="$pageContent?->content" />
    <div class="mt-2 flex flex-col gap-2 pl-2">
        @foreach ($links as $link)<a class="hover:text-hurricanes-purple font-hurricanes-header text-xl" href="{{ $link['href'] }}" target="_blank" rel="noopener noreferrer">{{ $link['name'] }}</a>@endforeach
    </div>
</div>
@endsection
