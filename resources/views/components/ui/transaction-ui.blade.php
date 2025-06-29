@php
    if ($variant == 'income') {
        $icon = 'fa-plus';
        $iconClass = 'bg-primary text-on-primary';
        $walletClass = 'text-primary';
        $symbol = '+';
    } elseif ($variant == 'expense') {
        $icon = 'fa-minus';
        $iconClass = 'bg-red-500 text-red-50';
        $walletClass = 'text-red-500';
        $symbol = '-';
    } else {
        $icon = 'fa-question';
        $iconClass = 'bg-gray-700 text-gray-50';
        $walletClass = 'text-gray-700';
        $symbol = '';
    }

@endphp

<a href="{{ $href }}"
    class="border border-primary px-6 py-4 rounded-lg flex flex-col md:flex-row md:items-center gap-4 hover:bg-primary/10 text-center md:text-left">
    <div class="flex items-center justify-center size-12 rounded-full {{ $iconClass }} mx-auto md:mx-0">
        <i class="fa-solid {{ $icon }}"></i>
    </div>

    <div class="flex-1 gap-1">
        <h4 class="text-lg font-bold">
            {{ $title }}
            @if ($subtitle)
                <span class="font-medium">
                    ({{ $subtitle }})
                </span>
            @endif
        </h4>
        <p>{{ $date }}</p>
    </div>

    <div class="flex flex-col items-center md:items-end gap-1">
        <p class="font-medium">{{ $symbol }}Rp{{ number_format($amount, 0, ',', '.') }}</p>
        <i class="fa-solid fa-wallet {{ $walletClass }}"></i>
    </div>
</a>