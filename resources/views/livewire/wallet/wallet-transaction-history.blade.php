<x-ui.section-container id="transaction-history">
    <div class="flex flex-col gap-4">
        {{-- Month Filter (Last 3 Month) --}}
        <div class="grid grid-cols-3 gap-2 md:gap-4">
            @foreach ($this->months as $month)
                <x-buttons.button variant="{{ $selectedMonth == $month['month'] ? 'primary' : 'outline' }}"
                    wire:click="selectMonth('{{ $month['month'] }}')">
                    <span wire:loading wire:target="selectMonth('{{ $month['month'] }}')">
                        <i class="fa-solid fa-spinner fa-spin"></i>
                    </span>
                    {{ $month['label'] }}
                </x-buttons.button>
            @endforeach
        </div>

        {{-- Transaction List --}}
        <div class="flex flex-col gap-2">
            @forelse ($transactions as $transaction)
                <x-ui.transaction-ui :variant="$transaction['type']" :title="$transaction['title']"
                    :subtitle="$transaction['subtitle']" :date="$transaction['date']" :amount="$transaction['amount']"
                    :href="$transaction['href']" />
            @empty
                <div class="text-center text-gray-500">Belum ada transaksi di bulan ini.</div>
            @endforelse
        </div>
    </div>
</x-ui.section-container>