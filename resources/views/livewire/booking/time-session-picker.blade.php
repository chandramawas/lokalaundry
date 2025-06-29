<div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-2 md:gap-3 text-xs md:text-sm">
    @foreach ($sessions as $session)
        <x-buttons.button wire:click="selectSession('{{ $session['label'] }}')"
            variant="{{ $selectedSession === $session['label'] ? 'primary' : 'outline' }}" class="font-medium"
            :disabled="$session['isDisabled']">
            <span wire:loading.remove wire:target="selectSession('{{ $session['label'] }}')">
                {{ $session['label'] }}
            </span>
            <span wire:loading wire:target="selectSession('{{ $session['label'] }}')">
                <i class="fa-solid fa-spinner fa-spin"></i>
            </span>
        </x-buttons.button>
    @endforeach
</div>