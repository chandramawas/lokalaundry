<div x-data="{ open: false }" class="border rounded-lg p-4">
    <button type="button" @click="open = !open"
        class="flex justify-between items-center w-full font-semibold text-left">
        <span>
            <i class="fa-solid fa-circle-info mr-1"></i> Ketentuan Pengambilan Produk
        </span>
        <svg :class="{ 'rotate-180': open }" class="h-5 w-5 transform transition-transform duration-300" fill="none"
            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
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