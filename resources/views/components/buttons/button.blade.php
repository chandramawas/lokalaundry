@php
    $base = 'font-bold py-2 px-5 rounded-xl cursor-pointer hover:brightness-125 transition-all';

    $variantClass = match ($variant) {
        'outline' => 'border border-primary text-primary bg-transparent hover:bg-primary/5',
        'primary' => 'bg-primary text-on-primary',
    };

    $isDisabled = filter_var($attributes->get('disabled'), FILTER_VALIDATE_BOOLEAN);

    $disabledClass = $isDisabled
        ? 'opacity-50 pointer-events-none'
        : '';

    $finalClass = trim($base . ' ' . $variantClass . ' ' . $disabledClass . ' ' . ($class ?? ''));
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $finalClass]) }} @if($isDisabled) disabled @endif>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $finalClass]) }} @if($isDisabled) disabled @endif>
        {{ $slot }}
    </button>
@endif