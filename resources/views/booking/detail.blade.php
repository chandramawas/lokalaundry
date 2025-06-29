<x-layouts.app title="Detail Booking">
    <br>
    <x-ui.section-container id="about" title="Detail Booking">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- QR Code Section --}}
            <div class="flex flex-col gap-4 items-center text-center">
                {!! SimpleSoftwareIO\QrCode\Facades\QrCode::size(200)->generate($booking->code) !!}
                <p class="font-bold">{{ $booking->code }}</p>
                <x-buttons.button variant="primary" href="{{ route('download.qr', $booking->code) }}">
                    <i class="fa-solid fa-qrcode"></i>
                    <span class="ml-1">Download QR</span>
                </x-buttons.button>
            </div>

            {{-- Detail Section --}}
            <div class="md:col-span-2 flex flex-col gap-6">
                <x-ui.terms.booking />
                <x-ui.outlet-ui name="{{ $booking->outlet->name }}" address="{{ $booking->outlet->address }}"
                    phone="{{ $booking->outlet->phone }}" />

                {{-- Booking Info --}}
                <div class="flex flex-col gap-1 w-full">
                    <div class="text-sm flex justify-between border-b py-2">
                        <span class="font-bold">
                            Waktu Pembayaran
                        </span>
                        <span>
                            {{ \Carbon\Carbon::parse($booking->created_at)->translatedFormat('d F Y H:i') }}
                        </span>
                    </div>
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

                {{-- Machine Info --}}
                <div class="flex flex-col gap-1 w-full">
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
            </div>

            {{-- Back Button --}}
            <div class="flex justify-center md:justify-end col-span-full">
                <x-buttons.button variant="outline"
                    href="{{ url()->previous() !== url()->current() ? url()->previous() : route('home') }}">
                    {{ url()->previous() !== url()->current() ? 'Kembali' : 'Kembali ke Beranda' }}
                </x-buttons.button>
            </div>
        </div>
    </x-ui.section-container>
</x-layouts.app>