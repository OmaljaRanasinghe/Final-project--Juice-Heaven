<x-employee-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl text-gray-800 leading-tight">
                    Employee Dashboard
                </h2>
                <p class="text-gray-600 mt-1">👥 Welcome, {{ Auth::user()->name }}!</p>
            </div>
            <div class="bg-blue-100 px-4 py-2 rounded-lg">
                <span class="text-blue-800 font-semibold">Employee</span>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Order Status Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <!-- Today's Orders -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Today's Orders</p>
                            <p class="text-3xl font-bold text-gray-900 mt-1">{{ $todaysOrders }}</p>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-lg">
                            <span class="text-2xl">📅</span>
                        </div>
                    </div>
                </div>

                <!-- Pending Orders -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Pending</p>
                            <p class="text-3xl font-bold text-red-600 mt-1">{{ $pendingOrders }}</p>
                        </div>
                        <div class="bg-red-100 p-3 rounded-lg">
                            <span class="text-2xl">⏳</span>
                        </div>
                    </div>
                </div>

                <!-- Preparing Orders -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Preparing</p>
                            <p class="text-3xl font-bold text-yellow-600 mt-1">{{ $preparingOrders }}</p>
                        </div>
                        <div class="bg-yellow-100 p-3 rounded-lg">
                            <span class="text-2xl">🔄</span>
                        </div>
                    </div>
                </div>

                <!-- Ready Orders -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Ready</p>
                            <p class="text-3xl font-bold text-green-600 mt-1">{{ $readyOrders }}</p>
                        </div>
                        <div class="bg-green-100 p-3 rounded-lg">
                            <span class="text-2xl">✅</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">⚡ Quick Actions</h3>
                    <div class="space-y-3">
                        <a href="{{ route('employee.orders.index') }}" class="block w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-3 rounded-lg font-semibold text-center transition-colors">
                            📦 View All Orders
                        </a>
                        <a href="{{ route('employee.orders.index') }}?status=pending" class="block w-full bg-red-600 hover:bg-red-700 text-white px-4 py-3 rounded-lg font-semibold text-center transition-colors">
                            ⏳ Pending Orders
                        </a>
                        <a href="{{ route('employee.orders.index') }}?status=preparing" class="block w-full bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-3 rounded-lg font-semibold text-center transition-colors">
                            🔄 Orders in Progress
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">📋 Employee Tasks</h3>
                    <div class="text-gray-600 space-y-2">
                        <p>• View order details and customizations</p>
                        <p>• Update order preparation status</p>
                        <p>• Mark orders as ready for pickup</p>
                        <p>• Access order history and information</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-employee-layout>