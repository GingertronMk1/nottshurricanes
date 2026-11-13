@php
    use App\RugbyType;

    $navigation = [
        ['title' => 'Blog', 'url' => route('blog.index')],
        ['title' => 'Training Sessions', 'url' => route('training-sessions')],
        ['title' => 'Touch Rugby', 'links' => [
            ['title' => 'About', 'url' => route('touch-rugby.index')],
            ['title' => 'Fixtures', 'url' => route('fixtures.index', ['type' => RugbyType::TOUCH])],
        ]],
        ['title' => 'Rugby Union', 'links' => [
            ['title' => 'About', 'url' => route('rugby-union.index')],
            ['title' => 'Fixtures', 'url' => route('fixtures.index', ['type' => RugbyType::UNION])],
        ]],
        ['title' => 'About Us', 'links' => [
            ['title' => 'About Us', 'url' => route('about-us')],
            ['title' => 'Our Committee', 'url' => route('committee')],
            ['title' => 'Contact Us', 'url' => route('contact')],
            ['title' => 'External Links', 'url' => route('external-links')],
        ]],
    ];
@endphp
<div class="flex justify-center bg-[#171417] px-6 py-2 text-[.55rem] font-extrabold tracking-[.16em] text-white md:justify-between md:text-[.6rem] lg:px-[max(1.5rem,calc((100vw-1440px)/2))]">
    <span>NOTTINGHAMSHIRE'S INCLUSIVE RUGBY CLUB</span
    ><span class="hidden text-[#e3a6b6] md:inline">ONE CLUB. ALL WELCOME.</span>
</div>
<header class="relative z-40 bg-white">
    <div class="mx-auto flex min-h-[76px] max-w-[1440px] items-center justify-between gap-8 px-4 py-2 md:min-h-[94px] md:px-8 md:py-3">
        <a
            href="{{ route('home') }}"
            wire:navigate
            class="flex items-center gap-3 text-[.63rem] leading-none font-black tracking-[.1em] text-[#171417]"
            aria-label="Nottinghamshire Hurricanes home"
        >
            <img
                src="{{ Vite::asset('resources/images/club_logo.jpg') }}"
                alt=""
                class="size-[46px] object-contain md:size-14"
            />
            <span
                >NOTTINGHAMSHIRE<strong
                    class="font-hurricanes-header mt-1 block text-xl tracking-normal md:text-[1.55rem]"
                    >HURRICANES<span class="text-hurricanes-purple">.</span></strong
                ></span>
        </a>
        <div class="flex items-stretch gap-6 self-stretch text-[.82rem] font-bold">
            <nav class="hidden flex-row items-center gap-x-2 *:rounded-sm *:p-2 lg:flex" aria-label="Main navigation">
                @foreach ($navigation as $section)
                    @if (isset($section['url']))
                        <a
                            class="hover:text-hurricanes-purple hover:bg-gray-100"
                            href="{{ $section['url'] }}"
                            wire:navigate
                        >{{ $section['title'] }}</a>
                    @else
                        <div
                            class="relative"
                            x-data="{ open: false }"
                            @mouseenter="open = true"
                            @mouseleave="open = false"
                            @focusin="open = true"
                            @focusout="if (! $el.contains($event.relatedTarget)) open = false;"
                        >
                            <button
                                type="button"
                                class="cursor-pointer"
                                @click="open = ! open"
                                :aria-expanded="open.toString()"
                            >
                                {{ $section['title'] }}
                            </button>
                            <div
                                x-cloak
                                x-show="open"
                                class="absolute right-0 z-50 mt-2 flex min-w-36 flex-col items-stretch gap-y-2 rounded-md border border-gray-300 bg-white p-2 text-center shadow-lg"
                            >
                                @foreach ($section['links'] as $link)
                                    <a
                                        href="{{ $link['url'] }}"
                                        wire:navigate
                                        class="hover:text-hurricanes-purple hover:bg-gray-100"
                                    >{{ $link['title'] }}</a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            </nav>
            <a
                href="{{ route('training-sessions') }}"
                wire:navigate
                class="bg-hurricanes-purple hidden items-center gap-8 px-5 text-[.7rem] tracking-[.08em] text-white transition-colors hover:bg-[#171417] lg:flex"
            >JOIN THE CLUB <span>↗</span></a>
            <div class="flex lg:hidden" x-data="{ open: false }">
                <div class="flex flex-col justify-center">
                    <button
                        type="button"
                        class="material-icons"
                        @click="open = ! open"
                        :aria-expanded="open.toString()"
                        aria-label="Toggle navigation"
                        x-text="open ? 'close' : 'menu'"
                    ></button>
                </div>
                <nav
                    x-cloak
                    x-show="open"
                    class="absolute top-full right-0 left-0 z-50 flex flex-col items-stretch justify-center gap-2 bg-white py-2"
                    aria-label="Mobile navigation"
                >
                    @foreach ($navigation as $section)
                        @if (isset($section['url']))
                            <a
                                href="{{ $section['url'] }}"
                                wire:navigate
                                class="hover:text-hurricanes-purple px-2 hover:bg-gray-100"
                            >{{ $section['title'] }}</a>
                        @else
                            <div class="relative" x-data="{ expanded: false }">
                                <button
                                    type="button"
                                    @click="expanded = ! expanded"
                                    :aria-expanded="expanded.toString()"
                                    class="flex cursor-pointer items-center px-2"
                                >
                                    {{ $section['title'] }}<span
                                        class="material-icons"
                                        x-text="expanded ? 'keyboard_arrow_down' : 'keyboard_arrow_right'"
                                    ></span>
                                </button>
                                <div
                                    x-cloak
                                    x-show="expanded"
                                    class="mx-auto flex w-[95%] flex-col items-stretch gap-y-2 border border-gray-300 bg-white p-2 text-center shadow-lg"
                                >
                                    @foreach ($section['links'] as $link)
                                        <a
                                            href="{{ $link['url'] }}"
                                            wire:navigate
                                            class="hover:text-hurricanes-purple px-2 hover:bg-gray-100"
                                        >{{ $link['title'] }}</a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                </nav>
            </div>
        </div>
    </div>
</header>
