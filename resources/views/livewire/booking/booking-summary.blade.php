<div class="flex flex-col gap-6">
    {{-- Choosen Outlet --}}
    <x-ui.outlet-ui :name="$outlet->name" :address="$outlet->address" :phone="$outlet->phone" />

    {{-- Summary Section --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        {{-- Choosen Session --}}
        <div class="flex flex-col gap-2">
            <h3 class="text-lg font-semibold">Ringkasan Booking</h3>
            <p>Tanggal:
                <span class="font-medium">
                    {{ $selectedDateFormatted ?? '-' }}
                </span>
            </p>
            @if ($selectedSession)
                <p>Sesi:
                    <span class="font-medium">
                        {{ $selectedSession }}
                    </span>
                </p>
            @endif
            @if ($maxDuration)
                <p>Durasi Maksimal: <span class="font-medium">{{ $maxDuration }}</span></p>
            @endif
        </div>

        {{-- Product List --}}
        <div class="flex flex-col gap-3">
            <h3 class="text-lg font-semibold">Mesin</h3>

            @forelse ($selectedMachines as $machine)
                <div class="flex justify-between gap-4 items-center border-b pb-2">
                    <div class="font-medium">
                        {{ $machine->machineType->name }} ({{ $machine->number }})
                    </div>
                    <div class="text-sm font-semibold text-primary">
                        Rp{{ number_format($machine->machineType->price, 0, ',', '.') }}
                    </div>
                </div>
            @empty
                <span class="italic text-sm text-on-surface-variant">Belum ada mesin yang dipilih</span>
            @endforelse

            {{-- Subtotal --}}
            <div class="flex font-semibold justify-between items-center text-lg">
                <span>Subtotal</span>

                <span class="text-primary">
                    Rp{{ number_format($subtotal, 0, ',', '.') }}
                </span>
            </div>
        </div>
    </div>

    {{-- Action Buttons --}}
    <div class="flex gap-2 justify-center md:justify-end">
        <x-buttons.button variant="outline" href="{{ route('outlets') }}">Batal</x-buttons.button>
        @if ($selectedMachines)
            <x-buttons.button variant="primary" wire:click="confirmPayment" wire:loading.attr="disabled">
                <span wire:loading wire:target="confirmPayment">
                    <i class="fa-solid fa-spinner fa-spin"></i> Memproses...
                </span>
                <span wire:loading.remove wire:target="confirmPayment">Bayar Sekarang</span>
            </x-buttons.button>
        @endif
    </div>
</div>