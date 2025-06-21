<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Laundry Booking' }}</title>

    {{-- Bunny Fonts: Poppins --}}
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700" rel="stylesheet" />

    {{-- Icons --}}
    <script src="https://kit.fontawesome.com/97124276d4.js" crossorigin="anonymous"></script>

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-surface text-on-surface font-sans antialiased cursor-default">
    <div class="min-h-screen">
        {{-- Navbar --}}
        <nav class="py-8 px-8">
            <div class="max-w-7xl mx-auto text-sm grid grid-cols-3 items-center">
                {{-- Left --}}
                <div>
                    <a href="" class="text-primary font-bold text-lg">BookingLaundry</a>
                </div>

                {{-- Mid --}}
                <div class="justify-self-center space-x-8">
                    <x-buttons.nav-button href="{{ route('home') }}">Home</x-buttons.nav-button>
                    <x-buttons.nav-button href="{{ route('outlet') }}">Outlet</x-buttons.nav-button>
                    <x-buttons.nav-button href="{{ route('booking') }}">Booking</x-buttons.nav-button>
                    <x-buttons.nav-button href="{{ route('product') }}">Product</x-buttons.nav-button>
                </div>

                {{-- Right --}}
                <div class="justify-self-end space-x-2">
                    <x-buttons.button href="#login" variant="outline">Login</x-buttons.button>
                    <x-buttons.button href="#register" variant="primary">Register</x-buttons.button>
                </div>
            </div>
        </nav>

        {{-- Page Content --}}
        <main class="space-y-8 pb-20">
            {{ $slot ?? '' }}
        </main>
    </div>

    {{-- Footer --}}
    <footer class="bg-white py-6 px-8">
        <div class="max-w-7xl mx-auto text-base text-center flex flex-col gap-4">
            {{-- Brand --}}
            <h4 class="font-bold text-primary text-xl">BookingLaundry</h4>

            {{-- Social Media --}}
            <div class="flex gap-4 justify-center">
                <x-buttons.icon-button href="#whatsapp">
                    <i class="fa-brands fa-whatsapp"></i>
                </x-buttons.icon-button>
                <x-buttons.icon-button href="#instagram">
                    <i class="fa-brands fa-instagram"></i>
                </x-buttons.icon-button>
            </div>

            <hr class="border-on-surface-variant">

            {{-- Buttons --}}
            <div class="flex gap-4 justify-center">
                <x-buttons.text-button>About Us</x-buttons.text-button>
                <span>|</span>
                <x-buttons.text-button>Contact Us</x-buttons.text-button>
            </div>

            {{-- Copyright --}}
            <p class="text-xs text-on-surface-variant">
                &copy; {{ date('Y') }} BookingLaundry. All rights reserved.
            </p>
        </div>
    </footer>
</body>

</html>