<div class="flex flex-col gap-4">
    {{-- Filter --}}
    <div class="grid grid-cols-2 gap-2 md:gap-4">
        <x-buttons.button variant="{{ $filter === 'scheduled' ? 'primary' : 'outline' }}"
            wire:click="setFilter('scheduled')">
            <span wire:loading wire:target="setFilter('scheduled')">
                <i class="fa-solid fa-spinner fa-spin"></i>
            </span>
            Terjadwal ({{ $scheduledCount }})
        </x-buttons.button>

        <x-buttons.button variant="{{ $filter === 'all' ? 'primary' : 'outline' }}" wire:click="setFilter('all')">
            <span wire:loading wire:target="setFilter('all')">
                <i class="fa-solid fa-spinner fa-spin"></i>
            </span>
            Semua
        </x-buttons.button>
    </div>

    {{-- List Activity --}}
    @forelse ($activities as $activity)
        @if ($activity['type'] === 'booking')
            <x-ui.activity.booking :code="$activity['data']->code" :outlet="$activity['data']->outlet->name"
                :date="\Carbon\Carbon::parse($activity['data']->date)->translatedFormat('l, d F Y')"
                :machines="$activity['data']->bookingMachines->pluck('machine.number')->join(', ')"
                :session="$activity['data']->session_start . ' - ' . $activity['data']->session_end" />
        @elseif ($activity['type'] === 'product')
            <x-ui.activity.product :code="$activity['data']->code" :productsTotal="$activity['data']->items->count()"
                :status="$activity['data']->status" />
        @endif
    @empty
        <p class="text-center text-gray-500 mt-4">Belum ada aktivitas.</p>
    @endforelse
</div>