<x-layouts.app title="Detail Booking">
    <br>
    <x-ui.section-container id="about" title="Detail Booking">
        <div class="grid grid-cols-3 gap-6">
            <div class="flex flex-col gap-4 items-center">
                {!! SimpleSoftwareIO\QrCode\Facades\QrCode::size(200)->generate($booking->code) !!}
                <p class="font-bold">{{ $booking->code }}</p>
                <x-buttons.button variant="primary" href="{{ route('download.qr', $booking->code) }}">
                    <i class="fa-solid fa-qrcode"></i>
                    <span class="ml-1">Download QR</span>
                </x-buttons.button>
            </div>

            <div class="col-span-2 flex flex-col gap-6">
                <div x-data="{ open: false }" class="border rounded-lg p-4">
                    <button type="button" @click="open = !open"
                        class="flex justify-between items-center w-full font-semibold text-left">
                        <span>
                            <i class="fa-solid fa-circle-info mr-1"></i> Ketentuan Booking
                        </span>
                        <svg :class="{ 'rotate-180': open }" class="h-5 w-5 transform transition-transform duration-300"
                            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <div x-show="open" x-transition class="mt-4 text-sm text-gray-700">
                        <ul class="list-disc list-inside space-y-2">
                            <li>Booking tidak dapat dikembalikan atau dibatalkan.</li>
                            <li>Booking hanya berlaku di outlet yang tertera pada transaksi.</li>
                            <li>Silakan datang sesuai jadwal yang tertera pada transaksi.</li>
                            <li>Pastikan membawa bukti transaksi atau QR Code.</li>
                            <li>Harap patuhi peraturan saat berada di Outlet.</li>
                        </ul>
                    </div>
                </div>
                <x-ui.outlet-ui name="{{ $booking->outlet->name }}" address="{{ $booking->outlet->address }}"
                    phone="{{ $booking->outlet->phone }}" />
                <div class="flex flex-col gap-1">
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
            </div>

            <div class="flex justify-end col-span-full">
                <x-buttons.button variant="outline"
                    href="{{ url()->previous() !== url()->current() ? url()->previous() : route('home') }}">
                    {{ url()->previous() !== url()->current() ? 'Kembali' : 'Kembali ke Beranda' }}
                </x-buttons.button>
            </div>
        </div>
    </x-ui.section-container>
</x-layouts.app>