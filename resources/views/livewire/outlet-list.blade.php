<div class="flex flex-col gap-6">
    <!-- City Filter-->
    <div class="flex flex-wrap gap-2 justify-center">
        @foreach ($cities as $city)
            <x-buttons.button wire:click="selectCity('{{ $city }}')" type="button"
                variant="{{ $selectedCity === $city ? 'primary' : 'outline' }}">
                <span wire:loading wire:target="selectCity('{{ $city }}')" class="mr-1">
                    <i class="fa-solid fa-spinner fa-spin"></i>
                </span>
                {{ $city }}
            </x-buttons.button>
        @endforeach
    </div>

    <!-- Outlet List -->
    <div class="flex flex-col gap-4">
        @forelse ($outlets as $outlet)
            <x-ui.outlet-ui name="{{ $outlet->name }}" address="{{ $outlet->address }}" phone="{{ $outlet->phone }}" button
                buttonLabel="Pilih Outlet" buttonVariant="primary" buttonHref="{{ route('booking', $outlet->id) }}" />
        @empty
            <div class="text-center text-sm text-on-surface-variant">
                Tidak ada outlet yang tersedia.
            </div>
        @endforelse
    </div>
</div>