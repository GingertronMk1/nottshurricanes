@extends('layouts.app')
@section('title', 'Fixtures')
@section('content')
    <h2 class="mb-4">Fixtures</h2>
    <nav aria-label="Filter fixtures by rugby type" class="mb-6 flex flex-wrap gap-3">
        <a
            href="{{ route('fixtures.index') }}"
            wire:navigate
            @class(['border-b-2 px-3 py-2 font-bold', 'border-hurricanes-purple' => $type === null, 'border-transparent' => $type !== null])
            @if ($type === null) aria-current="page" @endif
        >All</a>
        @foreach (\App\RugbyType::cases() as $rugbyType)
            <a
                href="{{ route('fixtures.index', ['type' => $rugbyType->value]) }}"
                wire:navigate
                @class(['border-b-2 px-3 py-2 font-bold', 'border-hurricanes-purple' => $type === $rugbyType, 'border-transparent' => $type !== $rugbyType])
                @if ($type === $rugbyType) aria-current="page" @endif
            >{{ ucfirst($rugbyType->value) }}</a>
        @endforeach
    </nav>
    <div class="flex flex-col gap-2">
        @foreach ($fixtures as $fixture)
            <a
                href="{{ route('fixtures.show', $fixture) }}"
                wire:navigate
                class="group flex flex-col items-start gap-2 md:flex-row md:items-center"
            >
                <h4 class="group-hover:text-hurricanes-purple flex-1">
                    {{ ucfirst($fixture->type->value) }} · vs. {{ $fixture->opposition }}
                </h4>
                <span
                    >@ {{ $fixture->location }},
                    <time
                        datetime="{{ $fixture->start->toISOString() }}"
                        data-local-datetime
                        >{{ $fixture->start->format('d/m/Y H:i:s') }}</time
                    ></span>
            </a>
        @endforeach
        @if ($fixtures->isEmpty())
            <p>No fixtures found.</p>
        @endif
    </div>
    <x-pagination :pagination="$fixtures" />
@endsection
