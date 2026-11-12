@extends('layouts.app')
@section('title', 'Welcome')
@section('content')
        <div class="home-page">
            <section class="hero">
                <img src="{{ Vite::asset('resources/images/ro_in_manchester.jpg') }}" alt="A Hurricanes player on the pitch" class="hero-image" />
                <div class="hero-shade"></div>
                <div class="hero-content">
                    <p class="eyebrow"><span></span> Nottinghamshire's inclusive rugby club</p>
                    <h1>Find your<br /><em>team.</em></h1>
                    <p class="hero-copy">Big tackles. New friends. Everyone welcome. Whatever your experience, there's a place for you at the Hurricanes.</p>
                    <div class="hero-actions">
                        <a href="{{ route('touch-rugby.training-sessions') }}" wire:navigate class="button button-primary">Come and train <span aria-hidden="true">↗</span></a>
                        <a href="{{ route('about-us') }}" wire:navigate class="button button-outline">Meet the club <span aria-hidden="true">→</span></a>
                    </div>
                </div>
                <div class="hero-side" aria-hidden="true">RUGBY FOR EVERYONE <span>✳</span> NOTTINGHAM</div>
                <div class="hero-bottom"><span>EST. 2019</span><span>ONE CLUB. ALL WELCOME.</span><span>01 / 03</span></div>
            </section>

            <section class="intro section-wrap">
                <div><p class="section-kicker"><span>01</span> THE HURRICANES</p><h2>More than<br /><em>a rugby club.</em></h2></div>
                <div class="intro-copy"><p>We're Nottingham's first and only LGBTQ+ inclusive rugby club. On the pitch, in the clubhouse and everywhere in between, we make space for everyone.</p><p>Whether you're picking up a ball for the first time or getting back in the game, you'll find your people here. Players of all abilities, genders and sexualities are welcome. You just need to be over 18.</p><a href="{{ route('about-us') }}" wire:navigate class="text-link">Get to know us <span>↗</span></a></div>
            </section>

            <section class="play-section">
                <div class="section-wrap">
                    <div class="section-heading"><div><p class="section-kicker"><span>02</span> FIND YOUR GAME</p><h2>There's a place<br />for <em>you here.</em></h2></div><p>Two ways to play. One brilliant community.<br />Your first month is on us.</p></div>
                    <div class="game-grid">
                        <a href="{{ route('touch-rugby.training-sessions') }}" wire:navigate class="game-card"><img src="{{ Vite::asset('resources/images/bas_looking_stern.jpg') }}" alt="A Hurricanes player" /><div class="game-card-content"><span>01 / PLAY</span><h3>Touch rugby</h3><p>Fast, social and open to all abilities.</p><span class="card-arrow">↗</span></div></a>
                        <a href="{{ route('rugby-union.training-sessions') }}" wire:navigate class="game-card"><img src="{{ Vite::asset('resources/images/me_looking_fat.jpg') }}" alt="A Hurricanes player at rugby" /><div class="game-card-content"><span>02 / PLAY</span><h3>Rugby union</h3><p>Get stuck in and learn the contact game.</p><span class="card-arrow">↗</span></div></a>
                    </div>
                </div>
            </section>
            <section class="join-section"><div class="section-wrap join-inner"><div><p class="section-kicker"><span>03</span> COME AS YOU ARE</p><h2>Ready to be<br /><em>a Hurricane?</em></h2><p>No experience needed. Just bring yourself.</p></div><a href="{{ route('touch-rugby.training-sessions') }}" wire:navigate class="button button-light">Find a training session <span>↗</span></a></div></section>
        </div>
@endsection
