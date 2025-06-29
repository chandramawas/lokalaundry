<div class="grid grid-cols-2 md:grid-cols-4 gap-4">
    <x-ui.service-ui icon="fa-solid fa-calendar-days" descDisplay="365" descBody="Hari" />
    <x-ui.service-ui icon="fa-solid fa-store" descDisplay="{{ $outletCount }}" descBody="Outlet" />
    <x-ui.service-ui icon="fa-solid fa-building-wheat" descDisplay="{{ $cityCount }}" descBody="Kota" />
    <x-ui.service-ui icon="fa-solid fa-clock" descDisplay="24" descBody="Jam Buka" />
</div>