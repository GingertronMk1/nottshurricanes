@extends('layouts.app')

@section('content')
    <div class="flex flex-col space-y-2">
        <h1>Rugby Union</h1>

        <p>
            Since 2023 we have run a Rugby Union team, aiming to bring inclusive rugby union to Nottinghamshire.
            We strongly oppose the RFU's rulings regarding trans players in rugby, and anyone who wants to come along
            and get scrumming is more than welcome to (we also don't mind if you're a back).
        </p>

        <p>
            While we're not part of any formalised league structure with our union team, we take part in tournaments
            such as the Unity Cup, and organise fixtures with other local-ish IGR teams such as the Manchester Village
            Spartans.
        </p>
        <p>We work on the skills and confidence needed for contact rugby, and welcome beginners as well as players returning to the game.</p>
        <a href="{{ route('training-sessions') }}" wire:navigate class="text-hurricanes-purple underline">Find a training session</a>
    </div>
@endsection
