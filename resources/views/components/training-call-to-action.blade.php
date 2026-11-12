@props(['variant' => 'primary'])

<x-action-link :href="route('training-sessions')" :variant="$variant" {{ $attributes }}>
    Find a training session
</x-action-link>
