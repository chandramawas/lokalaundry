<?php

namespace App\Livewire\Booking;

use Livewire\Component;

class MachineWithPrice extends Component
{
    public $overlay = true;

    protected $listeners = [
        'sessionSelected' => 'sessionSelected',
        'dateSelected' => 'showOverlay'
    ];

    public function sessionSelected($session = null)
    {
        if ($session) {
            $this->overlay = false;
        }
    }

    public function showOverlay()
    {
        $this->overlay = true;
    }

    public function render()
    {
        return view('livewire.booking.machine-with-price');
    }
}
