<div
    class="border border-primary px-4 py-4 rounded-lg flex flex-col sm:flex-row items-center sm:items-center gap-4 sm:gap-6 text-center sm:text-left">

    {{-- Icon --}}
    <i class="fa-solid fa-location-dot text-3xl"></i>

    {{-- Outlet Information --}}
    <div class="flex-1 flex flex-col gap-1">
        <h3 class="text-lg font-semibold">{{ $name }}</h3>
        <p class="text-sm">{{ $address }}</p>
        <p class="text-sm">
            <i class="fa-brands fa-whatsapp"></i>
            +62 {{ $phone }}
        </p>
    </div>

    {{-- Action Button --}}
    @if ($button)
        <x-buttons.button variant="{{ $buttonVariant }}" href="{{ $buttonHref }}">{{ $buttonLabel }}</x-buttons.button>
    @endif
</div>