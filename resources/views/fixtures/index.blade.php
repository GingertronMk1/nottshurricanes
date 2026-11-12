@extends('layouts.app')
@section('title', 'Index')
@section('content')
<h2 class="mb-4">{{ ucfirst($type->value) }} fixtures</h2>
<div class="flex flex-col gap-2">
    @foreach ($fixtures as $fixture)
        <a href="{{ route('fixtures.show', [$type, $fixture]) }}" wire:navigate class="group flex flex-col items-start gap-2 md:flex-row md:items-center">
            <h4 class="group-hover:text-hurricanes-purple flex-1">vs. {{ $fixture->opposition }}</h4>
            <span>@ {{ $fixture->location }}, <time datetime="{{ $fixture->start->toISOString() }}" data-local-datetime>{{ $fixture->start->format('d/m/Y H:i:s') }}</time></span>
        </a>
    @endforeach
</div>
<x-pagination :pagination="$fixtures" />
@endsection
