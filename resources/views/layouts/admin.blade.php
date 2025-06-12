<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | @yield('title')</title>
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">  --}}

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="bg-gray-100 text-gray-900">

    {{-- Navbar --}}
    <nav class="bg-gray-800 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-lg font-semibold">Admin Panel</h1>
            <div>
                <a href="#" class="px-3 py-2 rounded hover:bg-gray-700">Dashboard</a>
                <a href="#" class="px-3 py-2 rounded hover:bg-gray-700">Settings</a>
                <a href="#" class="px-3 py-2 rounded hover:bg-gray-700">Logout</a>
            </div>
        </div>
    </nav>

    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        <aside class="w-64 bg-white shadow-md p-4 hidden md:block">
            <ul class="space-y-2">
                <li><a href="#" class="block py-2 px-4 rounded hover:bg-gray-100">Dashboard</a></li>
                <li><a href="#" class="block py-2 px-4 rounded hover:bg-gray-100">Users</a></li>
                <li><a href="#" class="block py-2 px-4 rounded hover:bg-gray-100">Posts</a></li>
                <li><a href="#" class="block py-2 px-4 rounded hover:bg-gray-100">Reports</a></li>
            </ul>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

</body>

</html>
