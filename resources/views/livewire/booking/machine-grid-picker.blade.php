<div class="flex flex-col gap-4">
    @if ($selectedSession)
        {{-- Mesin Cuci --}}
        @if ($machines)
            <div class="flex flex-col gap-2">
                <h3 class="font-bold text-xl">Mesin Cuci</h3>
                <div class="grid grid-cols-5 gap-2">
                    @foreach ($machines as $machine)
                        @if ($machine['type'] === 'w')
                            <x-ui.machine-ui number="{{ $machine['number'] }}"
                                status="{{ in_array($machine['id'], $this->selectedMachines) ? 'selected' : $machine['status'] }}"
                                type="w" capacity="{{ $machine['capacity'] }}" wire:click="toggleMachine('{{ $machine['number'] }}')" />
                        @endif
                    @endforeach
                </div>
            </div>

            {{-- Mesin Pengering --}}
            <div class="flex flex-col gap-2">
                <h3 class="font-bold text-xl">Pengering</h3>
                <div class="grid grid-cols-5 gap-2">
                    @foreach ($machines as $machine)
                        @if ($machine['type'] === 'd')
                            <x-ui.machine-ui number="{{ $machine['number'] }}"
                                status="{{ in_array($machine['id'], $this->selectedMachines) ? 'selected' : $machine['status'] }}"
                                type="d" wire:click="toggleMachine('{{ $machine['number'] }}')" />
                        @endif
                    @endforeach
                </div>
            </div>
        @else
            <span class="italic text-sm text-on-surface-variant">Belum ada mesin tersedia di outlet ini.</span>
        @endif
    @endif
</div>