@php
    $base = 'font-bold py-2 px-5 rounded-xl cursor-pointer hover:brightness-125 transition-all';

    $variantClass = match ($variant) {
        'outline' => 'border border-primary text-primary bg-transparent hover:bg-primary/5',
        'primary' => 'bg-primary text-on-primary',
    };

    $finalClass = trim($base . ' ' . $variantClass . ' ' . ($class ?? ''));
@endphp

@if ($href)
    <a href="{{ $href }}" class="{{ $finalClass }}">
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" class="{{ $finalClass }}">
        {{ $slot }}
    </button>
@endif