<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | @yield('title')</title>
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">  --}}

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    @stack('head')
</head>

<body class="bg-gray-100 text-gray-900 min-h-screen flex flex-col">

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

    <div class="flex flex-1 overflow-hidden">
        {{-- Sidebar --}}
        {{-- 
        <aside class="w-64 bg-white shadow-md p-4 hidden md:block">
            <ul class="space-y-2">
                <li><a href="#" class="block py-2 px-4 rounded hover:bg-gray-100">Dashboard</a></li>
                

                <li><a href="#" class="block py-2 px-4 rounded hover:bg-gray-100">Posts</a></li>
                <li><a href="#" class="block py-2 px-4 rounded hover:bg-gray-100">Reports</a></li>
            </ul>
        </aside> 
        --}}

        {{-- <aside class="w-64 bg-white shadow-md p-4 hidden md:block" x-data="{ open: false }">
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 rounded hover:bg-gray-100">Dashboard</a>
                </li>
                <li>
                    <button @click="open = !open"
                        class="w-full text-left flex items-center justify-between py-2 px-4 rounded hover:bg-gray-100">
                        Notice and News
                        <svg class="w-4 h-4 transform transition-transform" :class="open ? 'rotate-180' : ''"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul x-show="open" x-collapse class="pl-6 space-y-1 mt-1 text-sm text-gray-700">
                        <li>
                            <a href="#" class="block py-1 px-2 rounded hover:bg-gray-100">Notices</a>
                        </li>
                        <li>
                            <a href="{{ route('notice-categories.index') }}" class="block py-1 px-2 rounded hover:bg-gray-100">Notice Categories</a>
                        </li>
                    </ul>
                </li>
                <li><a href="#" class="block py-2 px-4 rounded hover:bg-gray-100">Posts</a></li>
                <li><a href="#" class="block py-2 px-4 rounded hover:bg-gray-100">Reports</a></li>
            </ul>
        </aside> --}}

        <aside class="w-64 bg-white shadow-md p-4 hidden md:block overflow-y-auto" x-data="{ open: {{ request()->is('notice-categories*') || request()->is('notices*') ? 'true' : 'false' }} }">
            <ul class="space-y-2">
                <!-- Dashboard (Always highlighted) -->
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="block py-2 px-4 rounded {{ request()->routeIs('admin.dashboard') ? 'bg-blue-100 text-blue-700' : 'bg-gray-100 text-gray-800' }}">
                        Dashboard
                    </a>
                </li>

                <!-- Notice & News Dropdown -->
                <li x-data="{ open: false }">
                    <button @click="open = !open"
                        class="w-full text-left flex items-center justify-between py-2 px-4 rounded hover:bg-gray-100">
                        Notice and News
                        <svg class="w-4 h-4 transform transition-transform" :class="open ? 'rotate-180' : ''"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul x-show="open" x-collapse class="pl-6 space-y-1 mt-1 text-sm text-gray-700">
                        <li>
                            <a href="{{ route('notices.index') }}"
                                class="block py-1 px-2 rounded hover:bg-gray-100 {{ request()->routeIs('notices.*') ? 'bg-blue-50 text-blue-600' : '' }}">
                                Notices
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('notice-categories.index') }}"
                                class="block py-1 px-2 rounded hover:bg-gray-100 {{ request()->routeIs('notice-categories.*') ? 'bg-blue-50 text-blue-600' : '' }}">
                                Notice Categories
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Records Dropdown -->
                <li x-data="{ open: false }">
                    <button @click="open = !open"
                        class="w-full text-left flex items-center justify-between py-2 px-4 rounded hover:bg-gray-100">
                        Records
                        <svg class="w-4 h-4 transform transition-transform" :class="open ? 'rotate-180' : ''"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul x-show="open" x-collapse class="pl-6 space-y-1 mt-1 text-sm text-gray-700">
                        <!-- All Records -->
                        <li>
                            <a href="{{ route('records.index') }}"
                                class="block py-1 px-2 rounded hover:bg-gray-100 {{ request()->routeIs('records.*') && !request()->routeIs('record-types.*', 'record-categories.*') ? 'bg-blue-50 text-blue-600' : '' }}">
                                All Records
                            </a>
                        </li>
                        <!-- Record Types -->
                        <li>
                            <a href="{{ route('record-types.index') }}"
                                class="block py-1 px-2 rounded hover:bg-gray-100 {{ request()->routeIs('record-types.*') ? 'bg-blue-50 text-blue-600' : '' }}">
                                Record Types
                            </a>
                        </li>
                        <!-- Record Categories -->
                        <li>
                            <a href="{{ route('record-categories.index') }}"
                                class="block py-1 px-2 rounded hover:bg-gray-100 {{ request()->routeIs('record-categories.*') ? 'bg-blue-50 text-blue-600' : '' }}">
                                Record Categories
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Other Menu Items -->
                <li><a href="{{ route('photos-galleries.index') }}"
                        class="block py-2 px-4 rounded hover:bg-gray-100">Gallery</a></li>
                <li><a href="{{ route('departments.index') }}"
                        class="block py-2 px-4 rounded hover:bg-gray-100">Department</a>
                </li>
                {{-- <li>
                    <a href="{{ route('about-us.index')}}" class="block py-2 px-4 rounded hover:bg-gray-100">About Us</a>
                </li> --}}
                <li>
                    <a href="{{ route('office-details.index') }}"
                        class="block py-2 px-4 rounded hover:bg-gray-100">Office Details 
                    </a>
                </li>

                <li x-data="{ open: false }">
                    <button @click="open = !open"
                        class="w-full text-left flex items-center justify-between py-2 px-4 rounded hover:bg-gray-100">
                        Employee Management
                        <svg class="w-4 h-4 transform transition-transform" :class="open ? 'rotate-180' : ''"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul x-show="open" x-collapse class="pl-6 space-y-1 mt-1 text-sm text-gray-700">
                        <li>
                            <a href="{{ route('employees.index') }}"
                                class="block py-1 px-2 rounded hover:bg-gray-100 {{ request()->routeIs('employees.*') ? 'bg-blue-50 text-blue-600' : '' }}">
                                Employees
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('posts.index') }}"
                                class="block py-1 px-2 rounded hover:bg-gray-100 {{ request()->routeIs('posts.*') ? 'bg-blue-50 text-blue-600' : '' }}">
                                Posts
                            </a>
                        </li>
                    </ul>
                </li>


            </ul>
        </aside>


        {{-- Main Content --}}
        <main class="flex-1 p-6 overflow-y-auto">
            @yield('content')
        </main>
    </div>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}
    @stack('scripts')
</body>

</html>
