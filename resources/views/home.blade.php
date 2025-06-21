<x-layouts.app title="Beranda Laundry">
    {{-- Hero --}}
    <section id="hero" class="relative h-[calc(100vh-96px)] overflow-hidden rounded-4xl">
        {{-- Background Image --}}
        <div class="absolute inset-0 z-0 opacity-30">
            <img src="{{ asset('images/laundry_coin.jpg') }}" alt="Laundry Background"
                class="w-full h-full object-cover" />
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
                <div class="flex-1 overflow-y-auto pr-2 space-y-4">
                    @for ($i = 1; $i <= 20; $i++)
                        <x-ui.customer-feedback username="User{{ 21 - $i }}" createdAt="{{ 21 - $i }}d">
                            Ini feedback ke-{{ 21 - $i }}
                        </x-ui.customer-feedback>
                    @endfor
                </div>
            </div>

            {{-- Make Feedback --}}
            <div class="p-4 border border-primary rounded-xl flex flex-col gap-4 h-full">
                <h3 class="text-xl font-bold text-primary">Give your feedback!</h3>
                <form action="" method="post" class="flex flex-col flex-1 gap-2 justify-between">
                    <div class="flex flex-col gap-2">
                        <x-forms.input name="name" type="text" label="Name*" value="John Doe" readonly />
                        <x-forms.input name="message" type="textarea" label="Message*" rows="5" />
                    </div>
                    <div class="flex justify-end">
                        <x-buttons.button type="submit">Submit</x-buttons.button>
                    </div>
                </form>
            </div>
        </div>
    </x-ui.section-container>
</x-layouts.app>