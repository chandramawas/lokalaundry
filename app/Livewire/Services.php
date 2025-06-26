<?php

namespace App\Livewire;

use App\Models\Outlet;
use Livewire\Component;

class Services extends Component
{
    public $outletCount;
    public $cityCount;

    public function mount()
    {
        $this->outletCount = Outlet::count();
        $this->cityCount = Outlet::distinct('city')->count('city');
    }

    public function render()
    {
        return view('livewire.services');
    }
}
