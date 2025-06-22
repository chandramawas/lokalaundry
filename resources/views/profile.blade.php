<x-layouts.app title="Profile">
    <br>
    <x-ui.section-container id="profile" title="Profil">
        <div class="grid grid-cols-2 gap-4">
            {{-- Profile Informations --}}
            <div class="p-6 border border-primary rounded-xl size-full">
                <livewire:profile-information />
            </div>

            {{-- Profile Settings --}}
            <div class="p-6 border border-primary rounded-xl size-full">
                <livewire:profile-settings />
            </div>
        </div>
    </x-ui.section-container>
</x-layouts.app>