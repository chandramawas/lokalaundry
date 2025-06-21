<x-layouts.app title="Home">
    {{-- Hero --}}
    <section id="hero" class="relative h-[calc(100vh-96px)] overflow-hidden">
        {{-- Background Image --}}
        <div class="absolute inset-0 z-0 opacity-30">
            <img src="{{ asset('images/laundry_coin.jpg') }}" class="w-full h-full object-cover" />
        </div>

        {{-- Content --}}
        <div class="relative z-10 flex items-center justify-center w-full h-full px-6">
            <div class="text-center max-w-2xl flex flex-col gap-8">
                <h1 class="text-4xl font-bold text-primary">
                    Laundry Made Easy
                </h1>
                <p class="text-lg font-medium text-on-surface">
                    Melakukan laundry menjadi lebih mudah dengan adanya booking laundry, tidak perlu menunggu.
                </p>
                <x-buttons.button href="#booking" class="w-fit mx-auto">
                    Booking Now
                </x-buttons.button>
            </div>
        </div>
    </section>

    {{-- Services --}}
    <x-ui.section-container id="services" title="Our Services">
        <div class="grid grid-cols-4 gap-2">
            <x-ui.service-ui icon="fa-solid fa-calendar-days" descDisplay="365" descBody="Days Open" />
            <x-ui.service-ui icon="fa-solid fa-store" descDisplay="50" descBody="Outlet" />
            <x-ui.service-ui icon="fa-solid fa-building-wheat" descDisplay="6" descBody="Major City" />
            <x-ui.service-ui icon="fa-solid fa-clock" descDisplay="24" descBody="Hours Open" />
        </div>
    </x-ui.section-container>

    {{-- Feedback --}}
    <x-ui.section-container id="feedback" title="Customer Feedback">
        <div class="grid grid-cols-2 gap-4 h-[400px]">
            {{-- Customer Feedback --}}
            <div class="p-4 border border-primary rounded-xl flex flex-col gap-4 h-full overflow-hidden">
                <livewire:feedback-list />
            </div>

            {{-- Make Feedback --}}
            <div class="relative p-4 border border-primary rounded-xl flex flex-col gap-4 h-full">
                <h3 class="text-xl font-bold text-primary z-10 relative">Give us your feedback!</h3>

                {{-- Form --}}
                <div class="flex-1">
                    <livewire:feedback-form />
                </div>

                {{-- Overlay for Guest --}}
                @guest
                    <div
                        class="absolute inset-0 bg-white/80 backdrop-blur-xs flex flex-col items-center justify-center z-20 rounded-xl text-center p-4">
                        <p class="text-on-surface-variant text-sm mb-4">
                            You need to
                            <x-buttons.text-button href="{{ route('login') }}" class="text-primary font-bold">
                                Login
                            </x-buttons.text-button>
                            first to send feedback!
                        </p>
                    </div>
                @endguest
            </div>
        </div>
    </x-ui.section-container>
</x-layouts.app>