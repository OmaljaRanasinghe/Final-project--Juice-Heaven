<x-admin-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <img src="{{ asset('logo/logo.png') }}" alt="JuiceBar Logo" class="h-12 w-12 mr-4 rounded-lg shadow-md">
                <div>
                    <h2 class="font-bold text-3xl text-gray-800 leading-tight">
                        {{ __('Admin Dashboard') }}
                    </h2>
                    <p class="text-gray-600 mt-1">🛠️ Manage your juice bar operations</p>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <span class="bg-red-600 text-white px-4 py-2 rounded-lg font-semibold">
                    👑 Admin Panel
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Users -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                    <div class="flex items-center">
                        <div class="text-4xl mr-4">👥</div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Total Customers</h3>
                            <div class="text-3xl font-bold text-blue-600">{{ number_format($totalUsers) }}</div>
                        </div>
                    </div>
                </div>

                <!-- Total Orders -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                    <div class="flex items-center">
                        <div class="text-4xl mr-4">📦</div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Total Orders</h3>
                            <div class="text-3xl font-bold text-green-600">{{ number_format($totalOrders) }}</div>
                        </div>
                    </div>
                </div>

                <!-- Total Revenue -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                    <div class="flex items-center">
                        <div class="text-4xl mr-4">💰</div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Total Revenue</h3>
                            <div class="text-3xl font-bold text-purple-600">${{ number_format($totalRevenue, 2) }}</div>
                        </div>
                    </div>
                </div>

                <!-- Available Fruits -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                    <div class="flex items-center">
                        <div class="text-4xl mr-4">🍊</div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Available Fruits</h3>
                            <div class="text-3xl font-bold text-orange-600">{{ $availableFruits }}/{{ $totalFruits }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fruit Analytics -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Custom Juices Stats -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                        <span class="text-3xl mr-3">🥤</span>
                        Custom Juice Analytics
                    </h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-center p-4 bg-blue-50 rounded-lg">
                            <div class="text-2xl font-bold text-blue-600">{{ number_format($totalCustomJuices) }}</div>
                            <div class="text-sm text-blue-800">Total Custom Juices</div>
                        </div>
                        <div class="text-center p-4 bg-green-50 rounded-lg">
                            <div class="text-2xl font-bold text-green-600">{{ $totalFruits }}</div>
                            <div class="text-sm text-green-800">Fruits in System</div>
                        </div>
                    </div>
                </div>

                <!-- Popular Fruits -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                        <span class="text-3xl mr-3">🏆</span>
                        Most Popular Fruits
                    </h3>
                    @if(count($popularFruits) > 0)
                        <div class="space-y-3">
                            @foreach($popularFruits as $index => $popularFruit)
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <div class="flex items-center">
                                        <div class="text-2xl mr-3">{{ $popularFruit['fruit']->emoji }}</div>
                                        <div>
                                            <div class="font-semibold text-gray-800">{{ $popularFruit['fruit']->name }}</div>
                                            <div class="text-xs text-gray-600">#{{ $index + 1 }} Most Used</div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="font-bold text-lg text-green-600">{{ $popularFruit['usage_count'] }}</div>
                                        <div class="text-xs text-gray-600">servings</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <div class="text-4xl mb-2">🍊</div>
                            <p class="text-gray-600">No custom juices created yet</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Recent Orders -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                    <span class="text-3xl mr-3">📋</span>
                    Recent Orders
                </h3>
                
                @if($recentOrders->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order #</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($recentOrders as $order)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $order->order_number }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $order->user->name ?? $order->billing_name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $order->created_at->format('M d, Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-semibold">
                                    ${{ number_format($order->total, 2) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                        @if($order->status === 'confirmed') bg-green-100 text-green-800
                                        @elseif($order->status === 'pending') bg-yellow-100 text-yellow-800
                                        @elseif($order->status === 'cancelled') bg-red-100 text-red-800
                                        @else bg-gray-100 text-gray-800
                                        @endif">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center py-12">
                    <div class="text-6xl mb-4">📊</div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">No Orders Yet</h3>
                    <p class="text-gray-600">Orders will appear here once customers start placing them.</p>
                </div>
                @endif
            </div>

            <!-- Quick Actions -->
            <div class="mt-8 bg-white rounded-xl shadow-lg border border-gray-100 p-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                    <span class="text-3xl mr-3">⚡</span>
                    Quick Actions
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <a href="{{ route('admin.users.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white p-4 rounded-lg font-semibold transition-colors duration-200 flex flex-col items-center">
                        <span class="text-2xl mb-2">👥</span>
                        <span>Manage Users</span>
                    </a>
                    
                    <a href="{{ route('admin.products.index') }}" class="bg-green-600 hover:bg-green-700 text-white p-4 rounded-lg font-semibold transition-colors duration-200 flex flex-col items-center">
                        <span class="text-2xl mb-2">🧃</span>
                        <span>Manage Products</span>
                    </a>
                    
                    <a href="{{ route('admin.orders.index') }}" class="bg-purple-600 hover:bg-purple-700 text-white p-4 rounded-lg font-semibold transition-colors duration-200 flex flex-col items-center">
                        <span class="text-2xl mb-2">📦</span>
                        <span>View All Orders</span>
                    </a>
                    
                    <a href="{{ route('admin.fruits.index') }}" class="bg-orange-600 hover:bg-orange-700 text-white p-4 rounded-lg font-semibold transition-colors duration-200 flex flex-col items-center">
                        <span class="text-2xl mb-2">🍊</span>
                        <span>Manage Fruits</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>