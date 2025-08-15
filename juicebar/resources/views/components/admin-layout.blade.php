<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Admin</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="min-h-screen">
            <!-- Admin Navigation -->
            <nav class="bg-red-600 shadow-lg">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <a href="{{ route('admin.dashboard') }}" class="flex items-center text-white font-bold text-xl hover:text-red-100 transition-colors duration-200">
                                    <img src="{{ asset('logo/logo.png') }}" alt="JuiceBar Logo" class="h-10 w-10 mr-3 rounded-lg shadow-sm">
                                    <span>JuiceBar Admin</span>
                                </a>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.dashboard') ? 'border-white text-white' : 'border-transparent text-red-100 hover:text-white hover:border-red-300' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                                    📊 Dashboard
                                </a>
                                <a href="{{ route('admin.products.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.products.*') ? 'border-white text-white' : 'border-transparent text-red-100 hover:text-white hover:border-red-300' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                                    🧃 Products
                                </a>
                                <a href="{{ route('admin.users.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.users.*') ? 'border-white text-white' : 'border-transparent text-red-100 hover:text-white hover:border-red-300' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                                    👥 Users
                                </a>
                                <a href="{{ route('admin.employees.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.employees.*') ? 'border-white text-white' : 'border-transparent text-red-100 hover:text-white hover:border-red-300' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                                    👷 Employees
                                </a>
                                <a href="{{ route('admin.orders.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.orders.*') ? 'border-white text-white' : 'border-transparent text-red-100 hover:text-white hover:border-red-300' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                                    📦 Orders
                                </a>
                                <a href="{{ route('admin.fruits.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.fruits.*') ? 'border-white text-white' : 'border-transparent text-red-100 hover:text-white hover:border-red-300' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                                    🍊 Fruits
                                </a>
                            </div>
                        </div>

                        <!-- Settings Dropdown -->
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <div class="ml-3 relative">
                                <div class="flex items-center space-x-4">
                                    <span class="text-white text-sm">{{ Auth::user()->name }}</span>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="bg-red-700 hover:bg-red-800 text-white px-4 py-2 rounded-lg text-sm font-medium transition duration-150 ease-in-out">
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>