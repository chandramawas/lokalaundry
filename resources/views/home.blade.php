<x-layouts.app title="Beranda">
    @if (session('success'))
        <script>alert("{{ session('success') }}")</script>
    @endif

    {{-- Hero --}}
    <section id="hero" class="relative h-[calc(100vh-96px)] overflow-hidden flex items-center justify-center bg-gradient-to-br from-primary/10 via-blue-100 to-white">
        {{-- Background Image --}}
        <div class="absolute inset-0 z-0 opacity-30">
            <img src="{{ asset('images/laundry_coin.jpg') }}" class="w-full h-full object-cover scale-105 blur-[2px]" />
        </div>

        {{-- Content --}}
        <div class="relative z-10 flex items-center justify-center w-full h-full px-6">
            <div class="text-center max-w-2xl flex flex-col gap-8 bg-white/70 rounded-2xl shadow-xl p-10 border border-primary/20 backdrop-blur-md">
                <h1 class="text-5xl md:text-6xl font-extrabold text-primary drop-shadow-lg tracking-tight animate-fade-in-up">
                    Laundry Made Easy
                </h1>
                <p class="text-lg md:text-xl font-medium text-primary/80 animate-fade-in-up delay-100">
                    Melakukan laundry menjadi lebih mudah dengan adanya <span class="font-bold text-blue-600">Booking Laundry</span>, tidak perlu menunggu.
                </p>
                <x-buttons.button href="{{ route('outlets') }}" class="w-fit mx-auto px-8 py-3 text-lg rounded-full shadow bg-gradient-to-r from-primary to-blue-400 hover:from-blue-400 hover:to-primary transition-all duration-200 animate-fade-in-up delay-200">
                    Booking Sekarang
                </x-buttons.button>
            </div>
        </div>
    </section>

    {{-- Services --}}
    <x-ui.section-container id="services" title="Layanan Kami">
        <div class="bg-gradient-to-br from-blue-50 via-white to-blue-100 rounded-xl shadow p-6">
            <livewire:services />
        </div>
    </x-ui.section-container>

    {{-- Feedback --}}
    <x-ui.section-container id="feedback">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Customer Feedback --}}
            <div class="p-6 border border-primary/30 rounded-2xl h-full bg-gradient-to-br from-green-50 via-white to-green-100 shadow">
                <div class="max-h-[400px] overflow-hidden overflow-y-auto">
                    <livewire:feedback-list />
                </div>
            </div>

            {{-- Make Feedback --}}
            <div class="relative p-6 border border-primary/30 rounded-2xl flex flex-col gap-4 h-full bg-gradient-to-br from-pink-50 via-white to-pink-100 shadow">
                <h3 class="text-xl font-bold text-primary z-10 relative">Berikan Umpan Balik!</h3>

                {{-- Form --}}
                <div class="flex-1">
                    <livewire:feedback-form />
                </div>

                {{-- Overlay for Guest --}}
                @guest
                    <div
                        class="absolute inset-0 bg-white/80 backdrop-blur-xs flex flex-col items-center justify-center z-20 rounded-xl text-center p-4">
                        <p class="text-on-surface-variant text-sm">
                            Kamu perlu
                            <x-buttons.text-button href="{{ route('login') }}" class="text-primary font-bold">
                                Masuk
                            </x-buttons.text-button>
                            untuk memberikan umpan balik!
                        </p>
                    </div>
                @endguest
            </div>
        </div>
    </x-ui.section-container>
</x-layouts.app>