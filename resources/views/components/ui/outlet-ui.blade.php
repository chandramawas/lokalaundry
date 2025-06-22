<div class="border border-primary px-6 py-4 rounded-lg flex items-center gap-6">
    <i class="fa-solid fa-location-dot text-3xl"></i>

    <!-- Outlet Information -->
    <div class="flex-1 flex flex-col gap-1">
        <h3 class="text-lg font-semibold">{{ $name }}</h3>
        <p class="text-sm">{{ $address }}</p>
        <p class="text-sm">
            <i class="fa-brands fa-whatsapp"></i>
            +62 {{ $phone }}
        </p>
    </div>

    <!-- Action Button -->
    <x-buttons.button>Booking Now</x-buttons.button>
</div>