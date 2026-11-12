@extends('layouts.app')
@section('content')
    <div class="flex flex-col gap-4">
        <h1>Training Sessions</h1>
        <section>
            <h2>Touch Rugby Training</h2>
            <p>Training is at 7pm at Canalside in Beeston.</p>
        </section>
        <section>
            <h2>Rugby Union Training</h2>
            <p>Join us to practise tackling and rucking and build confidence with contact.</p>
        </section>
        <x-where-do-we-train />
    </div>
@endsection
