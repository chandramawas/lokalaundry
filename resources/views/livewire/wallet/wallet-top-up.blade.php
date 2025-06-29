<div x-data="{ componentId: @js($this->getId()) }" @midtrans-payment.window="window.snap.pay($event.detail.snapToken, {
        onSuccess: result => Livewire.find(componentId).call('handleSuccess', result),
        onPending: result => Livewire.find(componentId).call('handleError', result),
        onError: result => Livewire.find(componentId).call('handleError', result),
        onClose: () => Livewire.find(componentId).call('handleClosed')
    })" class="space-y-6">

    <x-ui.section-container id="topup" title="Pilih Nominal Saldo">
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
            @foreach([10000, 20000, 25000, 50000, 75000, 100000] as $amount)
                <x-buttons.button variant="{{ $selectedAmount === $amount ? 'primary' : 'outline' }}"
                    wire:click="selectAmount({{ $amount }})">
                    <span wire:loading.remove wire:target="selectAmount({{ $amount }})">
                        Rp{{ number_format($amount, 0, ',', '.') }}
                    </span>
                    <span wire:loading wire:target="selectAmount({{ $amount }})">
                        <i class="fa-solid fa-spinner fa-spin"></i>
                    </span>
                </x-buttons.button>
            @endforeach
        </div>
    </x-ui.section-container>

    @if ($selectedAmount)
        <x-ui.section-container id="topup-summary">
            <div class="flex flex-col gap-6">
                <div class="flex flex-col gap-3">
                    <div class="flex justify-between items-center border-b pb-2">
                        <span class="font-medium">Nominal Saldo</span>
                        <span
                            class="text-sm font-semibold text-primary">Rp{{ number_format($selectedAmount, 0, ',', '.') }}</span>
                    </div>

                    <div class="flex font-semibold justify-between items-center text-lg">
                        <span>Total Bayar</span>
                        <span class="text-primary">Rp{{ number_format($selectedAmount, 0, ',', '.') }}</span>
                    </div>
                </div>

                <div class="flex gap-2 justify-center md:justify-end">
                    <x-buttons.button variant="primary" wire:click="initiatePayment">
                        <span wire:loading.remove wire:target="initiatePayment">Bayar Sekarang</span>
                        <span wire:loading wire:target="initiatePayment">
                            <i class="fa-solid fa-spinner fa-spin"></i>
                            Loading...
                        </span>
                    </x-buttons.button>
                </div>
            </div>
        </x-ui.section-container>
    @endif
</div>