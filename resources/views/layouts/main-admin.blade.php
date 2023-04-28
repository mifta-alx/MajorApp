<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Major.</title>
    <link rel="icon" href="{{ url('/images/logo.png') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    @include('components.sidebar')
    {{-- <script src="https://code.jquery.com/jquery-3.6.4.js"></script> --}}
    @livewireScripts
    @yield('script')
    <script type="module">
$(document).ready(function() {
            setTimeout(() => {
                $('#toast').addClass('hidden');
            }, 1500);
        })
    </script>
</body>

</html>
