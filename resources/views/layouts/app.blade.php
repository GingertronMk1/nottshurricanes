<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="/favicon.ico" sizes="any" />
    <link rel="icon" href="/favicon.svg" type="image/svg+xml" />
    <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <title>
        @hasSection('title') @yield('title')- @endif
        {{ config('app.name', 'Laravel') }}
    </title>
</head>
<body class="font-sans antialiased">
    <div id="app" class="site-shell">
        <a href="#main-content" class="skip-link">Skip to content</a>
        @include('components.header')
        <div class="site-content"><main id="main-content" class="site-main"><div class="page-content">@yield('content')</div></main></div>
        <footer class="site-footer"><div class="footer-inner"><div><a href="{{ route('home') }}" wire:navigate class="footer-brand">NOTTINGHAMSHIRE<br /><strong>HURRICANES.</strong></a><p>Inclusive rugby. Unforgettable people.</p></div><div class="footer-links"><a href="{{ route('about-us') }}" wire:navigate>Our club</a><a href="{{ route('touch-rugby.training-sessions') }}" wire:navigate>Come and train</a><span>Nottingham, UK</span></div></div><div class="footer-bottom"><span>© Nottinghamshire Hurricanes</span><span>ONE CLUB. ALL WELCOME.</span></div></footer>
    </div>
    @livewireScripts
</body>
</html>
