@extends('layouts.app')
@section('content')
    @if (request()->routeIs('touch-rugby.*'))
        <h1>Touch Rugby Training</h1>
        <p>Training is at 7pm at Canalside in Beeston.</p>
    @elseif (request()->routeIs('rugby-union.*'))
        <h1>Rugby Union Training</h1>
        <p>Join us to practise tackling and rucking and build confidence with contact.</p>
    @endif
    <x-where-do-we-train />
@endsection
