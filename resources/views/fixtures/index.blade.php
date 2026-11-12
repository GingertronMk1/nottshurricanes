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
    <div class="flex flex-col gap-3">
        @forelse ($fixtures as $fixture)
            <a
                href="{{ route('fixtures.show', $fixture) }}"
                wire:navigate
                class="group border-l-hurricanes-purple focus-visible:outline-hurricanes-purple grid gap-5 border border-l-4 border-[#ded6d8] bg-white p-5 transition-colors hover:border-[#b05870] focus-visible:outline-2 focus-visible:outline-offset-2 md:grid-cols-[minmax(9rem,1fr)_minmax(12rem,2fr)_minmax(10rem,1.5fr)_auto] md:items-center md:gap-6 md:px-7"
            >
                <div class="flex flex-col gap-1">
                    <span class="text-xs font-extrabold tracking-[.12em] text-[#8b465a] uppercase">Date &amp; time</span>
                    <time
                        datetime="{{ $fixture->start->toISOString() }}"
                        data-local-datetime
                        class="font-bold"
                    >{{ $fixture->start->format('d/m/Y H:i:s') }}</time>
                </div>
                <div class="flex flex-col gap-1">
                    <span class="text-xs font-extrabold tracking-[.12em] text-[#8b465a] uppercase">{{ ucfirst($fixture->type->value) }} rugby</span>
                    <h3 class="group-hover:text-hurricanes-purple text-2xl">vs {{ $fixture->opposition }}</h3>
                    <span class="text-sm text-[#62595d]">Nottinghamshire Hurricanes</span>
                </div>
                <div class="flex flex-col gap-1">
                    <span class="text-xs font-extrabold tracking-[.12em] text-[#8b465a] uppercase">Venue</span>
                    <span>{{ $fixture->location }}</span>
                </div>
                <span class="flex items-center justify-between gap-6 border-t border-[#e8e1e3] pt-4 text-xs font-extrabold tracking-[.08em] uppercase md:border-0 md:pt-0">
                    Match details <span aria-hidden="true" class="text-hurricanes-purple text-xl">↗</span>
                </span>
            </a>
        @empty
            <p class="border-hurricanes-purple border-l-4 bg-white p-6">No fixtures found.</p>
        @endforelse
    </div>
    <x-pagination :pagination="$fixtures" />
@endsection
