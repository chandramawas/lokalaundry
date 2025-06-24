<x-layouts.app title="Outlet">
    <br>

    <x-ui.section-container id="outlets">
        <div class="flex flex-col gap-4">
            @if (session('message'))
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show" x-transition
                    class="p-2 bg-red-100 text-red-800 rounded-md text-sm">
                    <i class="fa-solid fa-circle-info"></i> <span class="ml-1">{{ session('message') }}</span>
                </div>
            @endif

            <livewire:outlet-list />
        </div>
    </x-ui.section-container>
</x-layouts.app>