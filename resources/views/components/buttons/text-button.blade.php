@php
    $base = 'cursor-pointer text-on-surface hover:underline transition duration-150 ease-in-out';
@endphp

<a href="{{ $href }}" class="{{ trim($base . ' ' . ($class ?? '')) }}">
    {{ $slot }}
</a>