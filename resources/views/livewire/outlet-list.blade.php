<div class="flex flex-col gap-4">
    <!-- City Filter-->
    <div class="flex gap-4 justify-center">
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
            <x-ui.outlet-ui name="{{ $outlet->name }}" address="{{ $outlet->address }}" phone="{{ $outlet->phone }}" />
        @empty
            <div class="text-center text-sm text-on-surface-variant">
                No outlets available for the selected city.
            </div>
        @endforelse
    </div>
</div>