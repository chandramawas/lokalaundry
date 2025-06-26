<?php

namespace App\Livewire;

use App\Models\Booking;
use App\Models\ProductTransaction;
use Carbon\Carbon;
use Livewire\Component;

class ActivityHistory extends Component
{
    public $filter = 'scheduled';
    public $scheduledCount = 0;

    public function setFilter($filter)
    {
        $this->filter = $filter;
    }

    public function getActivitiesProperty()
    {
        $userId = auth()->id();
        $now = Carbon::now();

        // Semua booking
        $allBookings = Booking::with('outlet', 'bookingMachines.machine')
            ->where('user_id', $userId)
            ->get()
            ->map(function ($booking) {
                return [
                    'type' => 'booking',
                    'created_at' => $booking->created_at,
                    'data' => $booking
                ];
            });

        // Semua produk
        $allProducts = ProductTransaction::with('items')
            ->where('user_id', $userId)
            ->get()
            ->map(function ($product) {
                return [
                    'type' => 'product',
                    'created_at' => $product->created_at,
                    'data' => $product
                ];
            });

        // Hitung scheduled
        $scheduledBookings = $allBookings->filter(function ($activity) use ($now) {
            $booking = $activity['data'];
            return Carbon::parse($booking->date . ' ' . $booking->session_end) >= $now;
        });

        $scheduledProducts = $allProducts->filter(function ($activity) {
            $product = $activity['data'];
            return $product->status === 0;
        });

        // Simpan total scheduled
        $this->scheduledCount = $scheduledBookings->count() + $scheduledProducts->count();

        // Return sesuai filter
        if ($this->filter === 'scheduled') {
            return $scheduledBookings->merge($scheduledProducts)->sortByDesc('created_at')->values();
        } else {
            return $allBookings->merge($allProducts)->sortByDesc('created_at')->values();
        }
    }

    public function render()
    {
        return view('livewire.activity-history', [
            'activities' => $this->activities
        ]);
    }
}
