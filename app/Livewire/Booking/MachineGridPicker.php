<?php

namespace App\Livewire\Booking;

use App\Models\Machine;
use Livewire\Component;

class MachineGridPicker extends Component
{
    public $outletId;

    public $selectedSession;

    public $machines = [];
    public $selectedMachines = [];

    protected $listeners = ['sessionSelected' => 'loadMachines'];

    public function mount($outletId, $selectedSession = null)
    {
        $this->outletId = $outletId;

        if ($selectedSession) {
            $this->loadMachines($selectedSession);
        }
    }


    public function loadMachines($session)
    {
        $this->selectedSession = $session;

        $this->machines = Machine::where('outlet_id', $this->outletId)
            ->with('machineType')
            ->where('status', 'available')
            ->get()
            ->map(function ($machine) {
                return [
                    'id' => $machine->id,
                    'number' => $machine->number,
                    'type' => $machine->machineType->type,
                    'capacity' => $machine->machineType->capacity,
                    'price' => $machine->machineType->price,
                    'status' => $machine->status,
                ];
            })->toArray();

        $this->selectedMachines = [];
        $this->dispatch('machinesSelected', machines: $this->selectedMachines);
    }

    public function toggleMachine($number)
    {
        $machine = collect($this->machines)->firstWhere('number', $number);

        if (in_array($machine['status'], ['booked', 'maintenance'])) {
            return;
        }

        $key = array_search($machine['id'], $this->selectedMachines);

        if ($key !== false) {
            unset($this->selectedMachines[$key]);
        } else {
            $this->selectedMachines[] = $machine['id']; // Store the ID instead of number
        }

        $this->dispatch('machinesSelected', machines: $this->selectedMachines);
    }

    public function render()
    {
        return view('livewire.booking.machine-grid-picker');
    }
}
