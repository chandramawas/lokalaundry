<div class="border border-primary px-6 py-4 rounded-lg flex items-center gap-6">
    <div class="flex items-center justify-center size-20 rounded-full border border-primary text-primary">
        <x-icons.shopping-cart class="size-10" />
    </div>

    <div class="flex-1 flex flex-col gap-3">
        <h4 class="text-lg font-bold">
            Produk
            <span class="font-medium">
                ({{ $code }})
            </span>
        </h4>

        <div class="grid grid-cols-2 gap-0.5">
            <p class="font-semibold">Status: <span
                    class="font-normal">{{ $status ? 'Diambil' : 'Belum Diambil' }}</span></p>
            <p class="font-semibold">Jumlah Barang: <span class="font-normal">{{ $productsTotal }} Barang</span></p>
        </div>

        <div class="flex gap-2">
            <x-buttons.button variant="outline" href="{{ route('product.detail', $code) }}">
                <i class="fa-solid fa-circle-info"></i>
                <span class="ml-1">Lihat Detail</span>
            </x-buttons.button>
            <x-buttons.button variant="outline" href="{{ route('download.qr', $code) }}">
                <i class="fa-solid fa-qrcode"></i>
            </x-buttons.button>
        </div>
    </div>
</div>