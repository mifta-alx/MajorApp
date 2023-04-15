<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jurusanku</title>
    <link rel="icon" href="{{ url('/images/logo.png') }}">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @livewireStyles
</head>

<body>
    <div class="mb-20 overflow-hidden sm:mb-32 md:mb-40">
        <header class="relative ">
            @include('components.navbar')

            @yield('container')

        </header>
    </div>
    @livewireScripts
</body>

</html>
