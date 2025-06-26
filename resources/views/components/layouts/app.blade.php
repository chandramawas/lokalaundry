<!DOCTYPE html>
<html lang="id">

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
                    <x-buttons.nav-button href="{{ route('home') }}">Beranda</x-buttons.nav-button>
                    <x-buttons.nav-button href="{{ route('outlets') }}">Outlet</x-buttons.nav-button>
                    <x-buttons.nav-button href="{{ route('booking') }}">Booking</x-buttons.nav-button>
                    <x-buttons.nav-button href="{{ route('products') }}">Produk</x-buttons.nav-button>
                </div>

                {{-- Right --}}
                <div class="justify-self-end flex gap-2 items-center">
                    @auth
                        <x-buttons.button href="{{ route('wallet') }}"
                            variant="{{ url()->current() == route('wallet') ? 'primary' : 'outline' }}">
                            <i class="fa-solid fa-wallet"></i>
                            <span class="font-medium ml-1">
                                Rp{{ number_format(auth()->user()->wallet->balance, 0, ',', '.') }}
                            </span>
                        </x-buttons.button>

                        <div class="relative" x-data="{ open: false }" @click.away="open = false">
                            <button @click="open = !open"
                                class="h-9 w-9 shrink-0 flex items-center rounded-full overflow-hidden border border-primary cursor-pointer transition @if (url()->current() == route('profile')) ring-3 ring-primary @endif ">
                                <x-ui.user-avatar :avatar="Auth::user()->avatar" :name="Auth::user()->name" />
                            </button>

                            {{-- Dropdown --}}
                            <div x-show="open" x-transition
                                class="absolute right-0 mt-2 w-50 bg-white border border-gray-200 text-on-surface rounded-lg shadow-lg z-50 text-sm overflow-hidden">

                                <a href="{{ route('profile') }}" class="block px-6 py-3 hover:bg-gray-100 transition">
                                    <i class="fa-solid fa-user"></i>
                                    <span class="ml-1">Profil</span>
                                </a>

                                <a href="#history" class="block px-6 py-3 hover:bg-gray-100 transition">
                                    <i class="fa-solid fa-clock-rotate-left"></i>
                                    <span class="ml-1">Riwayat Pesanan</span>
                                </a>

                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="w-full text-left px-6 py-3 hover:bg-gray-100 transition cursor-pointer">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                        <span class="ml-1">Keluar</span>
                                    </button>
                                </form>

                            </div>
                        </div>
                    @endauth
                    @guest
                        <x-buttons.button href="{{ route('login') }}?r={{ url()->current() }}"
                            variant="outline">Masuk</x-buttons.button>
                        <x-buttons.button href="{{ route('register') }}" variant="primary">Daftar</x-buttons.button>
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
                <x-buttons.text-button href="{{ route('about') }}">Tentang Kami</x-buttons.text-button>
                <span>|</span>
                <x-buttons.text-button href="{{ route('contact') }}">Kontak Kami</x-buttons.text-button>
            </div>

            {{-- Copyright --}}
            <p class="text-xs text-on-surface-variant">
                &copy; {{ date('Y') }} BookingLaundry. All rights reserved.
            </p>
        </div>
    </footer>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
</body>

</html>