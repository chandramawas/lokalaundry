<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulator - {{ config('app.name') }}</title>
    <script src="https://kit.fontawesome.com/97124276d4.js" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="bg-gray-100">
    {{ $slot }}
    @livewireScripts

    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    @stack('scripts')
</body>

</html>