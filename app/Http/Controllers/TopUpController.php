<?php

namespace App\Http\Controllers;

use App\Models\TopUp;
use Illuminate\Http\Request;

class TopUpController extends Controller
{
    public function show($orderId)
    {
        $topUp = TopUp::where('order_id', $orderId)->where('user_id', auth()->id())->firstOrFail();

        return view('wallet.topup-detail', compact('topUp'));
    }
}
