<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="{{ Vite::asset('resources/images/club_logo.jpg') }}" type="image/jpeg" />
    <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <title>
        @hasSection('title') @yield('title')- @endif
        {{ config('app.name', 'Laravel') }}
    </title>
</head>
<body class="bg-[#111] font-hurricanes-body text-[#171417] antialiased">
    <div id="app" class="flex min-h-screen flex-col">
        <a href="#main-content" class="absolute -top-[100px] left-4 z-100 bg-white p-4 focus:top-4">Skip to content</a>
        @include('components.header')
        <div class="flex-1 bg-[#f8f6f4]">
            <main id="main-content" class="min-h-[45vh]">
                <div @class(['mx-auto max-w-[1280px] px-6 py-12' => ! View::hasSection('full-width')])>@yield('content')</div>
            </main>
        </div>
        <x-footer />
    </div>
    @livewireScripts
</body>
</html>
