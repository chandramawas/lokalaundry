<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Booking Sekarang' }} - {{ config('app.name') }}</title>

    {{-- Bunny Fonts: Poppins --}}
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700" rel="stylesheet" />

    {{-- Icons --}}
    <script src="https://kit.fontawesome.com/97124276d4.js" crossorigin="anonymous"></script>

    {{-- JS --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="bg-surface text-on-surface font-sans antialiased cursor-default">
    <div class="min-h-screen">
        {{-- Navbar --}}
        <nav class="sticky top-0 z-50 backdrop-blur bg-surface/70 border-b border-on-surface/10 py-6 px-8">
            <div class="max-w-7xl mx-auto text-sm grid grid-cols-3 items-center">
                {{-- Left --}}
                <div>
                    <a href="{{ route('home') }}" class="text-primary font-bold text-lg">BookingLaundry</a>
                </div>

                {{-- Mid --}}
                <div class="justify-self-center flex gap-8">
                    <x-buttons.nav-button href="{{ route('home') }}">Home</x-buttons.nav-button>
                    <x-buttons.nav-button href="{{ route('outlet') }}">Outlets</x-buttons.nav-button>
                    <x-buttons.nav-button href="{{ route('booking') }}">Booking</x-buttons.nav-button>
                    <x-buttons.nav-button href="{{ route('product') }}">Products</x-buttons.nav-button>
                </div>

                {{-- Right --}}
                <div class="justify-self-end flex gap-4">
                    @auth
                        <x-buttons.icon-button href="#history" class="h-8 w-8" variant="outline">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                        </x-buttons.icon-button>

                        <div class="relative" x-data="{ open: false }" @click.away="open = false">
                            <button @click="open = !open"
                                class="h-8 w-8 shrink-0 rounded-full overflow-hidden cursor-pointer @if (url()->current() == route('profile')) ring-3 ring-primary @endif ">
                                <x-ui.user-avatar :avatar="Auth::user()->avatar" :name="Auth::user()->name" size="8" />
                            </button>

                            <div x-show="open" x-transition
                                class="absolute right-0 mt-2 w-50 bg-white border border-gray-200 text-on-surface rounded-lg shadow-lg z-50 text-sm overflow-hidden">
                                <a href="{{ route('profile') }}" class="block px-6 py-3 hover:bg-gray-100 transition">
                                    <i class="fa-solid fa-user"></i> <span class="ml-1">Profile</span>
                                </a>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="w-full text-left px-6 py-3 hover:bg-gray-100 transition cursor-pointer">
                                        <i class="fa-solid fa-right-from-bracket"></i> <span class="ml-1">Logout</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endauth
                    @guest
                        <x-buttons.button href="{{ route('login') }}" variant="outline">Login</x-buttons.button>
                        <x-buttons.button href="{{ route('register') }}" variant="primary">Register</x-buttons.button>
                    @endguest
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

    @livewireScripts
</body>

</html>