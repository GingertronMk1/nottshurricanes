@extends('layouts.app')
@section('title', 'Welcome')
@section('full-width', 'true')
@section('content')
    <div class="bg-[#f8f6f4]">
        <section class="relative h-[75vh] min-h-[610px] overflow-hidden bg-[#251b20] text-white md:h-[min(720px,78vh)] md:min-h-[650px]">
            <img
                src="{{ Vite::asset('resources/images/ro_in_manchester.jpg') }}"
                alt="A Hurricanes player on the pitch"
                class="absolute inset-0 h-full w-full object-cover object-[center_40%]"
            />
            <div class="absolute inset-0 bg-[linear-gradient(90deg,rgba(20,15,18,.95)_0%,rgba(30,19,24,.77)_43%,rgba(22,16,19,.15)_100%),linear-gradient(0deg,rgba(20,15,18,.55),transparent_35%)]"></div>
            <div class="relative z-10 mx-auto max-w-[1440px] px-6 pt-28 pb-20 md:px-20 md:pt-32 md:pb-24">
                <p class="flex items-center gap-3 text-[.7rem] font-black tracking-[.16em] uppercase">
                    <span class="bg-hurricanes-purple h-[3px] w-7"></span> Nottinghamshire's inclusive rugby club
                </p>
                <h1 class="my-8 text-[clamp(4.5rem,18vw,7rem)] leading-[.82] tracking-[-.03em] uppercase md:text-[clamp(5rem,10vw,10rem)]">
                    Find your<br /><em class="text-[#cf8499] not-italic">team.</em>
                </h1>
                <p class="max-w-[440px] leading-[1.7] text-[#eee8ea]">
                    Big tackles. New friends. Everyone welcome. Whatever your experience, there's a place for you at the
                    Hurricanes.
                </p>
                <div class="mt-8 flex flex-wrap gap-3">
                    <x-action-link :href="route('training-sessions')">Come and train</x-action-link>
                    <x-action-link :href="route('about-us')" variant="outline">Meet the club</x-action-link>
                </div>
            </div>
            <div
                class="absolute top-[30%] right-8 hidden text-[.65rem] font-extrabold tracking-[.2em] [writing-mode:vertical-rl] md:block"
                aria-hidden="true"
            >
                RUGBY FOR EVERYONE <span class="py-4 text-[#e3a6b6]">✳</span> NOTTINGHAM
            </div>
            <div class="absolute right-0 bottom-0 left-0 flex justify-between border-t border-white/25 px-6 py-4 text-[.62rem] font-extrabold tracking-[.14em] md:px-20 md:py-6">
                <span>EST. 2019</span><span class="hidden md:inline">ONE CLUB. ALL WELCOME.</span><span>01 / 03</span>
            </div>
        </section>

        <section class="mx-auto grid max-w-[1280px] gap-4 px-6 py-16 md:grid-cols-2 md:gap-20 md:px-8 md:py-28">
            <div>
                <x-section-kicker number="01">The Hurricanes</x-section-kicker>
                <h2 class="mt-6 text-[clamp(3.2rem,5.5vw,5.5rem)] leading-[.95] uppercase">
                    More than<br /><em class="text-[#cf8499] not-italic">a rugby club.</em>
                </h2>
            </div>
            <div class="max-w-[540px] text-[1.05rem] leading-[1.8] text-[#51494c] md:pt-8">
                <p>
                    We're Nottingham's first and only LGBTQ+ inclusive rugby club. On the pitch, in the clubhouse and
                    everywhere in between, we make space for everyone.
                </p>
                <p class="mt-4">
                    Whether you're picking up a ball for the first time or getting back in the game, you'll find your
                    people here. Players of all abilities, genders and sexualities are welcome. You just need to be over
                    18.
                </p>
                <a
                    href="{{ route('about-us') }}"
                    wire:navigate
                    class="border-hurricanes-purple mt-8 inline-flex gap-12 border-b-2 pb-2 text-xs font-black tracking-[.08em] text-[#171417] uppercase"
                >Get to know us <span>↗</span></a>
            </div>
        </section>

        <section class="bg-[#eee9e8] py-16 md:py-28">
            <div class="mx-auto max-w-[1280px] px-6 md:px-8">
                <div class="mb-12 flex flex-col items-start justify-between gap-8 md:flex-row md:items-end">
                    <div>
                        <x-section-kicker number="02">Find your game</x-section-kicker>
                        <h2 class="mt-6 text-[clamp(3.2rem,5.5vw,5.5rem)] leading-[.95] uppercase">
                            There's a place<br />for <em class="text-[#cf8499] not-italic">you here.</em>
                        </h2>
                    </div>
                    <p class="leading-[1.7] text-[#665e61]">
                        Two ways to play. One brilliant community.<br />Your first month is on us.
                    </p>
                </div>
                <div class="grid gap-4 md:grid-cols-2">
                    <x-game-card
                        :href="route('training-sessions')"
                        image="resources/images/bas_looking_stern.jpg"
                        alt="A Hurricanes player"
                        number="01"
                        title="Touch rugby"
                        description="Fast, social and open to all abilities."
                    />
                    <x-game-card
                        :href="route('training-sessions')"
                        image="resources/images/me_looking_fat.jpg"
                        alt="A Hurricanes player at rugby"
                        number="02"
                        title="Rugby union"
                        description="Get stuck in and learn the contact game."
                    />
                </div>
            </div>
        </section>
        <section class="bg-hurricanes-purple py-16 text-white md:py-24">
            <div class="mx-auto flex max-w-[1280px] flex-col items-start justify-between gap-8 px-6 md:flex-row md:items-end md:px-8">
                <div>
                    <x-section-kicker number="03" :light="true">Come as you are</x-section-kicker>
                    <h2 class="mt-6 text-[clamp(3.2rem,5.5vw,5.5rem)] leading-[.95] uppercase">
                        Ready to be<br /><em class="text-[#261820] not-italic">a Hurricane?</em>
                    </h2>
                    <p class="mt-6">No experience needed. Just bring yourself.</p>
                </div>
                <x-action-link :href="route('training-sessions')" variant="light"
                    >Find a training session</x-action-link>
            </div>
        </section>
    </div>
@endsection
