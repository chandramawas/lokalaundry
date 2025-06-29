<div class="grid grid-cols-3 sm:grid-cols-5 md:grid-cols-7 gap-2 text-xs md:text-sm lg:text-base">
    @foreach ($dates as $date)
        @php
            $isSelected = $selectedDate === $date
        @endphp

        <x-buttons.button wire:click="selectDate('{{ $date }}')" variant="{{ $isSelected ? 'primary' : 'outline' }}">
            <div class="flex flex-col gap-1">
                <span wire:loading.remove wire:target="selectDate('{{ $date }}')">
                    <div class="font-normal">
                        {{ \Carbon\Carbon::parse($date)->translatedFormat('l') }}
                    </div>
                    <div>
                        {{ \Carbon\Carbon::parse($date)->format('d/m') }}
                    </div>
                </span>
                <span wire:loading wire:target="selectDate('{{ $date }}')">
                    <i class="fa-solid fa-spinner fa-spin"></i>
                </span>
            </div>
        </x-buttons.button>
    @endforeach
</div>