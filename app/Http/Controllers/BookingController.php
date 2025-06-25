<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Outlet;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

    public function downloadQr($bookingCode)
    {
        $result = Builder::create()
            ->writer(new PngWriter())
            ->data($bookingCode)
            ->size(300)
            ->margin(10)
            ->build();

        return response($result->getString())
            ->header('Content-Type', 'image/png')
            ->header('Content-Disposition', 'attachment; filename="qr-' . $bookingCode . '.png"');
    }
}
