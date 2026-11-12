@php
    $navigation = [
        ['title' => 'Blog', 'url' => route('blog.index')],
        ['title' => 'Touch Rugby', 'links' => [
            ['title' => 'Training Sessions', 'url' => route('touch-rugby.training-sessions')],
            ['title' => 'Fixtures', 'url' => route('fixtures.index', 'touch')],
        ]],
        ['title' => 'Rugby Union', 'links' => [
            ['title' => 'Training Sessions', 'url' => route('rugby-union.training-sessions')],
            ['title' => 'Fixtures', 'url' => route('fixtures.index', 'union')],
        ]],
        ['title' => 'About Us', 'links' => [
            ['title' => 'About Us', 'url' => route('about-us')],
            ['title' => 'Our Committee', 'url' => route('committee')],
            ['title' => 'External Links', 'url' => route('external-links')],
        ]],
    ];
@endphp
<header class="font-hurricanes-header relative flex flex-row justify-center py-2">
    <div class="container flex flex-row items-stretch justify-between gap-4 px-2">
        <a href="{{ route('home') }}" wire:navigate class="hover:text-hurricanes-purple py-2 text-4xl"
            >Nottinghamshire Hurricanes</a>
        <div class="flex flex-row items-stretch justify-between">
            <nav class="hidden flex-row items-center gap-x-2 *:rounded-sm *:p-2 md:flex" aria-label="Main navigation">
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
            <div class="flex md:hidden" x-data="{ open: false }">
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
