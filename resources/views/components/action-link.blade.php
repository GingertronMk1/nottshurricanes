@props(['href', 'variant' => 'primary'])

<a
    href="{{ $href }}"
    wire:navigate
    {{
        $attributes->class([
            'inline-flex min-h-14 items-center justify-between gap-12 px-6 text-xs font-extrabold tracking-[.07em] uppercase transition-colors',
            'bg-hurricanes-purple text-white hover:bg-[#8f4058]' => $variant === 'primary',
            'border border-white/65 text-white hover:bg-white hover:text-[#171417]' => $variant === 'outline',
            'bg-white text-[#171417] hover:bg-[#171417] hover:text-white' => $variant === 'light',
        ])
    }}
>
    {{ $slot }} <span aria-hidden="true">↗</span>
</a>
