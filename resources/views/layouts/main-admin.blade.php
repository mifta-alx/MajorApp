<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jurusanku</title>
    <link rel="icon" href="{{ url('/images/logo.png') }}">
    <script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @livewireStyles
</head>

<body>
    @include('components.sidebar')
    @livewireScripts
</body>

</html>
