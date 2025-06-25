<x-layouts.app title="Tentang Kami">
    <br>
    <x-ui.section-container id="about" title="Tentang Kami">
        <div class="grid grid-cols-4 gap-8">
            {{-- Desc --}}
            <div class="col-span-3 text-pretty flex flex-col font-medium gap-6">
                <p>
                    <span class="text-primary font-bold">BookingLaundry</span>
                    hadir untuk menjawab kebutuhan mencuci pakaian secara mandiri tanpa harus memiliki mesin
                    cuci sendiri. Kami adalah platform online yang memungkinkan Anda memesan penggunaan mesin cuci di
                    laundry self-service secara praktis, cepat, dan terjadwal
                </p>
                <p>
                    Melalui sistem booking yang kami sediakan, Anda cukup memilih lokasi laundry, waktu yang sesuai, dan
                    tipe mesin cuci yang diinginkan. Semua proses dilakukan secara online, tidak perlu menunggu lama.
                </p>
                <p>
                    Layanan kami sangat cocok untuk Anda yang tinggal di kos, apartemen, atau lingkungan dengan
                    keterbatasan
                    fasilitas mencuci. Dengan menggunakan layanan kami, Anda tetap bisa mencuci pakaian dengan nyaman
                    dan
                    efisien tanpa biaya besar.
                </p>
                <p>
                    Kami percaya bahwa mencuci pakaian seharusnya tidak merepotkan. Karena itu, kami hadir untuk membuat
                    prosesnya lebih ringkas, hemat waktu, dan tetap dalam kendali Anda.
                </p>
            </div>
            {{-- Logo --}}
            <img src="{{ asset('images/placeholder.jpg') }}" alt="Logo">

            <div class="col-span-4 flex">
                <x-buttons.button href="{{ route('contact') }}">
                    Hubungi Kami
                </x-buttons.button>
            </div>
        </div>
    </x-ui.section-container>

    <x-ui.section-container id="feedback" title="Umpan Balik Pelanggan">
        <div class="max-h-[400px] overflow-hidden overflow-y-auto">
            <livewire:feedback-list />
        </div>
    </x-ui.section-container>
</x-layouts.app>