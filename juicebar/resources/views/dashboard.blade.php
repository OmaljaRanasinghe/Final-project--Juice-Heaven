<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl text-gray-800 leading-tight">
                    Welcome back, {{ Auth::user()->name }}! 🌱
                </h2>
                <p class="text-gray-600 mt-1">Ready for your daily dose of fresh, healthy goodness?</p>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('favorites') }}" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors duration-200 flex items-center space-x-2 shadow-lg">
                    <span>❤️</span>
                    <span>My Favorites</span>
                </a>
                <a href="{{ route('product') }}" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors duration-200 flex items-center space-x-2 shadow-lg">
                    <span>🛒</span>
                    <span>Order Fresh Juices</span>
                </a>
            </div>
        </div>
    </x-slot>

    <!-- Hero Section -->
    <div class="bg-gradient-to-br from-green-400 via-emerald-500 to-teal-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h1 class="text-4xl lg:text-5xl font-bold mb-6">
                        Your Daily Wellness Journey Starts Here! 🚀
                    </h1>
                    <p class="text-xl text-green-100 mb-8 leading-relaxed">
                        Discover our fresh selection of cold-pressed juices, specially crafted to fuel your healthy lifestyle with nature's finest ingredients.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <!-- Primary Custom Juice Creation Button -->
                        <a href="{{ route('customize') }}" class="bg-white text-green-600 px-8 py-4 rounded-lg font-bold text-lg hover:bg-green-50 transition-colors duration-300 text-center shadow-xl hover:shadow-2xl">
                            🎨✨ Create Your Dream Juice
                        </a>
                        <a href="{{ route('about') }}" class="border-2 border-white text-white px-8 py-4 rounded-lg font-bold text-lg hover:bg-white hover:text-green-600 transition-colors duration-300 text-center">
                            📖 Our Story
                        </a>
                    </div>
                </div>
                <div class="text-center">
                    <div class="relative inline-block">
                        <div class="text-8xl animate-pulse">🥤</div>
                        <div class="absolute -top-4 -right-4 text-4xl animate-bounce">✨</div>
                        <div class="absolute -bottom-4 -left-4 text-3xl animate-bounce" style="animation-delay: 0.5s;">🌿</div>
                    </div>
                    <h3 class="text-2xl font-bold mt-6 mb-2">Today's Special</h3>
                    <p class="text-green-100 text-lg">Green Goddess - Packed with superfoods!</p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Personal Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16 max-w-4xl mx-auto">
                <!-- This Week's Orders -->
                <div class="bg-white rounded-xl p-8 shadow-lg border border-gray-100 hover:shadow-xl transition-shadow duration-300 text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-3xl">📈</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">This Week</h3>
                    <p class="text-3xl font-bold text-blue-600 mb-2">3 Orders</p>
                    <p class="text-sm text-gray-600">You're on track with your goals!</p>
                </div>

                <!-- Favorite Juice -->
                <div class="bg-white rounded-xl p-8 shadow-lg border border-gray-100 hover:shadow-xl transition-shadow duration-300 text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-orange-400 to-yellow-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-3xl">🏆</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Your Favorite</h3>
                    <p class="text-xl font-bold text-orange-600 mb-2">Green Goddess</p>
                    <p class="text-sm text-gray-600">Ordered 12 times this month!</p>
                </div>
            </div>

            <div class="space-y-12">
                    <!-- Recommended For You -->
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-8">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-bold text-gray-800 flex items-center">
                                <span class="mr-3">🌟</span>
                                Recommended For You
                            </h3>
                            <a href="{{ route('product') }}" class="text-green-600 hover:text-green-700 font-medium">View All</a>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Recommendation 1 -->
                            <div class="border-2 border-green-100 rounded-xl p-6 hover:border-green-300 hover:shadow-lg transition-all duration-300 cursor-pointer">
                                <div class="flex items-center space-x-4 mb-4">
                                    <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center text-2xl shadow-lg">
                                        🥗
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-lg text-gray-800">Green Goddess</h4>
                                        <p class="text-green-600 font-semibold">$9.99</p>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-600 mb-4">Your go-to favorite! Rich in vitamins and minerals.</p>
                                <button class="w-full bg-green-600 hover:bg-green-700 text-white py-3 rounded-lg font-semibold transition-colors duration-200">
                                    🛒 Order Again
                                </button>
                            </div>

                            <!-- Recommendation 2 -->
                            <div class="border-2 border-orange-100 rounded-xl p-6 hover:border-orange-300 hover:shadow-lg transition-all duration-300 cursor-pointer">
                                <div class="flex items-center space-x-4 mb-4">
                                    <div class="w-16 h-16 bg-gradient-to-br from-orange-400 to-yellow-500 rounded-full flex items-center justify-center text-2xl shadow-lg">
                                        🥭
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-lg text-gray-800">Tropical Paradise</h4>
                                        <p class="text-orange-600 font-semibold">$8.99</p>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-600 mb-4">New! Perfect for your morning energy boost.</p>
                                <button class="w-full bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-lg font-semibold transition-colors duration-200">
                                    ✨ Try Something New
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

            <!-- Quick Actions Section -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-8 mb-12">
                <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center justify-center">
                    <span class="mr-3">⚡</span>
                    Quick Actions
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
                    <a href="{{ route('product') }}" class="bg-green-600 hover:bg-green-700 text-white p-4 rounded-lg font-medium transition-colors duration-200 flex flex-col items-center text-center">
                        <span class="text-2xl mb-2">🛒</span>
                        <span>Order Fresh Juices</span>
                    </a>
                    <a href="{{ route('favorites') }}" class="bg-red-600 hover:bg-red-700 text-white p-4 rounded-lg font-medium transition-colors duration-200 flex flex-col items-center text-center">
                        <span class="text-2xl mb-2">❤️</span>
                        <span>My Favorites</span>
                    </a>
                    <a href="{{ route('customize') }}" class="bg-purple-600 hover:bg-purple-700 text-white p-4 rounded-lg font-medium transition-colors duration-200 flex flex-col items-center text-center">
                        <span class="text-2xl mb-2">🎨</span>
                        <span>Create Custom Juice</span>
                    </a>
                    <a href="{{ route('cart') }}" class="bg-blue-600 hover:bg-blue-700 text-white p-4 rounded-lg font-medium transition-colors duration-200 flex flex-col items-center text-center">
                        <span class="text-2xl mb-2">🛍️</span>
                        <span>View My Cart</span>
                    </a>
                    <a href="{{ route('profile.edit') }}" class="bg-gray-600 hover:bg-gray-700 text-white p-4 rounded-lg font-medium transition-colors duration-200 flex flex-col items-center text-center">
                        <span class="text-2xl mb-2">⚙️</span>
                        <span>Account Settings</span>
                    </a>
                </div>
            </div>

            <!-- Horizontal Three-Section Layout -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Daily Health Tip -->
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl border border-green-200 p-6">
                    <h3 class="text-lg font-bold text-green-800 mb-4 flex items-center justify-center">
                        <span class="mr-2">💡</span>
                        Daily Health Tip
                    </h3>
                    <div class="text-4xl text-center mb-4">🌱</div>
                    <p class="text-sm text-green-700 mb-4 text-center">
                        Start your morning with a green juice to alkalize your body and boost energy naturally!
                    </p>
                    <button class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg font-medium transition-colors duration-200">
                        Learn More Tips
                    </button>
                </div>

                <!-- Just for You! -->
                <div class="bg-gradient-to-br from-yellow-50 to-orange-50 rounded-xl border border-orange-200 p-6">
                    <div class="text-center">
                        <div class="text-4xl mb-2">🎁</div>
                        <h3 class="text-lg font-bold text-orange-800 mb-2">Just for You!</h3>
                        <p class="text-sm text-orange-700 mb-4">
                            Get <span class="font-bold">FREE delivery</span> on your next order over $25!
                        </p>
                        <button class="w-full bg-orange-500 hover:bg-orange-600 text-white py-2 rounded-lg font-medium transition-colors duration-200">
                            🚀 Claim Offer
                        </button>
                    </div>
                </div>

                <!-- Loyalty Points -->
                <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl border border-purple-200 p-6">
                    <h3 class="text-lg font-bold text-purple-800 mb-4 flex items-center justify-center">
                        <span class="mr-2">💎</span>
                        Loyalty Points
                    </h3>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-purple-600 mb-2">1,250 pts</div>
                        <p class="text-sm text-purple-700 mb-4">You're 250 points away from a free juice! 🎉</p>
                        <div class="w-full bg-purple-200 rounded-full h-2 mb-4">
                            <div class="bg-gradient-to-r from-purple-500 to-pink-500 h-2 rounded-full" style="width: 83%"></div>
                        </div>
                        <button class="w-full bg-purple-600 hover:bg-purple-700 text-white py-2 rounded-lg font-medium transition-colors duration-200 text-sm">
                            View Rewards
                        </button>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>