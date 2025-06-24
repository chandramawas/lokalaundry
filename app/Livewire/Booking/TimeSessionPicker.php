<?php

namespace App\Livewire\Booking;

use Livewire\Component;

class TimeSessionPicker extends Component
{
    public $selectedDate;
    public $sessions = [];
    public $selectedSession;

    protected $listeners = ['dateSelected' => 'updateSessions'];

    public function mount()
    {
        if (!$this->selectedDate) {
            $this->selectedDate = now()->toDateString();
        }

        $this->updateSessions($this->selectedDate);
    }

    public function updateSessions($date)
    {
        $this->selectedDate = $date;

        $now = now();
        $selectedDateObj = \Carbon\Carbon::parse($date);

        $this->sessions = [];
        for ($i = 0; $i <= 23; $i++) {
            $start = str_pad($i, 2, '0', STR_PAD_LEFT) . ':00';
            $end = str_pad($i, 2, '0', STR_PAD_LEFT) . ':55';

            $isDisabled = false;
            if ($selectedDateObj->isToday()) {
                if ($i <= $now->hour) {
                    $isDisabled = true;
                }
            }

            $this->sessions[] = [
                'label' => "$start - $end",
                'start' => $start,
                'end' => $end,
                'isDisabled' => $isDisabled,
            ];
        }

        // Default pilih jam pertama yang belum disable
        $this->selectedSession = null;
        $this->dispatch('sessionSelected', session: $this->selectedSession);
    }


    public function selectSession($session)
    {
        $this->selectedSession = $session;
        $this->dispatch('sessionSelected', session: $session);
    }

    public function render()
    {
        return view('livewire.booking.time-session-picker');
    }
}