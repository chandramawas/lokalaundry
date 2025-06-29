<div x-data="{ open: false }" class="border rounded-lg p-4">
    <button type="button" @click="open = !open"
        class="flex justify-between items-center w-full font-semibold text-left">
        <span>
            <i class="fa-solid fa-circle-info mr-1"></i> Ketentuan Booking
        </span>
        <svg :class="{ 'rotate-180': open }" class="h-5 w-5 transform transition-transform duration-300" fill="none"
            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
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