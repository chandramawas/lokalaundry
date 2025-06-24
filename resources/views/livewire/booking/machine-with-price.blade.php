<div class="grid grid-cols-6 gap-3">
    {{-- Select Machines --}}
    <div class="relative col-span-4 border border-primary py-4 px-8 rounded-lg flex flex-col gap-4">
        {{-- Color Legend --}}
        <div class="grid grid-cols-3 gap-4 text-sm">
            <x-ui.color-legend color="machine-available" label="Tersedia" />
            <x-ui.color-legend color="machine-booked" label="Dibooking" />
            <x-ui.color-legend color="machine-maintenance" label="Dalam Perbaikan" />
        </div>

        <livewire:booking.machine-grid-picker />

        @if ($overlay)
            <div
                class="absolute inset-0 bg-white/80 backdrop-blur-xs flex flex-col items-center justify-center z-20 rounded-xl text-center p-4  transition-opacity duration-300 ease-in-out">
                <p class="text-on-surface-variant text-sm">
                    Kamu perlu memilih Sesi Waktu terlebih dahulu.
                </p>
            </div>
        @endif
    </div>

    {{-- Prices --}}
    <div class="col-span-2 border border-primary p-4 rounded-lg flex flex-col gap-2">
        <h3 class="font-bold text-lg">Price List</h3>
        <hr>
        <x-ui.machine-price title="Maks. 10kg" price="8000" width="w-1/3" />
        <x-ui.machine-price title="Maks. 16kg" price="14000" width="w-2/3" />
        <x-ui.machine-price title="Maks. 33kg" price="20000" />
        <x-ui.machine-price title="Pengering" price="20000" />
    </div>
</div>