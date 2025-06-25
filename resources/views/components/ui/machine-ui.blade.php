@php
    $base = 'flex flex-col gap-1 items-center cursor-pointer transition-all';

    $color = match ($status) {
        'selected' => 'bg-primary text-on-primary',
        'available' => 'bg-machine-available text-on-primary',
        'booked' => 'bg-machine-booked text-on-primary',
        'maintenance' => 'bg-machine-maintenance text-on-primary',
    };

    $isDisabled = $status === 'booked' || $status === 'maintenance';

    $boxClass = "w-full aspect-square rounded-lg flex flex-col justify-center items-center p-4 font-medium $color";

    $containerClass = $base . ' ' . ($isDisabled ? 'pointer-events-none cursor-not-allowed' : 'hover:brightness-90');
@endphp

<div {{ $attributes->merge(['class' => $containerClass]) }} @if($isDisabled) disabled @endif>
    <p class="font-bold">{{ $number }}</p>

    <div class="{{ $boxClass }}">
        @if ($type === 'w')
            <span>Maks.</span>
            <span>{{ $capacity ?? '?' }}kg</span>
        @else
            <x-icons.washing-machine />
        @endif
    </div>
</div>