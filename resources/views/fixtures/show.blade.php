@extends('layouts.app')
@section('title', 'Fixture')
@section('content')
    <div class="flex flex-col gap-2">
        <h2 class="text-4xl">vs {{ $fixture->opposition }}</h2>
        <p>
            {{ $fixture->type === \App\RugbyType::TOUCH ? 'Tapping' : 'Kicking' }} off at
            <time
                datetime="{{ $fixture->start->toISOString() }}"
                data-local-datetime
            >{{ $fixture->start->format('d/m/Y H:i:s') }}</time>
        </p>
        @if ($fixture->has_happened)
            <h3>Final Score</h3>
            <p class="flex flex-row justify-between">
                <span>Hurricanes {{ $fixture->hurricanes_score }}</span
                ><span>{{ $fixture->opposition }} {{ $fixture->opposition_score }}</span>
            </p>
            <x-markdown :markdown="$fixture->report" />
        @endif
    </div>
@endsection
