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

    {{-- Profile Form --}}
    @if ($formMode === 'profile')
        <div class="flex flex-col gap-4">
            <x-forms.input name="name" type="text" label="Name*" wire:model.defer="name" />
            <x-forms.input name="phone" type="number" label="Phone Number*" prefix="+62" wire:model.defer="phone" />
            <x-forms.input-file name="avatar" label="Avatar" wire:model="avatar" />
        </div>

        <div class="flex gap-2 justify-end">
            <x-buttons.button variant="outline" wire:click="toggleForm('password')">
                <span wire:loading wire:target="toggleForm('password')" class="mr-1">
                    <i class="fa-solid fa-spinner fa-spin"></i>
                </span>
                Change Password
            </x-buttons.button>

            <x-buttons.button wire:click="updateProfile" type="button" wire:loading.attr="disabled">
                <span wire:loading.remove wire:target="updateProfile">Update</span>
                <span wire:loading wire:target="updateProfile">
                    <i class="fa-solid fa-spinner fa-spin"></i> Updating...
                </span>
            </x-buttons.button>
        </div>
    @endif

    {{-- Password Form --}}
    @if ($formMode === 'password')
        <div class="flex flex-col gap-4">
            <x-forms.input name="currentPassword" type="password" label="Current Password*" wire:model="currentPassword" />
            <x-forms.input name="newPassword" type="password" label="New Password*" wire:model="newPassword" />
            <x-forms.input name="confirmPassword" type="password" label="Confirm Password*" wire:model="confirmPassword" />
        </div>

        <div class="flex gap-2 justify-end">
            <x-buttons.button variant="outline" wire:click="toggleForm('profile')">
                <span wire:loading wire:target="toggleForm('profile')" class="mr-1">
                    <i class="fa-solid fa-spinner fa-spin"></i>
                </span>
                Edit Profile
            </x-buttons.button>
            <x-buttons.button wire:click="changePassword" type="button" wire:loading.attr="disabled">
                <span wire:loading.remove wire:target="changePassword">Update</span>
                <span wire:loading wire:target="changePassword">
                    <i class="fa-solid fa-spinner fa-spin"></i> Updating...
                </span>
            </x-buttons.button>
        </div>
    @endif
</div>