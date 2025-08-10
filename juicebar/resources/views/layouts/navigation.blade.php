<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh Juice Paradise - Navigation</title>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        /* Elegant cart button styling */
        .elegant-cart {
            position: relative;
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            background: linear-gradient(135deg, rgba(255, 107, 53, 0.1) 0%, rgba(56, 217, 169, 0.1) 100%);
            border: 1px solid rgba(255, 107, 53, 0.2);
            border-radius: 0.75rem;
            color: #374151;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-weight: 500;
            font-size: 0.875rem;
        }

        .elegant-cart:hover {
            background: linear-gradient(135deg, rgba(255, 107, 53, 0.15) 0%, rgba(56, 217, 169, 0.15) 100%);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(255, 107, 53, 0.25);
            color: #ff6b35;
        }

        .cart-icon {
            width: 1.25rem;
            height: 1.25rem;
            margin-right: 0.5rem;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .cart-badge {
            position: absolute;
            top: -0.25rem;
            right: -0.25rem;
            min-width: 1.25rem;
            height: 1.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #ff6b35 0%, #f9844a 100%);
            color: white;
            font-size: 0.75rem;
            font-weight: 600;
            border-radius: 50%;
            padding: 0 0.25rem;
            animation: pulse-gentle 2s infinite;
        }

        @keyframes pulse-gentle {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        /* Mobile cart styling */
        .mobile-cart {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem;
            background: linear-gradient(135deg, rgba(255, 107, 53, 0.1) 0%, rgba(56, 217, 169, 0.1) 100%);
            border: 1px solid rgba(255, 107, 53, 0.2);
            border-radius: 0.5rem;
            color: #374151;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
        }

        .mobile-cart:hover {
            background: linear-gradient(135deg, rgba(255, 107, 53, 0.15) 0%, rgba(56, 217, 169, 0.15) 100%);
            color: #ff6b35;
            transform: translateY(-1px);
        }

        /* Responsive navigation link for mobile cart */
        .mobile-cart-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            border-left: 3px solid transparent;
            color: #374151;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .mobile-cart-link:hover {
            border-left-color: #ff6b35;
            background: linear-gradient(90deg, rgba(255, 107, 53, 0.1), transparent);
            color: #ff6b35;
        }

        .cart-text {
            margin-left: 0.5rem;
            font-weight: 500;
        }

        .cart-count {
            margin-left: 0.25rem;
            color: #ff6b35;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}">
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('product')" :active="request()->routeIs('product')">
                            {{ __('Product') }}
                        </x-nav-link>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('about')" :active="request()->routeIs('about')">
                            {{ __('about') }}
                        </x-nav-link>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('contactus')" :active="request()->routeIs('contactus')">
                            {{ __('contact us') }}
                        </x-nav-link>
                    </div>
                  

                </div>

                <!-- Settings Dropdown with Cart -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <!-- Elegant Cart Button -->
                    <a href="{{ route('cart') }}" class="elegant-cart mr-4">
                        <svg class="cart-icon" viewBox="0 0 24 24">
                            <path d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.5 6M7 13l4.5 6m0 0h6m-6 0V13"></path>
                        </svg>
                        Cart
                       
                    </a>

                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Hamburger with Mobile Cart -->
                <div class="-me-2 flex items-center sm:hidden">
                    <!-- Mobile Cart Button -->
                    <a href="{{ route('cart') }}" class="mobile-cart mr-2">
                        <svg class="cart-icon" viewBox="0 0 24 24">
                            <path d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.5 6M7 13l4.5 6m0 0h6m-6 0V13"></path>
                        </svg>
                       
                    </a>

                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('product')" :active="request()->routeIs('product')">
                    {{ __('Product') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('about')" :active="request()->routeIs('about')">
                    {{ __('About') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('contactus')" :active="request()->routeIs('contactus')">
                    {{ __('Contact Us') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('cart')" :active="request()->routeIs('cart')">
                    {{ __('cart') }}
                </x-responsive-nav-link>

                <!-- Mobile Cart Link -->
                <a href="{{ route('cart') }}" class="mobile-cart-link">
                    <svg class="cart-icon" viewBox="0 0 24 24">
                        <path d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.5 6M7 13l4.5 6m0 0h6m-6 0V13"></path>
                    </svg>
                    <span class="cart-text">{{ __('Cart') }}</span>
                   
                </a>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</body>
</html>