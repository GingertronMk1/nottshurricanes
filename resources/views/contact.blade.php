@extends('layouts.app')
@section('title', 'Contact Us')
@section('content')
    <div class="mx-auto flex max-w-4xl flex-col gap-8">
        <header class="flex flex-col gap-4"><p class="text-hurricanes-purple text-xs font-black tracking-[.16em] uppercase">Get in touch</p><h1 class="text-5xl uppercase md:text-6xl">Let's talk rugby.</h1><p class="max-w-2xl text-lg leading-relaxed">Thinking of joining, have a question about training or just want to say hello? We'd love to hear from you.</p></header>
        <div class="grid gap-4 md:grid-cols-2">
            <section class="flex flex-col gap-3 bg-white p-6"><h2>General enquiries</h2><p>Ask us about the club, rugby union or getting involved.</p><a class="text-hurricanes-purple break-all underline" href="mailto:NottsHurricanes@outlook.com">NottsHurricanes@outlook.com</a></section>
            <section class="flex flex-col gap-3 bg-white p-6"><h2>Touch rugby</h2><p>Have a question specifically about touch? Contact our touch team.</p><a class="text-hurricanes-purple break-all underline" href="mailto:HurricanesTouch@outlook.com">HurricanesTouch@outlook.com</a></section>
        </div>
        <section class="flex flex-col gap-3"><h2>Follow the Hurricanes</h2><p>Follow along for club news, training updates and socials.</p><div class="flex flex-wrap gap-6"><a class="text-hurricanes-purple underline" href="https://www.facebook.com/NottinghamshireHurricanes/" target="_blank" rel="noopener noreferrer">Facebook</a><a class="text-hurricanes-purple underline" href="https://www.instagram.com/nottshurricanes" target="_blank" rel="noopener noreferrer">Instagram</a></div></section>
    </div>
@endsection
