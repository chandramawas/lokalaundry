<?php

namespace App\Livewire\Booking;

use Carbon\Carbon;
use Livewire\Component;

class BookingSummary extends Component
{
    public $selectedOutlet = 'Outlet Jakarta 1';
    public $selectedAddress = 'Jl. Jakarta';
    public $selectedPhone = '85776074800';

    public $selectedDate;
    public $selectedSession;
    public $selectedMachines = [];

    public $subtotal = 0;

    protected $listeners = [
        'dateSelected' => 'updateDate',
        'sessionSelected' => 'updateSession',
        'machinesSelected' => 'updateMachines',
    ];

    public function mount()
    {
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
        $this->selectedMachines = $machines;
        $this->calculateSubtotal();
    }

    public function calculateSubtotal()
    {
        $total = 0;

        // Simulasi Harga, nanti bisa diambil dari database
        foreach ($this->selectedMachines as $machine) {
            if (str_starts_with($machine, 'W')) {
                $total += 8000;
            } elseif (str_starts_with($machine, 'D')) {
                $total += 20000;
            }
        }

        $this->subtotal = $total;
    }

    public function render()
    {
        return view('livewire.booking.booking-summary');
    }
}
