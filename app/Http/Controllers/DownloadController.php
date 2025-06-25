<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;

class DownloadController extends Controller
{
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
            ->header('Content-Disposition', 'attachment; filename="QR-' . $bookingCode . '.png"');
    }
}
