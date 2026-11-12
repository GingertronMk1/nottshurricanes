<footer class="bg-[#171417] px-6 pt-16 pb-6 text-white lg:px-[max(1.5rem,calc((100vw-1280px)/2))]">
    <div class="flex flex-col justify-between gap-8 pb-16 md:flex-row">
        <div>
            <a href="{{ route('home') }}" wire:navigate class="text-[.7rem] leading-tight font-extrabold tracking-[.12em]">NOTTINGHAMSHIRE<br /><strong class="font-hurricanes-header text-[2.4rem] font-normal tracking-normal">HURRICANES.</strong></a>
            <p class="mt-4 text-[#c7bfc2]">Inclusive rugby. Unforgettable people.</p>
        </div>
        <div class="flex flex-col gap-3 text-sm [&_a:hover]:text-[#e3a6b6]">
            <a href="{{ route('about-us') }}" wire:navigate>Our club</a>
            <a href="{{ route('touch-rugby.training-sessions') }}" wire:navigate>Come and train</a>
            <span>Nottingham, UK</span>
        </div>
    </div>
    <div class="flex justify-between gap-4 border-t border-[#514a4e] pt-6 text-[.65rem] font-bold tracking-[.1em] text-[#b9afb3]"><span>© Nottinghamshire Hurricanes</span><span>ONE CLUB. ALL WELCOME.</span></div>
</footer>
