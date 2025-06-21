@php
    $base = 'cursor-pointer hover:text-primary transition duration-150 ease-in-out';
    $fontClass = $active ? 'font-bold text-primary' : 'text-on-surface-variant';
@endphp

<a href="{{ $href }}" class="{{ trim($base . ' ' . $fontClass . ' ' . ($class ?? '')) }}">
    {{ $slot }}
</a>