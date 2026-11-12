@extends('layouts.app')
@section('title', 'Welcome')
@section('content')
    <div class="[&>*:nth-child(even)]:md:flex-row-reverse [&>*:nth-child(odd)]:md:flex-row [&>*>*]:flex-1 [&>*>*]:md:max-w-1/2 [&>div>div]:flex [&>div>div]:flex-col [&>div>div]:justify-center [&>div>div]:gap-y-2 [&>div>img]:rounded-md [&>div>img]:object-cover *:flex *:flex-col *:gap-4 *:md:gap-0">
        <div>
            <div class="pr-2">
                <h2>Who are we?</h2>
                <p>
                    We are the Nottinghamshire Hurricanes, Nottingham's first and only LGBTQ+ inclusive rugby club. We
                    compete in the IGR North league in touch rugby, as well as training for rugby union.
                </p>
                <p>
                    We welcome players of all abilities, genders, and sexualities for both touch and contact rugby. So
                    long as you're over 18, the risk assessments are a bugger otherwise.
                </p>
            </div>
            <img src="{{ Vite::asset('resources/images/ro_in_manchester.jpg') }}" alt="Ro in Manchester" />
        </div>
        <div>
            <div class="pl-2">
                <h2>We're a social club!</h2>
                <p>
                    Rugby is only one small part of what we do at the Hurricanes. Whether it is post-tournament socials,
                    board game cafe trips, or joint socials with other LGBTQIA+ groups in Nottingham, there's always
                    something to do that doesn't involve funny-shaped balls!
                </p>
            </div>
            <img src="{{ Vite::asset('resources/images/bas_looking_stern.jpg') }}" alt="Bas looking stern" />
        </div>
        <div>
            <div class="pr-2">
                <h2>So what are you waiting for?</h2>
                <p>
                    The first month is on the house, there's no experience required, and we have a range of players from
                    all walks of life. So come on down to one of our training sessions, or get in touch with us via our
                    social media channels to find out more!
                </p>
            </div>
            <img src="{{ Vite::asset('resources/images/me_looking_fat.jpg') }}" alt="Jack looking fat" />
        </div>
    </div>
@endsection
