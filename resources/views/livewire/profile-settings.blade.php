<div class="flex flex-col gap-6">
    @if (session('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show" x-transition
            class="p-2 bg-green-100 text-green-800 rounded-md text-sm">
            <i class="fa-solid fa-circle-check"></i> <span class="ml-1">{{ session('success') }}</span>
        </div>
    @endif

    @if (session('info'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show" x-transition
            class="p-2 bg-yellow-100 text-yellow-800 rounded-md text-sm">
            {{ session('info') }}
        </div>
    @endif

    <div class="flex flex-col gap-4">
        <x-forms.input name="name" type="text" label="Name*" wire:model.defer="name" />
        <x-forms.input name="phone" type="number" label="Phone Number*" prefix="+62" wire:model.defer="phone" />
        <x-forms.input-file name="avatar" label="Avatar" wire:model="avatar" />
    </div>

    <x-buttons.button wire:click="updateProfile" type="button" wire:loading.attr="disabled">
        <span wire:loading.remove wire:target="updateProfile">Update</span>
        <span wire:loading wire:target="updateProfile">
            <i class="fa-solid fa-spinner fa-spin"></i> Updating...
        </span>
    </x-buttons.button>
</div>