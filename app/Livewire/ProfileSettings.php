<?php

namespace App\Livewire;

use Auth;
use Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileSettings extends Component
{
    use WithFileUploads;

    public string $name;
    public string $phone;
    public $avatar;

    public string $currentPassword = '';
    public string $newPassword = '';
    public string $confirmPassword = '';

    public string $formMode = 'profile';

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->phone = auth()->user()->phone;
    }

    public function toggleForm(string $mode)
    {
        $this->formMode = $mode;
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
            session()->flash('success', 'Profil berhasil diperbarui.');
            $this->dispatch('profileUpdated');
        } else {
            session()->flash('info', 'Tidak ada perubahan.');
        }
    }

    public function changePassword()
    {
        $this->validate([
            'currentPassword' => 'required|string',
            'newPassword' => 'required|string|min:8',
            'confirmPassword' => 'required|string|same:newPassword',
        ]);

        $user = auth()->user();

        if (!Hash::check($this->currentPassword, $user->password)) {
            $this->addError('currentPassword', 'Kata Sandi salah..');
            return;
        }

        $user->password = Hash::make($this->newPassword);
        $user->save();

        $this->reset(['currentPassword', 'newPassword', 'confirmPassword']);

        session()->flash('success', 'Kata Sandi berhasil diperbarui.');
    }

    public function render()
    {
        return view('livewire.profile-settings');
    }
}
