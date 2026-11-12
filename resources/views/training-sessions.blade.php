@extends('layouts.app')
@section('content')
    <div class="flex flex-col gap-4">
        <h1>Training Sessions</h1>

        <p>New to rugby or returning after a break? Come and give it a go. We welcome adults of all abilities, genders and sexualities, and your first month is free.</p>
        <p class="border-l-4 border-hurricanes-purple bg-white p-4">Training times and venues can change. Please <a href="{{ route('contact') }}" wire:navigate class="text-hurricanes-purple underline">contact us</a> before travelling to confirm the next session.</p>
        <h3>When do we train?</h3>

        <h5>Touch Rugby</h5>
        <p>We train Touch Rugby at 7pm every Tuesday</p>

        <h5>Rugby Union</h5>
        <p>We train Rugby Union at 11am every Saturday</p>

        <h3>Where do we train?</h3>
        <p>We train at Nottingham Casuals in Beeston</p>
        <p>Specifically at Canal Side, Beeston, Nottingham, NG9 1NG</p>
        <iframe
            title="Nottingham Casuals Rugby Club map"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2405.7770588121975!2d-1.1958316232947153!3d52.91644077216778!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4879c3b875aae379%3A0xb19653f52f4b713a!2sNottingham%20Casuals%20Rugby%20Club%20Ltd!5e0!3m2!1sen!2suk!4v1788972480635!5m2!1sen!2suk"
            height="450"
            loading="lazy"
            referrerpolicy="strict-origin-when-cross-origin"
        ></iframe>
    </div>
@endsection
