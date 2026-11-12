@props(['pagination'])
<div class="mt-8 flex flex-row items-stretch gap-2">
    @foreach ($pagination->linkCollection() as $link)
        <a
            href="{{ $link['url'] ?? '#' }}"
            @if ($link['url']) wire:navigate @else aria-disabled="true" @endif
            @class(['font-hurricanes-header text-md flex flex-col items-center justify-center px-2 py-1 md:px-4 md:py-2 md:text-2xl', 'hover:text-hurricanes-purple bg-white text-black' => $link['url'], 'cursor-not-allowed bg-gray-500 text-gray-800' => ! $link['url'], 'bg-hurricanes-purple!' => $link['active']])
        ><span class="whitespace-nowrap">{!! $link['label'] !!}</span></a>
    @endforeach
</div>
