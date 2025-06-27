<x-layouts.app title="Tentang Kami">
    <br>
    <x-ui.section-container id="about">
        <x-slot:title>
            <div class="flex items-center mb-4">
                <span class="text-gray-600 text-base mr-2">Selamat datang di</span>
                <span class="text-primary font-extrabold text-2xl tracking-wide bg-gradient-to-r from-primary to-blue-400 bg-clip-text text-transparent drop-shadow-md">BookingLaundry</span>
            </div>
        </x-slot:title>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 items-center bg-white rounded-xl shadow-lg p-8">
            {{-- Desc --}}
            <div class="md:col-span-3 flex flex-col font-medium gap-6 text-gray-700 text-lg leading-relaxed animate-fade-in-up animate-infinite">
                <p class="animate-pulse">
                    <span class="text-primary font-bold text-xl">BookingLaundry</span>
                    hadir untuk menjawab kebutuhan mencuci pakaian secara mandiri tanpa harus memiliki mesin
                    cuci sendiri. Kami adalah platform online yang memungkinkan Anda memesan penggunaan mesin cuci di
                    laundry self-service secara praktis, cepat, dan terjadwal
                </p>
                <p class="animate-fade-in animate-infinite animate-delay-200">
                    Melalui sistem booking yang kami sediakan, Anda cukup memilih lokasi laundry, waktu yang sesuai, dan
                    tipe mesin cuci yang diinginkan. Semua proses dilakukan secara online, tidak perlu menunggu lama.
                </p>
                <p class="animate-fade-in animate-infinite animate-delay-400">
                    Layanan kami sangat cocok untuk Anda yang tinggal di kos, apartemen, atau lingkungan dengan
                    keterbatasan fasilitas mencuci. Dengan menggunakan layanan kami, Anda tetap bisa mencuci pakaian dengan nyaman
                    dan efisien tanpa biaya besar.
                </p>
                <p class="animate-fade-in animate-infinite animate-delay-600">
                    Kami percaya bahwa mencuci pakaian seharusnya tidak merepotkan. Karena itu, kami hadir untuk membuat
                    prosesnya lebih ringkas, hemat waktu, dan tetap dalam kendali Anda.
                </p>
            </div>
            {{-- Logo --}}
            <div class="flex justify-center md:justify-end items-center animate-bounce animate-infinite animate-duration-2000">
                <img src="{{ asset('images/placeholder.jpg') }}" alt="Logo" class="w-40 h-40 object-cover rounded-full shadow-md border-4 border-primary bg-gray-100" />
            </div>
        </div>
    </x-ui.section-container>

    <x-ui.section-container id="feedback" title="Umpan Balik Pelanggan">
        <div class="max-h-[400px] overflow-hidden overflow-y-auto">
            <livewire:feedback-list />
        </div>
    </x-ui.section-container>
</x-layouts.app>
