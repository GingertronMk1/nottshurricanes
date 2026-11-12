<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <title>@hasSection('title')@yield('title') - @endif{{ config('app.name', 'Laravel') }}</title>
</head>
<body class="font-sans antialiased">
    <div id="app" class="flex h-full flex-col">
        @include('components.header')
        <div class="bg-hurricanes-purple font-hurricanes-body flex flex-1 flex-row justify-center">
            <main class="container flex flex-col items-stretch bg-white p-2 text-black dark:bg-black dark:text-white">
                @yield('content')
            </main>
        </div>
    </div>
    @livewireScripts
</body>
</html>
