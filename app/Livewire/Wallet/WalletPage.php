<?php

namespace App\Livewire\Wallet;

use App\Models\Wallet;
use Livewire\Component;

class WalletPage extends Component
{
    public $activeSection = 'history'; // default ke riwayat
    public $balance;

    protected $listeners = [
        'changeWalletSection' => 'setActiveSection'
    ];

    public function mount()
    {
        $this->updateBalance();
    }

    public function updateBalance()
    {
        $wallet = Wallet::where('user_id', auth()->id())->first();

        $this->balance = $wallet->balance;
    }

    public function setActiveSection($section)
    {
        $this->activeSection = $section;
    }

    public function render()
    {
        return view('livewire.wallet.wallet-page');
    }
}
