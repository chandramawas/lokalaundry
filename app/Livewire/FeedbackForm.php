<?php

namespace App\Livewire;

use App\Models\Feedback;
use Auth;
use Livewire\Component;

class FeedbackForm extends Component
{
    public string $message;
    public string $name;

    public function mount()
    {
        $this->name = auth()->user()->name ?? 'Tamu';
        $this->phone = auth()->user()->phone ?? '';
    }

    public function submit()
    {
        $this->validate([
            'message' => 'required|string|min:5|max:500',
        ]);

        Feedback::create([
            'user_id' => Auth::id(),
            'message' => $this->message,
        ]);

        $this->reset('message');
        session()->flash('success', 'Umpan Balik berhasil dikirim!');
        $this->dispatch('feedback-submitted');
    }

    public function render()
    {
        return view('livewire.feedback-form');
    }
}
