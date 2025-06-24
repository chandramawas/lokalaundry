<div class="grid grid-cols-7 gap-2">
    @foreach ($dates as $date)
        @php
            $isSelected = $selectedDate === $date
        @endphp

        <x-buttons.button wire:click="selectDate('{{ $date }}')" variant="{{ $isSelected ? 'primary' : 'outline' }}">
            <div class="flex flex-col gap-1">
                <span wire:loading.remove wire:target="selectDate('{{ $date }}')">
                    <span class="font-normal">
                        {{ \Carbon\Carbon::parse($date)->isToday() ? 'Hari Ini' : \Carbon\Carbon::parse($date)->translatedFormat('l') }}
                    </span>
                    <span>
                        {{ \Carbon\Carbon::parse($date)->format('d/m') }}
                    </span>
                </span>
                <span wire:loading wire:target="selectDate('{{ $date }}')">
                    <i class="fa-solid fa-spinner fa-spin"></i>
                </span>
            </div>
        </x-buttons.button>
    @endforeach
</div>