<?php

namespace App\Livewire;

use App\Models\Outlet;
use Livewire\Component;

class OutletList extends Component
{
    public string $selectedCity = 'Jakarta';
    public array $cities = [];

    public function mount(): void
    {
        // Ambil semua kota unik dari database
        $this->cities = Outlet::select('city')->distinct()->pluck('city')->toArray();

        // Set default city ke pertama jika datanya ada
        if (!in_array($this->selectedCity, $this->cities) && !empty($this->cities)) {
            $this->selectedCity = $this->cities[0];
        }
    }

    public function selectCity(string $city): void
    {
        $this->selectedCity = $city;
    }

    public function render()
    {
        $outlets = Outlet::where('city', $this->selectedCity)->get();

        return view('livewire.outlet-list', compact('outlets'));
    }
}
