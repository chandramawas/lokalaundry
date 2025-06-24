<?php

namespace App\Livewire\Booking;

use Livewire\Component;

class MachineGridPicker extends Component
{
    public $selectedSession;

    public $machines = [];
    public $selectedMachines = [];

    public $loadingMachine = null;

    protected $listeners = ['sessionSelected' => 'loadMachines'];

    public function mount($selectedSession = null)
    {
        if ($selectedSession) {
            $this->loadMachines($selectedSession);
        }
    }


    public function loadMachines($session)
    {
        $this->selectedSession = $session;

        // Simulasi Data Mesin
        // TODO: buat databasenya
        $this->machines = [
            ['number' => 'W-01', 'type' => 'w', 'capacity' => 10, 'status' => 'booked'],
            ['number' => 'W-02', 'type' => 'w', 'capacity' => 10, 'status' => 'available'],
            ['number' => 'W-03', 'type' => 'w', 'capacity' => 16, 'status' => 'available'],
            ['number' => 'W-04', 'type' => 'w', 'capacity' => 33, 'status' => 'available'],
            ['number' => 'W-05', 'type' => 'w', 'capacity' => 33, 'status' => 'maintenance'],
            ['number' => 'D-01', 'type' => 'd', 'capacity' => null, 'status' => 'available'],
            ['number' => 'D-02', 'type' => 'd', 'capacity' => null, 'status' => 'available'],
        ];

        $this->selectedMachines = [];
        $this->dispatch('machinesSelected', machines: $this->selectedMachines);
    }

    public function toggleMachine($number)
    {
        $machine = collect($this->machines)->firstWhere('number', $number);

        if (in_array($machine['status'], ['booked', 'maintenance'])) {
            return;
        }

        $key = array_search($number, $this->selectedMachines);

        if ($key !== false) {
            unset($this->selectedMachines[$key]);
        } else {
            $this->selectedMachines[] = $number;
        }

        $this->dispatch('machinesSelected', machines: $this->selectedMachines);
    }

    public function render()
    {
        return view('livewire.booking.machine-grid-picker');
    }
}
