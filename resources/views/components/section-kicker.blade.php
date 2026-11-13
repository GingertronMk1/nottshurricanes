@props(['number', 'light' => false])

<p {{ $attributes->class(['flex items-center gap-3 text-[.7rem] font-black tracking-[.16em] uppercase', 'text-white' => $light, 'text-[#8b465a]' => ! $light]) }}>
    <span @class(['border-b-2 pb-1', 'border-white text-white' => $light, 'border-hurricanes-purple text-[#171417]' => ! $light])>{{ $number }}</span>
    {{ $slot }}
</p>
