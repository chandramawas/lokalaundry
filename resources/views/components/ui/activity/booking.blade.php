<div class="border border-primary px-6 py-4 rounded-lg flex items-center gap-6">
    <div class="flex items-center justify-center size-20 rounded-full border border-primary text-primary">
        <x-icons.washing-machine class="size-10" />
    </div>

    <div class="flex-1 flex flex-col gap-3">
        <h4 class="text-lg font-bold">
            Booking
            <span class="font-medium">
                ({{ $code }})
            </span>
        </h4>

        <div class="grid grid-cols-2 gap-0.5">
            <p class="font-semibold">Outlet: <span class="font-normal">{{ $outlet }}</span></p>
            <p class="font-semibold">Nomor Mesin: <span class="font-normal">{{ $machines }}</span></p>
            <p class="font-semibold">Tanggal: <span class="font-normal">{{ $date }}</span></p>
            <p class="font-semibold">Sesi: <span class="font-normal">{{ $session }}</span></p>
        </div>

        <div class="flex gap-2">
            <x-buttons.button variant="outline" href="{{ route('booking.detail', $code) }}">
                <i class="fa-solid fa-circle-info"></i>
                <span class="ml-1">Lihat Detail</span>
            </x-buttons.button>
            <x-buttons.button variant="outline" href="{{ route('download.qr', $code) }}">
                <i class="fa-solid fa-qrcode"></i>
            </x-buttons.button>
        </div>
    </div>
</div>