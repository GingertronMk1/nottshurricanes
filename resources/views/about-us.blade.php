@extends('layouts.app')
@section('title', 'About Us')
@section('content')
    <div class="mx-auto flex max-w-4xl flex-col gap-10">
        <header class="flex flex-col gap-4">
            <p class="text-hurricanes-purple text-xs font-black tracking-[.16em] uppercase">Our club · Est. 2019</p>
            <h1 class="text-5xl uppercase md:text-6xl">Rugby for everyone.</h1>
            <p class="max-w-2xl text-lg leading-relaxed">The Nottinghamshire Hurricanes are an LGBTQ+ inclusive rugby club, bringing people together on and off the pitch.</p>
        </header>
        <section class="flex flex-col gap-4 border-t border-[#d9d0d2] pt-8">
            <h2>Our story</h2>
            <p>Founded in Mansfield on 13 June 2019, the Hurricanes grew from a touch rugby team into a club with a place for touch and rugby union. We're proud to bring inclusive rugby to Nottinghamshire and welcome players from across the region.</p>
            <p>We're an associate member of <a class="text-hurricanes-purple underline" href="https://igrugby.org/club/nottinghamshire-hurricanes/" target="_blank" rel="noopener noreferrer">International Gay Rugby</a>, part of a wider community of inclusive clubs.</p>
        </section>
        <section class="flex flex-col gap-4 border-t border-[#d9d0d2] pt-8">
            <h2>Come as you are</h2>
            <p>Whether you've played for years, are returning to rugby or have never picked up a ball, you're welcome here. Our club is open to adults aged 18 and over of all genders and sexualities; you don't need to identify as LGBTQ+ to join.</p>
            <p>We want everyone to have a respectful place to be active, learn, make friends and feel part of a team. Rugby is only part of the story: we also enjoy socials and spending time together away from the pitch.</p>
        </section>
        <section class="flex flex-col gap-4 border-t border-[#d9d0d2] pt-8">
            <h2>Our community</h2>
            <p>Our touch team has taken part in IGR Northern Touch League tournament days in Preston, Manchester, Liverpool, Newcastle and Coventry. We've also held opportunities to try rugby and development days with other teams.</p>
            <p>In 2025, the Hurricanes received a Nottinghamshire's Rainbow Heritage award, recognising our place in the local LGBTQ+ community.</p>
            <div class="flex flex-wrap gap-3"><x-action-link :href="route('training-sessions')">Come and train</x-action-link><x-action-link :href="route('contact')" variant="light">Get in touch</x-action-link></div>
        </section>
    </div>
@endsection
