<div class="flex flex-col flex-1 gap-2 justify-between">
    @if (session('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show" x-transition
            class="p-2 bg-green-100 text-green-800 rounded-md text-sm">
            <i class="fa-solid fa-circle-check"></i> <span class="ml-1">{{ session('success') }}</span>
        </div>
    @endif

    <div class="flex flex-col gap-2">
        <x-forms.input name="name" type="text" label="Name*" wire:model.defer="name" readonly />
        <x-forms.input name="message" type="textarea" label="Message*" rows="5" wire:model.defer="message" />
    </div>

    <div class="flex justify-end">
        <x-buttons.button wire:click="submit" type="button" wire:loading.attr="disabled">
            <span wire:loading.remove wire:target="submit">Submit</span>
            <span wire:loading wire:target="submit">
                <i class="fa-solid fa-spinner fa-spin"></i> Submitting...
            </span>
        </x-buttons.button>
    </div>
</div>