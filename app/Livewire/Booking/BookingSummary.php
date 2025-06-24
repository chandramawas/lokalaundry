<?php

namespace App\Livewire\Booking;

use App\Models\Machine;
use App\Models\Outlet;
use Carbon\Carbon;
use Livewire\Component;

class BookingSummary extends Component
{
    public $outletId;
    public $outlet;

    public $selectedDate;
    public $selectedSession;
    public $selectedMachines = [];

    public $subtotal = 0;

    protected $listeners = [
        'dateSelected' => 'updateDate',
        'sessionSelected' => 'updateSession',
        'machinesSelected' => 'updateMachines',
    ];

    public function mount($outletId)
    {
        $this->outlet = Outlet::findOrFail($outletId);
        $this->updateDate($this->selectedDate);
    }

    public function updateDate($date)
    {
        $this->selectedDate = Carbon::parse($date)->translatedFormat('l, d F Y');
    }

    public function updateSession($session)
    {
        $this->selectedSession = $session;
    }

    public function updateMachines($machines)
    {
        $this->selectedMachines = Machine::with('machineType')->whereIn('id', $machines)->get();
        $this->calculateSubtotal();
    }

    public function calculateSubtotal()
    {
        $total = 0;

        foreach ($this->selectedMachines as $machine) {
            $total += $machine->machineType->price;
        }

        $this->subtotal = $total;
    }

    public function render()
    {
        return view('livewire.booking.booking-summary');
    }
}
