<?php

namespace App\Livewire\Booking;

use App\Models\Outlet;
use Carbon\Carbon;
use Livewire\Component;

class TimeSessionPicker extends Component
{
    public $outletId;
    public $sessionDuration;
    public $sessionGap;

    public $selectedDate;
    public $sessions = [];
    public $selectedSession;

    protected $listeners = ['dateSelected' => 'updateSessions'];

    public function mount($outletId)
    {
        if (!$this->selectedDate) {
            $this->selectedDate = now()->toDateString();
        }

        $this->outletId = $outletId;
        $outlet = Outlet::findOrFail($outletId);
        $this->sessionDuration = $outlet->session_duration;
        $this->sessionGap = $outlet->session_gap;

        $this->updateSessions($this->selectedDate);
    }

    public function updateSessions($date)
    {
        $this->selectedDate = $date;

        $now = now();
        $selectedDateObj = Carbon::parse($date);

        $this->sessions = [];

        $startTime = Carbon::parse($date . ' 00:00:00');
        $endOfDay = Carbon::parse($date . ' 23:59:59'); // Batas hari itu

        $sessionDuration = $this->sessionDuration;
        $sessionGap = $this->sessionGap;

        while ($startTime->lessThanOrEqualTo($endOfDay)) {
            $endTime = $startTime->copy()->addMinutes($sessionDuration);

            // Kalau endTime udah lewat batas hari, stop
            if ($endTime->greaterThan($endOfDay)) {
                break;
            }

            // Cek apakah sesi sudah lewat
            $isDisabled = false;
            if ($selectedDateObj->isToday() && $endTime->lessThan($now)) {
                $isDisabled = true;
            }

            $this->sessions[] = [
                'label' => $startTime->format('H:i') . ' - ' . $endTime->format('H:i'),
                'start' => $startTime->format('H:i'),
                'end' => $endTime->format('H:i'),
                'isDisabled' => $isDisabled,
            ];

            $startTime = $endTime->copy()->addMinutes($sessionGap);
        }

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