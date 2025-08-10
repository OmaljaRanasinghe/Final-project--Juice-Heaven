<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */
                @import url('https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css');
                
                .gradient-bg {
                    background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
                }
                
                .fruit-gradient {
                    background: linear-gradient(135deg, #ffeaa7 0%, #fab1a0 100%);
                }
                
                .green-gradient {
                    background: linear-gradient(135deg, #a8e6cf 0%, #81ecec 100%);
                }
                
                .orange-gradient {
                    background: linear-gradient(135deg, #fdcb6e 0%, #f39c12 100%);
                }
                
                .juice-shadow {
                    box-shadow: 0 20px 40px rgba(255,165,0,0.1);
                }
                
                .hover-lift {
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                }
                
                .hover-lift:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 25px 50px rgba(255,165,0,0.15);
                }
                
                .animate-float {
                    animation: float 6s ease-in-out infinite;
                }
                
                @keyframes float {
                    0%, 100% { transform: translateY(0px); }
                    50% { transform: translateY(-20px); }
                }
                
                .animate-pulse-slow {
                    animation: pulse 4s ease-in-out infinite;
                }
            </style>
        @endif
    </head>

    <body class="bg-gradient-to-br from-orange-50 to-yellow-50 text-gray-800 flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
       <header class="w-full lg:max-w-4xl max-w-[380px] text-sm mb-6 not-has-[nav]:hidden">
            @if (Route::has('login'))
                <nav class="flex items-center justify-between gap-2">
                    <!-- Logo Section -->
                    <div class="flex items-center space-x-3">
                        <img src="{{ asset('logo/logo.png') }}" alt="Fresh Juice Paradise Logo" class="h-14 w-15 object-contain">
                        <span class="text-lg font-bold text-gray-600">Fresh Juice Paradise</span>
                    </div>

                    <!-- Navigation Links -->
                    <div class="flex items-center gap-4">
                        @auth
                            <a
                                href="{{ url('/dashboard') }}"
                                class="inline-block px-5 py-1.5 text-orange-600 border border-orange-200 hover:border-orange-300 hover:bg-orange-50 rounded-sm text-sm leading-normal transition-all duration-300"
                            >
                                Dashboard
                            </a>
                        @else
                            <a
                                href="{{ route('login') }}"
                                class="inline-block px-5 py-1.5 text-gray-700 border border-transparent hover:border-orange-200 hover:bg-orange-50 rounded-sm text-sm leading-normal transition-all duration-300"
                            >
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a
                                    href="{{ route('register') }}"
                                    class="inline-block px-5 py-1.5 text-orange-600 border border-orange-200 hover:border-orange-300 hover:bg-orange-50 rounded-sm text-sm leading-normal transition-all duration-300">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </div>
                </nav>
            @endif
        </header>

        <main class="flex-1">
            <section class="max-w-6xl mx-auto px-6 lg:px-8 py-12 lg:py-20">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <!-- Hero Content -->
                    <div class="space-y-8">
                        <div class="space-y-4">
                            <h1 class="text-4xl lg:text-6xl font-bold leading-tight">
                                <span class="bg-gradient-to-r from-orange-400 to-pink-400 bg-clip-text text-transparent">Fresh</span>
                                <span class="text-gray-800"> & </span>
                                <span class="bg-gradient-to-r from-green-400 to-teal-400 bg-clip-text text-transparent">Healthy</span>
                                <br>
                                <span class="text-gray-800">Juices Daily</span>
                            </h1>
                            <p class="text-xl text-gray-600 leading-relaxed">
                                Experience the perfect blend of taste and nutrition with our premium fresh juice collection. Made from the finest organic fruits and vegetables.
                            </p>
                        </div>
                        
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="{{ route('register') }}" 
                               class="px-8 py-4 bg-gradient-to-r from-orange-400 to-pink-400 text-white rounded-full font-semibold hover:from-orange-500 hover:to-pink-500 transition-all duration-300 shadow-lg hover:shadow-xl hover-lift text-center">
                                Order Now
                            </a>
                            <a href="#menu" 
                               class="px-8 py-4 border-2 border-orange-400 text-orange-500 rounded-full font-semibold hover:bg-orange-400 hover:text-white transition-all duration-300 text-center">
                                View Menu
                            </a>
                        </div>
                        
                        <!-- Stats -->
                        <div class="grid grid-cols-3 gap-6 pt-8">
                            <div class="text-center">
                                <div class="text-3xl font-bold text-orange-500">500+</div>
                                <div class="text-sm text-gray-600">Happy Customers</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-green-500">100%</div>
                                <div class="text-sm text-gray-600">Organic Fruits</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-pink-500">24/7</div>
                                <div class="text-sm text-gray-600">Fresh Delivery</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Hero Image -->
                    <div class="relative">
                        <div class="animate-float">
                            <div class="relative w-full max-w-md mx-auto">
                                <!-- Main Juice Glass -->
                                <div class="juice-shadow rounded-3xl overflow-hidden bg-white p-8">
                                    <div class="text-center space-y-4">
                                        <div class="text-8xl">🥤</div>
                                        <h3 class="text-2xl font-bold text-gray-800">Tropical Paradise</h3>
                                        <p class="text-gray-600">Mango, Pineapple & Passion Fruit</p>
                                        <div class="text-orange-500 font-bold text-xl">$8.99</div>
                                    </div>
                                </div>
                                
                                <!-- Floating Elements -->
                                <div class="absolute -top-4 -left-4 w-16 h-16 bg-gradient-to-r from-orange-300 to-pink-300 rounded-full flex items-center justify-center text-2xl animate-pulse-slow">
                                    🍊
                                </div>
                                <div class="absolute -bottom-4 -right-4 w-16 h-16 bg-gradient-to-r from-green-300 to-teal-300 rounded-full flex items-center justify-center text-2xl animate-pulse-slow">
                                    🥝
                                </div>
                                <div class="absolute top-1/2 -right-8 w-12 h-12 bg-gradient-to-r from-pink-300 to-purple-300 rounded-full flex items-center justify-center text-xl animate-pulse-slow">
                                    🫐
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Features Section -->
            <section id="features" class="py-16 bg-white/70">
                <div class="max-w-6xl mx-auto px-6 lg:px-8">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">
                            Why Choose FreshFlow?
                        </h2>
                        <p class="text-xl text-gray-600">
                            We're committed to delivering the freshest, healthiest juices to fuel your day
                        </p>
                    </div>
                    
                    <div class="grid md:grid-cols-3 gap-8">
                        <!-- Feature 1 -->
                        <div class="text-center p-6 bg-white rounded-2xl shadow-lg hover-lift">
                            <div class="w-16 h-16 bg-gradient-to-r from-green-300 to-teal-300 rounded-full flex items-center justify-center text-3xl mx-auto mb-4">
                                🌱
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">100% Organic</h3>
                            <p class="text-gray-600">
                                Sourced from certified organic farms, ensuring the purest and most nutritious ingredients in every sip.
                            </p>
                        </div>
                        
                        <!-- Feature 2 -->
                        <div class="text-center p-6 bg-white rounded-2xl shadow-lg hover-lift">
                            <div class="w-16 h-16 bg-gradient-to-r from-orange-300 to-pink-300 rounded-full flex items-center justify-center text-3xl mx-auto mb-4">
                                ⚡
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Cold Pressed</h3>
                            <p class="text-gray-600">
                                Our advanced cold-press technology preserves maximum nutrients and delivers exceptional taste.
                            </p>
                        </div>
                        
                        <!-- Feature 3 -->
                        <div class="text-center p-6 bg-white rounded-2xl shadow-lg hover-lift">
                            <div class="w-16 h-16 bg-gradient-to-r from-purple-300 to-pink-300 rounded-full flex items-center justify-center text-3xl mx-auto mb-4">
                                🚚
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Fast Delivery</h3>
                            <p class="text-gray-600">
                                Quick and reliable delivery service to get your fresh juices to you within hours of pressing.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Popular Juices Section -->
            <section id="menu" class="py-16 bg-gradient-to-br from-yellow-50 to-orange-50">
                <div class="max-w-6xl mx-auto px-6 lg:px-8">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">
                            Popular Juices
                        </h2>
                        <p class="text-xl text-gray-600">
                            Discover our customers' favorite fresh juice combinations
                        </p>
                    </div>
                    
                    <div class="grid md:grid-cols-3 gap-8">
                        <!-- Juice 1 -->
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover-lift">
                            <div class="h-48 green-gradient flex items-center justify-center text-6xl">
                                🥗
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Green Goddess</h3>
                                <p class="text-gray-600 mb-4">
                                    Spinach, Kale, Apple, Lemon & Ginger
                                </p>
                                <div class="flex justify-between items-center">
                                    <span class="text-2xl font-bold text-green-500">$9.99</span>
                                    <button class="px-4 py-2 bg-green-400 text-white rounded-full hover:bg-green-500 transition-colors">
                                        Order
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Juice 2 -->
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover-lift">
                            <div class="h-48 orange-gradient flex items-center justify-center text-6xl">
                                🌅
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Sunrise Blend</h3>
                                <p class="text-gray-600 mb-4">
                                    Orange, Carrot, Turmeric & Ginger
                                </p>
                                <div class="flex justify-between items-center">
                                    <span class="text-2xl font-bold text-orange-500">$8.99</span>
                                    <button class="px-4 py-2 bg-orange-400 text-white rounded-full hover:bg-orange-500 transition-colors">
                                        Order
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Juice 3 -->
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover-lift">
                            <div class="h-48 fruit-gradient flex items-center justify-center text-6xl">
                                🍓
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Berry Bliss</h3>
                                <p class="text-gray-600 mb-4">
                                    Strawberry, Blueberry, Raspberry & Mint
                                </p>
                                <div class="flex justify-between items-center">
                                    <span class="text-2xl font-bold text-pink-500">$10.99</span>
                                    <button class="px-4 py-2 bg-pink-400 text-white rounded-full hover:bg-pink-500 transition-colors">
                                        Order
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CTA Section -->
            <section class="py-16 bg-gradient-to-r from-orange-400 to-pink-400">
                <div class="max-w-4xl mx-auto px-6 lg:px-8 text-center">
                    <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">
                        Ready to Start Your Healthy Journey?
                    </h2>
                    <p class="text-xl text-orange-100 mb-8">
                        Join thousands of happy customers who have made the switch to fresh, organic juices
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('register') }}" 
                           class="px-8 py-4 bg-white text-orange-500 rounded-full font-semibold hover:bg-gray-100 transition-all duration-300 shadow-lg hover:shadow-xl">
                            Start Ordering Today
                        </a>
                        <a href="#" 
                           class="px-8 py-4 border-2 border-white text-white rounded-full font-semibold hover:bg-white hover:text-orange-500 transition-all duration-300">
                            Download App
                        </a>
                    </div>
                </div>
            </section>
        </main>

        <!-- Footer -->
        <footer class="bg-gray-50 text-gray-700 py-12">
            <div class="max-w-6xl mx-auto px-6 lg:px-8">
                <div class="grid md:grid-cols-4 gap-8">
                    <!-- Logo & Description -->
                    <div class="md:col-span-2">
                        <div class="flex items-center space-x-2 mb-4">
                            <div class="w-8 h-8 bg-gradient-to-r from-orange-400 to-pink-400 rounded-full flex items-center justify-center">
                                <span class="text-white font-bold">🍊</span>
                            </div>
                            <span class="text-xl font-bold text-gray-800">FreshFlow</span>
                        </div>
                        <p class="text-gray-600 mb-4">
                            Delivering fresh, organic, and nutritious juices to fuel your healthy lifestyle. Made with love and the finest ingredients.
                        </p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-500 hover:text-orange-500 transition-colors">📱</a>
                            <a href="#" class="text-gray-500 hover:text-orange-500 transition-colors">📘</a>
                            <a href="#" class="text-gray-500 hover:text-orange-500 transition-colors">📷</a>
                            <a href="#" class="text-gray-500 hover:text-orange-500 transition-colors">🐦</a>
                        </div>
                    </div>
                    
                    <!-- Quick Links -->
                    <div>
                        <h3 class="text-lg font-semibold mb-4 text-gray-800">Quick Links</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-600 hover:text-orange-500 transition-colors">Menu</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-orange-500 transition-colors">About Us</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-orange-500 transition-colors">Nutrition</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-orange-500 transition-colors">Contact</a></li>
                        </ul>
                    </div>
                    
                    <!-- Contact Info -->
                    <div>
                        <h3 class="text-lg font-semibold mb-4 text-gray-800">Contact</h3>
                        <ul class="space-y-2 text-gray-600">
                            <li>📍 123 Fresh Street, Health City</li>
                            <li>📞 (555) 123-JUICE</li>
                            <li>✉️ hello@freshflow.com</li>
                            <li>🕒 Open 6AM - 10PM Daily</li>
                        </ul>
                    </div>
                </div>
                
                <div class="border-t border-gray-200 mt-8 pt-8 text-center text-gray-500">
                    <p>&copy; 2025 FreshFlow. All rights reserved. Made with ❤️ for your health.</p>
                </div>
            </div>
        </footer>
        
        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>