<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Major.</title>
    <link rel="icon" href="{{ url('/images/logo.png') }}">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @livewireStyles
</head>

<body>
    <div class="overflow-hidden">
        <header class="relative ">
            @include('components.usernavbar')

            @yield('container')

        </header>
    </div>
    @livewireScripts
</body>

</html>
