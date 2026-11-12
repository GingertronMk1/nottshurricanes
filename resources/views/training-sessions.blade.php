@extends('layouts.app')
@section('content')
    <x-markdown :markdown="$pageContent?->content" />
    <x-where-do-we-train />
@endsection
