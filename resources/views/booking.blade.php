<x-layouts.app title="Booking">
    <br>
    {{-- Pick Outlet --}}
    <x-ui.section-container id="outlet">
        <x-ui.outlet-ui name="{{ $outlet->name }}" address="{{ $outlet->address }}" phone="{{ $outlet->phone }}" button
            buttonLabel="Ganti Outlet" buttonVariant="outline" buttonHref="{{ route('outlets') }}" />
    </x-ui.section-container>

    {{-- Pick Date, Time, Machine --}}
    <x-ui.section-container id="booking">
        <div class="flex flex-col gap-8">
            {{-- Pick Date--}}
            <livewire:booking.date-picker />

            {{-- Pick Time Session --}}
            <livewire:booking.time-session-picker />

            {{-- Machine & Price --}}
            <livewire:booking.machine-with-price />
        </div>
    </x-ui.section-container>

    {{-- Booking Summary --}}
    <x-ui.section-container id="booking-summary" title="Ringkasan Booking">
        <livewire:booking.booking-summary />
    </x-ui.section-container>
</x-layouts.app>