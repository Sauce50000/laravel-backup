<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MOLMAC | @yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    {{-- @vite('resources/css/app.css') --}}
    {{-- <link href="/dist/styles.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script> --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @yield('styles')

    <style>
        /* a:not([class]) {
            color: rgb(15, 132, 190);
        }

        a:not([class]):hover {
            color: rgb(245, 41, 65);
        } */


        [x-cloak] {
            display: none !important;
        }
    </style>


</head>

<body class="flex flex-col min-h-screen">
    <div>
        @include('partials.banner')
    </div>
    <main class="flex-1">
        @yield('content')
    </main>
    <footer>
        @include('partials.footer')
    </footer>
    @yield('scripts')

    <script>
        const options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        const today = new Date();
        document.getElementById("date").innerText = today.toLocaleDateString('en-US', options);
    </script>
</body>

</html>
