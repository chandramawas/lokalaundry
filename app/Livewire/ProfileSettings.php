<?php

namespace App\Livewire;

use Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileSettings extends Component
{
    use WithFileUploads;

    public string $name;
    public string $phone;
    public $avatar;

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->phone = auth()->user()->phone;
    }

    public function updateProfile()
    {
        $user = auth()->user();

        $updated = false;

        if ($user->name !== $this->name) {
            $user->name = $this->name;
            $updated = true;
        }

        if ($user->phone !== $this->phone) {
            $user->phone = $this->phone;
            $updated = true;
        }

        if ($this->avatar) {
            $filename = now()->format('Y-m-d_H-i-s') . '_' . $user->id . '.' . $this->avatar->getClientOriginalExtension();
            $path = $this->avatar->storeAs('user_avatar', $filename, 'public');
            $user->avatar = $path;
            $updated = true;
        }

        if ($updated) {
            $user->save();
            session()->flash('success', 'Profile updated successfully.');
            $this->dispatch('profileUpdated');
        } else {
            session()->flash('info', 'No changes were made.');
        }
    }

    public function render()
    {
        return view('livewire.profile-settings');
    }
}
