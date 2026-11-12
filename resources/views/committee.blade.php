@extends('layouts.app')
@section('content')
    <div class="grid grid-cols-1 gap-2 sm:grid-cols-2 md:grid-cols-4">
        @foreach ($committee_members as $member)
            <div class="flex flex-col items-stretch gap-2">
                <img
                    src="{{ $member->profile_picture_url ?? Vite::asset('resources/images/club_logo.jpg') }}"
                    alt="{{ $member->name }}"
                    class="aspect-square rounded-sm object-cover"
                />
                <h4>{{ $member->role }}</h4>
                <div>
                    <span class="font-hurricanes-body text-lg">{{ $member->name }}</span>
                    @if ($member->pronouns)
                        <span class="mb-auto text-sm"> - {{ $member->pronouns }}</span>
                    @endif
                </div>
                <p>{{ $member->description }}</p>
            </div>
        @endforeach
    </div>
@endsection
