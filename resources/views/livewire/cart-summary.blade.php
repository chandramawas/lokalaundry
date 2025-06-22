<div class="flex flex-col gap-6">
    <div class="flex font-semibold justify-between items-center text-lg">
        <span>
            <span wire:loading.remove>
                Subtotal <span class="font-normal">({{ $totalQuantity }} Barang)</span>
            </span>
            <span wire:loading>
                Subtotal <span class="font-normal">(<i class="fa-solid fa-spinner fa-spin"></i> Barang)</span>
            </span>
        </span>

        <span class="text-primary">
            <span wire:loading.remove>Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
            <span wire:loading><i class="fa-solid fa-spinner fa-spin"></i> Menghitung...</span>
        </span>
    </div>
    <div class="flex gap-2 justify-end">
        <x-buttons.button wire:click="clearCart" variant="outline">
            <span wire:loading.remove wire:target="clearCart">Hapus Semua</span>
            <span wire:loading wire:target="clearCart">
                <i class="fa-solid fa-spinner fa-spin"></i> Menghapus...
            </span>
        </x-buttons.button>
        <x-buttons.button variant="primary">Bayar Sekarang</x-buttons.button>
    </div>
</div>