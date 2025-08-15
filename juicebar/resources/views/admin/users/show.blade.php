<x-admin-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl text-gray-800 leading-tight">
                    User Details
                </h2>
                <p class="text-gray-600 mt-1">👥 {{ $user->name }}</p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('admin.users.edit', $user) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors duration-200 flex items-center space-x-2 shadow-lg">
                    <span>✏️</span>
                    <span>Edit</span>
                </a>
                <a href="{{ route('admin.users.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors duration-200 flex items-center space-x-2 shadow-lg">
                    <span>←</span>
                    <span>Back</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- User Information -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6 mb-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">User Information</h3>
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label class="text-sm font-medium text-gray-500">Full Name</label>
                                <div class="text-lg font-semibold text-gray-900">{{ $user->name }}</div>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-500">Email</label>
                                <div class="text-gray-900">{{ $user->email }}</div>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-500">Role</label>
                                <div>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $user->role === 'admin' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                        {{ $user->role === 'admin' ? '👑 Admin' : '👤 Customer' }}
                                    </span>
                                </div>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-500">Reward Points</label>
                                <div class="text-lg font-semibold text-yellow-600">{{ number_format($user->points) }} pts</div>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-500">Member Level</label>
                                <div>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                        @if($user->points_level === 'Gold') bg-yellow-100 text-yellow-800
                                        @elseif($user->points_level === 'Silver') bg-gray-100 text-gray-800
                                        @elseif($user->points_level === 'Bronze') bg-orange-100 text-orange-800
                                        @else bg-blue-100 text-blue-800
                                        @endif">
                                        @if($user->points_level === 'Gold')
                                            👑 Gold Member
                                        @elseif($user->points_level === 'Silver')
                                            🥈 Silver Member
                                        @elseif($user->points_level === 'Bronze')
                                            🥉 Bronze Member
                                        @else
                                            🌟 Starter Member
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-500">Joined</label>
                                <div class="text-gray-900">{{ $user->created_at->format('M d, Y') }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Orders -->
                    @if($user->orders && $user->orders->count() > 0)
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Recent Orders</h3>
                        <div class="space-y-4">
                            @foreach($user->orders->take(5) as $order)
                            <div class="flex justify-between items-center p-4 bg-gray-50 rounded-lg">
                                <div>
                                    <div class="font-semibold text-gray-800">{{ $order->order_number }}</div>
                                    <div class="text-sm text-gray-600">{{ $order->created_at->format('M d, Y g:i A') }}</div>
                                </div>
                                <div class="text-right">
                                    <div class="font-semibold text-gray-800">${{ number_format($order->total, 2) }}</div>
                                    <div class="text-sm">
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium
                                            @if($order->status === 'confirmed') bg-green-100 text-green-800
                                            @elseif($order->status === 'pending') bg-yellow-100 text-yellow-800
                                            @else bg-gray-100 text-gray-800
                                            @endif">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Quick Actions -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Quick Actions</h3>
                        <div class="space-y-3">
                            <a href="{{ route('admin.users.edit', $user) }}" class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-semibold flex items-center justify-center">
                                ✏️ Edit User
                            </a>
                            @if($user->id !== auth()->id())
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user? This action cannot be undone.')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-semibold">
                                    🗑️ Delete User
                                </button>
                            </form>
                            @endif
                        </div>
                    </div>

                    <!-- Statistics -->
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6 mt-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Statistics</h3>
                        <div class="space-y-4">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Total Orders:</span>
                                <span class="font-semibold">{{ $user->orders ? $user->orders->count() : 0 }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Total Spent:</span>
                                <span class="font-semibold">${{ $user->orders ? number_format($user->orders->sum('total'), 2) : '0.00' }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Cart Items:</span>
                                <span class="font-semibold">{{ $user->cartItems ? $user->cartItems->count() : 0 }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Favorites:</span>
                                <span class="font-semibold">{{ $user->favorites ? $user->favorites->count() : 0 }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>