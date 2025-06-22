<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ProfileInformation extends Component
{
    public $user;

    protected $listeners = ['profileUpdated' => 'refreshUser'];

    public function mount()
    {
        $this->refreshUser();
    }

    public function refreshUser()
    {
        $this->user = Auth::user()->fresh(); // ambil data terbaru dari DB
    }

    public function render()
    {
        return view('livewire.profile-information');
    }
}