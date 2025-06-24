<?php

namespace App\Livewire\Booking;

use Carbon\Carbon;
use Livewire\Component;

class DatePicker extends Component
{
    public $dates = [];
    public $selectedDate;

    public function mount()
    {
        $this->generateDates();
        $this->selectedDate = $this->dates[0]; // Default ke hari ini
        $this->dispatch('dateSelected', date: $this->selectedDate);
    }

    public function generateDates()
    {
        $today = Carbon::today();
        for ($i = 0; $i < 7; $i++) {
            $this->dates[] = $today->copy()->addDays($i)->format('Y-m-d');
        }
    }

    public function selectDate($date)
    {
        $this->selectedDate = $date;
        $this->dispatch('dateSelected', date: $this->selectedDate);
    }

    public function render()
    {
        return view('livewire.booking.date-picker');
    }
}
