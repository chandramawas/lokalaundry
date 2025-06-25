<x-layouts.app title="Detail Booking">
    <br>
    <x-ui.section-container id="about" title="Detail Booking">
        <div class="grid grid-cols-3 gap-6">
            <div class="flex flex-col gap-4 items-center">
                {!! SimpleSoftwareIO\QrCode\Facades\QrCode::size(200)->generate($booking->code) !!}
                <p class="font-bold">{{ $booking->code }}</p>
                <x-buttons.button variant="primary" href="{{ route('booking.download.qr', $booking->code) }}">Download
                    QR</x-buttons.button>
            </div>

            <div class="col-span-2 flex flex-col gap-6">
                <x-ui.outlet-ui name="{{ $booking->outlet->name }}" address="{{ $booking->outlet->address }}"
                    phone="{{ $booking->outlet->phone }}" />
                <div class="flex flex-col gap-1">
                    <div class="text-sm flex justify-between border-b py-2">
                        <span class="font-bold">
                            Tanggal
                        </span>
                        <span>
                            {{ \Carbon\Carbon::parse($booking->date)->translatedFormat('l, d F Y') }}
                        </span>
                    </div>
                    <div class="text-sm flex justify-between border-b py-2">
                        <span class="font-bold">
                            Sesi
                        </span>
                        <span>
                            {{ \Carbon\Carbon::parse($booking->session_start)->translatedFormat('H:i') }}
                            -
                            {{ \Carbon\Carbon::parse($booking->session_end)->translatedFormat('H:i') }}
                        </span>
                    </div>
                </div>

                <div class="flex flex-col gap-1">
                    <h2 class="font-bold text-lg">Mesin</h2>
                    @foreach($booking->bookingMachines as $bookingMachine)
                        <div class="text-sm flex justify-between border-b py-2">
                            <span class="font-bold">
                                ({{ $bookingMachine->machine->number }})
                                <span class="font-normal">
                                    {{ $bookingMachine->machine->machineType->name }}
                                </span>
                            </span>
                            <span class="font-semibold text-primary">
                                Rp{{ number_format($bookingMachine->price, 0, ',', '.') }}
                            </span>
                        </div>
                    @endforeach
                    <div class="font-semibold text-lg flex justify-between">
                        <span>Subtotal</span>
                        <span class="text-primary">Rp{{ number_format($booking->subtotal, 0, ',', '.') }}</span>
                    </div>
                </div>

                <div class="flex justify-end">
                    <x-buttons.button variant="outline" href="{{ route('home') }}">Kembali ke Beranda</x-buttons.button>
                </div>
            </div>
        </div>
    </x-ui.section-container>
</x-layouts.app>