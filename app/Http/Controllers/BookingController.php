<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Outlet;

class BookingController extends Controller
{
    public function index(Outlet $outlet = null)
    {
        if (!$outlet) {
            return redirect()->route('outlets')->with('message', 'Silakan pilih outlet terlebih dahulu.');
        }

        return view('booking.booking', compact('outlet'));
    }

    public function show($bookingCode)
    {
        $booking = Booking::where('code', $bookingCode)
            ->with('bookingMachines.machine')
            ->with('bookingMachines.machine.machineType')
            ->firstOrFail();

        return view('booking.detail', compact('booking'));
    }
}
