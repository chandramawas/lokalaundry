<div class="flex gap-2">
    <x-buttons.button variant="{{ $activeSection === 'history' ? 'primary' : 'outline' }}" wire:click="selectSection('history')">
        <span wire:loading.remove wire:target="selectSection('history')">
                    <i class="fa-solid fa-clock-rotate-left"></i>
        </span>
            <span wire:loading wire:target="selectSection('history')">
                <i class="fa-solid fa-spinner fa-spin"></i>
            </span>
        <span class="ml-1">Riwayat</span>
    </x-buttons.button>

    <x-buttons.button variant="{{ $activeSection === 'topup' ? 'primary' : 'outline' }}" wire:click="selectSection('topup')">
        <span wire:loading.remove wire:target="selectSection('topup')">
        <i class="fa-solid fa-plus"></i>
        </span>
            <span wire:loading wire:target="selectSection('topup')">
                <i class="fa-solid fa-spinner fa-spin"></i>
            </span>
        <span class="ml-1">Isi Saldo</span>
    </x-buttons.button>
</div>