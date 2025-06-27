<x-layouts.app title="Beranda">
    {{-- Hero --}}
    <section id="hero" class="relative h-[calc(100vh-96px)] overflow-hidden">
        {{-- Background Image --}}
        <div class="absolute inset-0 z-0 opacity-30">
            <img src="{{ asset('images/laundry_coin.jpg') }}" class="w-full h-full object-cover" />
        </div>

        {{-- Content --}}
        <div class="relative z-10 flex items-center justify-center w-full h-full px-6">
            <div class="text-center max-w-2xl flex flex-col gap-8">
                <h1 class="text-5xl md:text-6xl font-extrabold text-transparent bg-gradient-to-r from-primary via-blue-400 to-primary bg-clip-text drop-shadow-lg tracking-tight animate-fade-in-up animate-infinite animate-duration-3000">
                    Laundry Made Easy
                </h1>
                <p class="text-lg md:text-xl font-medium text-primary/90 animate-fade-in animate-infinite animate-delay-200 tracking-wide drop-shadow-sm">
                    Melakukan laundry menjadi lebih mudah dengan adanya <span class="font-bold text-blue-600">Booking Laundry</span>, tidak perlu menunggu.
                </p>
                <x-buttons.button href="{{ route('outlets') }}" class="w-fit mx-auto">
                    Booking Sekarang
                </x-buttons.button>
            </div>
        </div>
    </section>

    {{-- Services --}}
    <x-ui.section-container id="services" title="Layanan Kami">
        <livewire:services />
    </x-ui.section-container>

    {{-- Feedback --}}
    <x-ui.section-container id="feedback">
        <div class="grid grid-cols-2 gap-4">
            {{-- Customer Feedback --}}
            <div class="p-4 border border-primary rounded-xl h-full">
                <div class="max-h-[400px] overflow-hidden overflow-y-auto">
                    <livewire:feedback-list />
                </div>
            </div>

            {{-- Make Feedback --}}
            <div class="relative p-4 border border-primary rounded-xl flex flex-col gap-4 h-full">
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