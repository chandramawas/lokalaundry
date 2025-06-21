<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::with('user')
            ->latest()
            ->take(20)
            ->get();

        return view('home', compact('feedbacks'));
    }
}
