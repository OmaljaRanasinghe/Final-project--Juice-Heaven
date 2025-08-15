<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juice Heaven - Fresh, Healthy, Delicious</title>
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
    <nav x-data="{ open: false }" class="bg-white border-b border-green-100 shadow-lg">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20 max-w-7xl mx-auto px-4">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-12 w-auto" />
                    </a>
                </div>

                <!-- Center Navigation Links -->
                <div class="hidden lg:flex items-center space-x-8">
                    <x-nav-link :href="route('product')" :active="request()->routeIs('product')" class="font-medium text-gray-700 hover:text-green-600 transition-colors duration-200">
                        {{ __('Products') }}
                    </x-nav-link>
                    <x-nav-link :href="route('customize')" :active="request()->routeIs('customize')" class="font-medium text-gray-700 hover:text-purple-600 transition-colors duration-200">
                        {{ __('Create Juice') }}
                    </x-nav-link>
                    <x-nav-link :href="route('rewards')" :active="request()->routeIs('rewards')" class="font-medium text-gray-700 hover:text-yellow-600 transition-colors duration-200">
                        {{ __('Rewards') }}
                    </x-nav-link>
                    <x-nav-link :href="route('about')" :active="request()->routeIs('about')" class="font-medium text-gray-700 hover:text-blue-600 transition-colors duration-200">
                        {{ __('About') }}
                    </x-nav-link>
                    <x-nav-link :href="route('contactus')" :active="request()->routeIs('contactus')" class="font-medium text-gray-700 hover:text-yellow-600 transition-colors duration-200">
                        {{ __('Contact') }}
                    </x-nav-link>
                </div>

                <!-- Right Action Items -->
                <div class="hidden lg:flex items-center space-x-4">
                    <!-- Favorites Heart Icon -->
                    <a href="{{ route('favorites') }}" class="p-2 text-gray-600 hover:text-red-600 transition-colors duration-200" title="Favorites">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    
                    <!-- Cart -->
                    <a href="{{ route('cart') }}" class="p-2 text-gray-600 hover:text-blue-600 transition-colors duration-200" title="Cart">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.5 6M7 13l4.5 6m0 0h6m-6 0V13"></path>
                        </svg>
                    </a>

                    <!-- User Menu -->
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="p-2 text-gray-600 hover:text-gray-800 transition-colors duration-200">
                                <div class="w-6 h-6 bg-gradient-to-br from-green-400 to-orange-500 rounded-full flex items-center justify-center text-white font-bold text-xs">
                                    {{ substr(Auth::user()->name, 0, 1) }}
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

                <!-- Mobile Menu Button -->
                <div class="lg:hidden flex items-center space-x-4">
                    <!-- Mobile Cart -->
                    <a href="{{ route('cart') }}" class="p-2 text-gray-600 hover:text-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.5 6M7 13l4.5 6m0 0h6m-6 0V13"></path>
                        </svg>
                    </a>
                    
                    <!-- Hamburger -->
                    <button @click="open = ! open" class="p-2 text-gray-600 hover:text-gray-800">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden lg:hidden bg-white border-t border-gray-200">
            <div class="px-4 pt-4 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="block px-3 py-2 text-base font-medium">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('product')" :active="request()->routeIs('product')" class="block px-3 py-2 text-base font-medium">
                    {{ __('Products') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('customize')" :active="request()->routeIs('customize')" class="block px-3 py-2 text-base font-medium">
                    {{ __('Create Juice') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('rewards')" :active="request()->routeIs('rewards')" class="block px-3 py-2 text-base font-medium">
                    {{ __('Rewards') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('favorites')" :active="request()->routeIs('favorites')" class="block px-3 py-2 text-base font-medium">
                    {{ __('Favorites') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('about')" :active="request()->routeIs('about')" class="block px-3 py-2 text-base font-medium">
                    {{ __('About') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('contactus')" :active="request()->routeIs('contactus')" class="block px-3 py-2 text-base font-medium">
                    {{ __('Contact') }}
                </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-4 border-t border-green-100 bg-gray-50 mx-4 rounded-xl mt-4">
                <div class="px-4 py-3">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-orange-500 rounded-full flex items-center justify-center text-white font-bold">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <div>
                            <div class="font-semibold text-gray-800">{{ Auth::user()->name }}</div>
                            <div class="text-sm text-gray-500">{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                </div>

                <div class="px-2 space-y-2">
                    <x-responsive-nav-link :href="route('profile.edit')" class="flex items-center space-x-3 px-4 py-3 rounded-lg bg-white hover:bg-gray-50 transition-all duration-300">
                        <span>⚙️</span>
                        <span class="font-medium">{{ __('Profile Settings') }}</span>
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="flex items-center space-x-3 px-4 py-3 rounded-lg bg-white hover:bg-red-50 text-red-600 hover:text-red-700 transition-all duration-300">
                            <span>🚪</span>
                            <span class="font-medium">{{ __('Log Out') }}</span>
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</body>
</html>