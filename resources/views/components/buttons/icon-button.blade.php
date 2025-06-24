@php
    $base = 'cursor-pointer inline-flex items-center justify-center p-2 aspect-square rounded-full hover:brightness-125 transition-all';

    $variantClass = match ($variant) {
        'outline' => 'border border-primary text-primary bg-transparent hover:bg-primary/5',
        'primary' => 'bg-primary text-on-primary',
    };

    $isDisabled = $attributes->get('disabled') !== null;

    $disabledClass = $isDisabled
        ? 'opacity-50 pointer-events-none'
        : '';

    $finalClass = trim($base . ' ' . $variantClass . ' ' . $disabledClass . ' ' . ($class ?? ''));
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $finalClass]) }} {{ $isDisabled ? 'disabled' : '' }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $finalClass]) }} {{ $isDisabled ? 'disabled' : '' }}>
        {{ $slot }}
    </button>
@endif