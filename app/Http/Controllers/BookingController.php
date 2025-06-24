<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Outlet $outlet = null)
    {
        if (!$outlet) {
            return redirect()->route('outlets')->with('message', 'Silakan pilih outlet terlebih dahulu.');
        }

        return view('booking', compact('outlet'));
    }
}
