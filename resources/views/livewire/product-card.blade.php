<div
    class="border border-primary rounded-lg p-4 size-full flex flex-col gap-6 justify-between text-center md:text-left">
    {{-- Product Info --}}
    <div class="flex flex-col gap-2">
        <div class="h-40 w-full overflow-hidden flex justify-center rounded">
            <img src="{{ $image ? asset('storage/' . $image) : asset('images/placeholder.jpg') }}" alt="{{ $name }}"
                class="h-full object-cover">
        </div>
        <div class="flex flex-col gap-1">
            <h3 class="text-lg font-semibold">{{ $name }}</h3>
            <span class="text-primary">Rp{{ number_format($price, 0, ',', '.') }}</span>
        </div>
    </div>

    {{-- Cart Buttons --}}
    @auth
        <div class="flex gap-2 text-xs items-center justify-center md:justify-start">
            <x-buttons.button wire:click="decrement" wire:loading.attr="disabled">
                <i class="fa-solid fa-minus" wire:loading.remove wire:target="decrement"></i>
                <i class="fa-solid fa-spinner fa-spin" wire:loading wire:target="decrement"></i>
            </x-buttons.button>
            <span class="size-full flex items-center justify-center border rounded p-1">
                {{ $quantity }}
            </span>
            <x-buttons.button wire:click="increment" wire:loading.attr="disabled">
                <i class="fa-solid fa-plus" wire:loading.remove wire:target="increment"></i>
                <i class="fa-solid fa-spinner fa-spin" wire:loading wire:target="increment"></i>
            </x-buttons.button>
        </div>
    @endauth
</div>