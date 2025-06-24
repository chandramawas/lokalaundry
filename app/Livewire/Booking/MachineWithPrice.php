<?php

namespace App\Livewire\Booking;

use App\Models\MachineType;
use Livewire\Component;

class MachineWithPrice extends Component
{
    public $outletId;

    public $overlay = true;

    public $prices = [];

    protected $listeners = [
        'sessionSelected' => 'sessionSelected',
        'dateSelected' => 'showOverlay'
    ];

    public function mount($outletId)
    {
        $this->outletId = $outletId;

        $this->loadPrices();
    }

    public function loadPrices()
    {
        $machineTypes = MachineType::whereHas('machines', function ($query) {
            $query->where('outlet_id', $this->outletId);
        })->get();

        // Simpan ke variabel prices
        $this->prices = $machineTypes->map(function ($type) {
            return [
                'title' => $type->name,
                'price' => $type->price,
                'width' => $this->getWidth($type->capacity),
            ];
        });
    }

    public function getWidth($capacity)
    {
        return match (true) {
            $capacity === null => 'w-full',
            $capacity <= 10 => 'w-1/3',
            $capacity <= 16 => 'w-2/3',
            default => 'w-full',
        };
    }

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
