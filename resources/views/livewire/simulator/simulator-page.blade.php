<div class="min-h-screen flex flex-col justify-center items-center bg-gray-100 p-8 gap-6">
    <h1 class="text-2xl font-bold">Simulator</h1>

    <div class="flex gap-4 mb-4">
        <x-buttons.button variant="{{ $mode === 'machine' ? 'primary' : 'outline' }}" wire:click="setMode('machine')">
            <span wire:loading wire:target="setMode('machine')">
                <i class="fa-solid fa-spinner fa-spin"></i>
            </span>
            Simulasi Booking
        </x-buttons.button>
        <x-buttons.button variant="{{ $mode === 'product' ? 'primary' : 'outline' }}" wire:click="setMode('product')">
            <span wire:loading wire:target="setMode('product')">
                <i class="fa-solid fa-spinner fa-spin"></i>
            </span>
            Simulasi Pengambilan Produk
        </x-buttons.button>
    </div>

    <div class="flex flex-col gap-4 bg-white p-6 rounded-xl shadow w-full max-w-lg">
        <div id="reader" width="600px"></div>
        <x-buttons.button variant="primary" onclick="startScanner()">
            Scan QR Code
        </x-buttons.button>
    </div>

    <div class="flex flex-col gap-4 bg-white p-6 rounded-xl shadow w-full max-w-lg">
        <input type="text" wire:model.defer="inputCode" class="input p-2" placeholder="Input" />
        <x-buttons.button variant="outline" wire:click="verifyCode">
            <span wire:loading wire:target="verifyCode">
                <i class="fa-solid fa-spinner fa-spin"></i>
            </span>
            Verifikasi Manual
        </x-buttons.button>

        @if ($message)
            <div class="p-4 rounded bg-gray-50 border text-center">
                <strong>{{ $message }}</strong>
            </div>
        @endif

        {{-- Tampilkan Data Booking --}}
        @if ($booking)
            <div class="text-sm text-gray-600 text-center space-y-2">
                <p>Kode Booking: <strong>{{ $booking->code }}</strong></p>
                <p>Outlet: {{ $booking->outlet->name ?? '-' }}</p>
                <p>Sesi: {{ $booking->session_start }} - {{ $booking->session_end }}</p>

                <div>
                    <p class="font-semibold mb-1">Mesin Aktif:</p>
                    @if ($booking->bookingMachines->count())
                        <ul class="list-disc list-inside">
                            @foreach ($booking->bookingMachines as $machine)
                                <li>{{ $machine->machine->machineType->name }} <span
                                        class="font-bold">{{ $machine->machine->number }}</span></li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500">Tidak ada mesin terdaftar.</p>
                    @endif
                </div>
            </div>
        @endif

        {{-- Tampilkan Data Produk --}}
        @if ($product)
            <div class="text-sm text-gray-600 text-center space-y-2">
                <p>Kode Pengambilan: <strong>{{ $product->code }}</strong></p>
                <p>Total Produk: {{ $product->items->count() }}</p>

                <div>
                    <p class="font-semibold mb-1">Detail Produk:</p>
                    @if ($product->items->count())
                        <ul class="list-disc list-inside">
                            @foreach ($product->items as $item)
                                <li>{{ $item->product->name }} x {{ $item->quantity }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500">Tidak ada produk.</p>
                    @endif
                </div>
            </div>
        @endif
    </div>

    @push('scripts')
        <script>
            let html5QrCode;

            function startScanner() {
                const qrCodeSuccessCallback = (decodedText, decodedResult) => {
                    // Kirim ke Livewire pake event
                    Livewire.dispatch('qr-scanned', { code: decodedText });

                    html5QrCode.stop().then(() => {
                        console.log("Scanner stopped");
                        document.getElementById('reader').innerHTML = "";
                    }).catch(err => console.error('Error stopping scanner:', err));
                };

                const qrCodeErrorCallback = errorMessage => {
                    console.warn(`QR error: ${errorMessage}`);
                };

                html5QrCode = new Html5Qrcode("reader");

                Html5Qrcode.getCameras().then(devices => {
                    if (devices && devices.length) {
                        html5QrCode.start(
                            { facingMode: "environment" },
                            {
                                fps: 10,
                                qrbox: { width: 250, height: 250 }
                            },
                            qrCodeSuccessCallback,
                            qrCodeErrorCallback
                        ).catch(err => console.error('Error starting scanner:', err));
                    }
                }).catch(err => console.error('Error getting cameras:', err));
            }
        </script>

    @endpush

</div>