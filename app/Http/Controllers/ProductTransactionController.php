<?php

namespace App\Http\Controllers;

use App\Models\ProductTransaction;
use Illuminate\Http\Request;

class ProductTransactionController extends Controller
{
    public function show($code)
    {
        $transaction = ProductTransaction::where('code', $code)->with('items.product')->firstOrFail();

        return view('product-transaction.detail', compact('transaction'));
    }
}
