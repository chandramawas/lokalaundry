<x-layouts.app title="Detail Transaksi Produk">
    <br>
    <x-ui.section-container id="about" title="Detail Transaksi Produk">
        <div class="grid grid-cols-3 gap-6">
            {{-- QR Code Section --}}
            <div class="flex flex-col gap-4 items-center">
                {!! SimpleSoftwareIO\QrCode\Facades\QrCode::size(200)->generate($transaction->code) !!}
                <p class="font-bold">{{ $transaction->code }}</p>
                <x-buttons.button variant="primary" href="{{ route('download.qr', $transaction->code) }}">
                    <i class="fa-solid fa-qrcode"></i>
                    <span class="ml-1">Download QR</span>
                </x-buttons.button>
            </div>

            {{-- Detail Produk --}}
            <div class="col-span-2 flex flex-col gap-6">
                <div x-data="{ open: false }" class="border rounded-lg p-4">
                    <button type="button" @click="open = !open"
                        class="flex justify-between items-center w-full font-semibold text-left">
                        <span>
                            <i class="fa-solid fa-circle-info mr-1"></i> Ketentuan Pengambilan Produk
                        </span>
                        <svg :class="{ 'rotate-180': open }" class="h-5 w-5 transform transition-transform duration-300"
                            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <div x-show="open" x-transition class="mt-4 text-sm text-gray-700">
                        <ul class="list-disc list-inside space-y-2">
                            <li>Produk dapat diambil di outlet {{ config('app.name') }} terdekat.</li>
                            <li>Pastikan membawa bukti transaksi atau QR Code saat pengambilan produk.</li>
                            <li>Produk yang sudah dibayar tidak dapat dikembalikan atau dibatalkan.</li>
                        </ul>
                    </div>
                </div>

                <div class="flex flex-col gap-1">
                    <div class="text-sm flex justify-between border-b py-2">
                        <span class="font-bold">
                            Waktu Pembayaran
                        </span>
                        <span>
                            {{ \Carbon\Carbon::parse($transaction->created_at)->translatedFormat('d F Y H:i') }}
                        </span>
                    </div>
                    <div class="text-sm flex justify-between border-b py-2">
                        <span class="font-bold">
                            Status Pengambilan
                        </span>
                        <span>
                            {{ $transaction->status ? 'Diambil' : 'Belum Diambil' }}
                        </span>
                    </div>
                </div>

                <div class="flex flex-col gap-1">
                    <h2 class="font-bold text-lg">Detail Produk</h2>
                    @foreach($transaction->items as $item)
                        <div class="text-sm flex justify-between border-b py-2">
                            <span class="font-medium">
                                {{ $item->product->name }}
                                <span class="font-normal">
                                    ({{ $item->quantity }} x Rp{{ number_format($item->price, 0, ',', '.') }})
                                </span>
                            </span>
                            <span class="font-semibold text-primary">
                                Rp{{ number_format($item->quantity * $item->price, 0, ',', '.') }}
                            </span>
                        </div>
                    @endforeach
                    <div class="font-semibold text-lg flex justify-between">
                        <span>Subtotal</span>
                        <span class="text-primary">Rp{{ number_format($transaction->subtotal, 0, ',', '.') }}</span>
                    </div>
                </div>

            </div>

            {{-- Buttons --}}
            <div class="flex justify-end col-span-full">
                <x-buttons.button variant="outline"
                    href="{{ url()->previous() !== url()->current() ? url()->previous() : route('home') }}">
                    {{ url()->previous() !== url()->current() ? 'Kembali' : 'Kembali ke Beranda' }}
                </x-buttons.button>
            </div>
        </div>
    </x-ui.section-container>
</x-layouts.app>