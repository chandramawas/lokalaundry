<?php

namespace App\Livewire\Booking;

use App\Models\Booking;
use App\Models\Machine;
use Livewire\Component;

class MachineGridPicker extends Component
{
    public $outletId;

    public $selectedDate;
    public $selectedSession;

    public $machines = [];
    public $selectedMachines = [];

    protected $listeners = [
        'dateSelected' => 'updateDate',
        'sessionSelected' => 'loadMachines'
    ];

    public function mount($outletId, $selectedSession = null, $selectedDate = null)
    {
        $this->outletId = $outletId;
        $this->selectedDate;

        if ($selectedSession && $selectedDate) {
            $this->loadMachines($selectedSession);
        }
    }

    public function updateDate($date)
    {
        $this->selectedDate = $date;
    }

    public function loadMachines($session)
    {
        $this->selectedSession = $session;

        if (!$this->selectedDate) {
            $this->selectedDate = now()->toDateString();
        }

        // Ambil sesi start yang dipilih
        $selectedSessionStart = explode(' - ', $session)[0];

        // Ambil semua booking di outlet dan sesi yang sama
        $bookedMachineIds = Booking::where('outlet_id', $this->outletId)
            ->where('date', $this->selectedDate)
            ->where('session_start', $selectedSessionStart)
            ->with('bookingMachines')
            ->get()
            ->pluck('bookingMachines')
            ->flatten()
            ->pluck('machine_id')
            ->toArray();


        $this->machines = Machine::where('outlet_id', $this->outletId)
            ->with('machineType')
            ->get()
            ->map(function ($machine) use ($bookedMachineIds) {
                $status = $machine->status;

                if (in_array($machine->id, $bookedMachineIds)) {
                    $status = 'booked';
                }

                return [
                    'id' => $machine->id,
                    'number' => $machine->number,
                    'type' => $machine->machineType->type,
                    'capacity' => $machine->machineType->capacity,
                    'price' => $machine->machineType->price,
                    'status' => $status,
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
