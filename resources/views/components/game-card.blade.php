@props(['href', 'image', 'alt', 'number', 'title', 'description'])

<a
    href="{{ $href }}"
    wire:navigate
    class="group relative min-h-[350px] overflow-hidden bg-[#30272b] text-white md:min-h-[440px]"
>
    <img
        src="{{ Vite::asset($image) }}"
        alt="{{ $alt }}"
        class="absolute h-full w-full object-cover transition-transform duration-400 group-hover:scale-[1.04]"
    />
    <div class="absolute inset-0 bg-linear-to-t from-[#130d10]/95 to-transparent"></div>
    <div class="absolute right-0 bottom-0 left-0 p-8">
        <span class="text-[.65rem] font-black tracking-[.14em] text-[#e5a8b8]">{{ $number }} / PLAY</span>
        <h3 class="my-2 text-5xl uppercase">{{ $title }}</h3>
        <p class="text-[#e4dcdf]">{{ $description }}</p>
        <span
            aria-hidden="true"
            class="absolute right-8 bottom-8 grid size-[42px] place-items-center border border-white/50"
        >↗</span>
    </div>
</a>
