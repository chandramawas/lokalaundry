<?php

namespace App\Livewire\Wallet;

use Livewire\Component;

class WalletActionButtons extends Component
{
    public $activeSection;

    public function selectSection($section)
    {
        $this->activeSection = $section;
        $this->dispatch('changeWalletSection', section: $section);
    }

    public function render()
    {
        return view('livewire.wallet.wallet-action-buttons');
    }
}
