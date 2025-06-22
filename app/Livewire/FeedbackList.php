<?php

namespace App\Livewire;

use App\Models\Feedback;
use Livewire\Component;

class FeedbackList extends Component
{
    protected $listeners = [
        'feedback-submitted' => '$refresh',
    ];

    public function render()
    {
        $feedbacks = Feedback::with('user')->latest()->take(20)->get();
        return view('livewire.feedback-list', compact('feedbacks'));
    }
}
