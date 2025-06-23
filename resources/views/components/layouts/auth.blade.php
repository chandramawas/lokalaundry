<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Autentikasi' }} - {{ config('app.name') }}</title>

    {{-- Bunny Fonts: Poppins --}}
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700" rel="stylesheet" />

    {{-- Icons --}}
    <script src="https://kit.fontawesome.com/97124276d4.js" crossorigin="anonymous"></script>

    {{-- JS --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-surface text-on-surface font-sans text-base antialiased cursor-default">
    <div class="min-h-screen grid grid-cols-2">
        {{-- Left --}}
        <div class="relative overflow-hidden">
            {{-- Background --}}
            <div class="absolute inset-0 z-0 opacity-30">
                <img src="{{ asset('images/laundry_coin2.jpg') }}" class="w-full h-full object-cover" />
            </div>

            {{-- Content --}}
            <div class="relative z-10 size-full flex items-center justify-center px-6">
                <a href="{{ route('home') }}" class="text-4xl font-bold text-primary">
                    BookingLaundry
                </a>
            </div>
        </div>

        {{-- Right --}}
        <div class="size-full px-12 py-10 flex flex-col gap-8">
            {{ $slot }}
        </div>
    </div>
</body>

</html>