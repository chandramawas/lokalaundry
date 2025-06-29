<div class="relative flex flex-col gap-6 w-full">
    {{-- Product List --}}
    <div class="flex flex-col gap-3 max-h-52 overflow-y-auto pr-1">
        @forelse ($items as $item)
            <div class="flex justify-between items-center border-b pb-2">
                <div class="flex flex-col">
                    <span class="font-medium">{{ $item->product->name }}</span>
                    <span class="text-sm text-on-surface-variant">
                        {{ $item->quantity }} x Rp{{ number_format($item->product->price, 0, ',', '.') }}
                    </span>
                </div>
                <div class="text-sm font-semibold text-primary">
                    Rp{{ number_format($item->quantity * $item->product->price, 0, ',', '.') }}
                </div>
            </div>
        @empty
            <div class="text-sm text-on-surface-variant">Keranjang masih kosong.</div>
        @endforelse
    </div>

    {{-- Subtotal --}}
    <div class="flex font-semibold justify-between items-center text-lg">
        <span>
            Subtotal <span class="font-normal">({{ $totalQuantity }} Barang)</span>
        </span>
        <span class="text-primary">
            Rp{{ number_format($subtotal, 0, ',', '.') }}
        </span>
    </div>

    {{-- Buttons --}}
    @if ($totalQuantity > 0)
        <div class="flex gap-2 justify-center md:justify-end">
            <x-buttons.button wire:click="clearCart" variant="outline">
                <span wire:loading.remove wire:target="clearCart">Hapus Semua</span>
                <span wire:loading wire:target="clearCart">
                    <i class="fa-solid fa-spinner fa-spin"></i> Menghapus...
                </span>
            </x-buttons.button>
            <x-buttons.button variant="primary" wire:click="confirmPayment" wire:loading.attr="disabled">
                <span wire:loading wire:target="confirmPayment">
                    <i class="fa-solid fa-spinner fa-spin"></i> Memproses...
                </span>
                <span wire:loading.remove wire:target="confirmPayment">Bayar Sekarang</span>
            </x-buttons.button>
        </div>
    @endif

    {{-- Overlay for Guest --}}
    @guest
        <div
            class="absolute inset-0 bg-white/80 backdrop-blur-xs flex flex-col items-center justify-center z-20 rounded-xl text-center p-4">
            <p class="text-on-surface-variant text-sm">
                Kamu perlu
                <x-buttons.text-button href="{{ route('login') }}?r={{ url()->current() }}" class="text-primary font-bold">
                    Masuk
                </x-buttons.text-button>
                untuk membeli produk!
            </p>
        </div>
    @endguest
</div>