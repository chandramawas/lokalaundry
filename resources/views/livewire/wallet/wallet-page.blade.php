<div class="space-y-6">
    {{-- Informasi Saldo --}}
    <x-ui.section-container id="wallet">
        <div
            class="border border-primary px-6 py-4 rounded-lg flex flex-col md:flex-row items-center gap-4 md:gap-6 text-center md:text-left">
            <i class="fa-solid fa-wallet text-3xl"></i>

            <div class="flex-1 flex flex-col gap-1">
                <h3 class="text-lg font-medium">Saldo Anda</h3>
                <p class="text-xl font-bold">Rp{{ number_format($balance, 0, ',', '.') }}</p>
            </div>

            <livewire:wallet.wallet-action-buttons :activeSection="$activeSection" />
        </div>
    </x-ui.section-container>

    {{-- Section --}}
    @if ($activeSection === 'topup')
        <livewire:wallet.wallet-top-up />
    @else
        <livewire:wallet.wallet-transaction-history />
    @endif
</div>