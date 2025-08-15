<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl text-gray-800 leading-tight">
                    {{ __('Profile Settings') }}
                </h2>
                <p class="text-gray-600 mt-1">Manage your account settings and preferences</p>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('dashboard') }}" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors duration-200 flex items-center space-x-2 shadow-lg">
                    <span>🏠</span>
                    <span>Dashboard</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Profile Overview Card -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 mb-8 overflow-hidden">
                <div class="bg-gradient-to-r from-green-500 to-emerald-600 p-8">
                    <div class="flex items-center space-x-6">
                        <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center text-4xl shadow-lg">
                            <span>👤</span>
                        </div>
                        <div class="text-white">
                            <h3 class="text-3xl font-bold mb-2">{{ Auth::user()->name }}</h3>
                            <p class="text-green-100 text-lg">{{ Auth::user()->email }}</p>
                            <div class="flex items-center space-x-4 mt-4">
                                <div class="flex items-center space-x-2">
                                    <span class="text-2xl">🎯</span>
                                    <span class="text-green-100">Health Enthusiast</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="text-2xl">📅</span>
                                    <span class="text-green-100">Joined {{ Auth::user()->created_at->format('M Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Stats Section -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-8">
                    <div class="text-center bg-gray-50 rounded-lg p-6">
                        <div class="text-3xl mb-2">🛒</div>
                        <div class="text-2xl font-bold text-gray-800">15</div>
                        <div class="text-gray-600">Orders Placed</div>
                    </div>
                    <div class="text-center bg-gray-50 rounded-lg p-6">
                        <div class="text-3xl mb-2">❤️</div>
                        <div class="text-2xl font-bold text-gray-800">8</div>
                        <div class="text-gray-600">Favorite Juices</div>
                    </div>
                    <div class="text-center bg-gray-50 rounded-lg p-6">
                        <div class="text-3xl mb-2">💰</div>
                        <div class="text-2xl font-bold text-gray-800">$245</div>
                        <div class="text-gray-600">Total Spent</div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Profile Information -->
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-8">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                                <span class="text-2xl">📝</span>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-800">Profile Information</h3>
                                <p class="text-gray-600">Update your account's profile information and email address</p>
                            </div>
                        </div>
                        @include('profile.partials.update-profile-information-form')
                    </div>

                    <!-- Password Update -->
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-8">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                                <span class="text-2xl">🔒</span>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-800">Security Settings</h3>
                                <p class="text-gray-600">Update your password to keep your account secure</p>
                            </div>
                        </div>
                        @include('profile.partials.update-password-form')
                    </div>

                    <!-- Delete Account -->
                    <div class="bg-white rounded-xl shadow-lg border border-red-200 p-8">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mr-4">
                                <span class="text-2xl">⚠️</span>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-red-800">Danger Zone</h3>
                                <p class="text-red-600">Permanently delete your account and all associated data</p>
                            </div>
                        </div>
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-8">
                    <!-- Quick Actions -->
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">Quick Actions</h3>
                        <div class="space-y-3">
                            <a href="{{ route('product') }}" class="w-full bg-green-600 hover:bg-green-700 text-white p-3 rounded-lg font-medium transition-colors duration-200 flex items-center space-x-3">
                                <span>🛒</span>
                                <span>Browse Juices</span>
                            </a>
                            <a href="{{ route('cart') }}" class="w-full bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-lg font-medium transition-colors duration-200 flex items-center space-x-3">
                                <span>🛍️</span>
                                <span>View Cart</span>
                            </a>
                            <a href="{{ route('dashboard') }}" class="w-full bg-gray-600 hover:bg-gray-700 text-white p-3 rounded-lg font-medium transition-colors duration-200 flex items-center space-x-3">
                                <span>📊</span>
                                <span>Dashboard</span>
                            </a>
                        </div>
                    </div>

                    <!-- Account Stats -->
                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl border border-green-200 p-6">
                        <h3 class="text-lg font-bold text-green-800 mb-4">🌟 Your Juice Journey</h3>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center">
                                <span class="text-green-700">This Month</span>
                                <span class="font-bold text-green-800">5 Orders</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-green-700">Favorite</span>
                                <span class="font-bold text-green-800">Green Goddess</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-green-700">Health Score</span>
                                <span class="font-bold text-green-800">95/100</span>
                            </div>
                        </div>
                        <div class="text-4xl text-center my-4">🏆</div>
                        <p class="text-sm text-green-700 text-center">
                            You're on track to reach your monthly health goals!
                        </p>
                    </div>

                    <!-- Recent Activity -->
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">Recent Activity</h3>
                        <div class="space-y-3">
                            <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
                                <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-800">Ordered Green Goddess</p>
                                    <p class="text-xs text-gray-500">2 hours ago</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
                                <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-800">Profile updated</p>
                                    <p class="text-xs text-gray-500">1 day ago</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
                                <div class="w-2 h-2 bg-orange-500 rounded-full"></div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-800">Left review for Berry Bliss</p>
                                    <p class="text-xs text-gray-500">3 days ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
