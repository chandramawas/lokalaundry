<x-layouts.app title="Detail Top Up">
    <br>
    <x-ui.section-container id="topup-detail" title="Detail Top Up">
        <div class="flex flex-col gap-6">
            {{-- Detail Top Up --}}
            <div class="flex flex-col gap-1">
                <div class="text-sm flex justify-between border-b py-2">
                    <span class="font-bold">
                        Waktu Top Up
                    </span>
                    <span>
                        {{ \Carbon\Carbon::parse($topUp->created_at)->translatedFormat('d F Y H:i') }}
                    </span>
                </div>

                <div class="text-sm flex justify-between border-b py-2">
                    <span class="font-bold">
                        Status Pembayaran
                    </span>
                    <span>
                        {{ ucfirst($topUp->status) }}
                    </span>
                </div>

                <div class="text-sm flex justify-between border-b py-2">
                    <span class="font-bold">
                        Metode Pembayaran
                    </span>
                    <span>
                        {{ strtoupper($topUp->payment_type ?? '-') }}
                    </span>
                </div>
            </div>

            <div class="font-semibold text-lg flex justify-between">
                <h2 class="font-bold text-lg">Nominal Top Up</h2>
                <span class="text-primary">Rp{{ number_format($topUp->amount, 0, ',', '.') }}</span>
            </div>
            {{-- Back Button --}}
            <div class="flex justify-end gap-2">
                <x-buttons.button variant="outline"
                    href="{{ url()->previous() !== url()->current() ? url()->previous() : route('home') }}">
                    {{ url()->previous() !== url()->current() ? 'Kembali' : 'Kembali ke Beranda' }}
                </x-buttons.button>
            </div>
        </div>
    </x-ui.section-container>
</x-layouts.app>