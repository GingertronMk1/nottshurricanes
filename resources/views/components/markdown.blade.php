@props(['markdown' => null])
@if ($markdown)
    <section class="markdown-renderer">
        {!! \Illuminate\Support\Str::markdown($markdown, ['html_input' => 'strip', 'allow_unsafe_links' => false]) !!}
    </section>
@endif
