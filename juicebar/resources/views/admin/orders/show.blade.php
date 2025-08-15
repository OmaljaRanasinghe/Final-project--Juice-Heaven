<x-admin-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl text-gray-800 leading-tight">
                    Order Details
                </h2>
                <p class="text-gray-600 mt-1">📦 {{ $order->order_number }}</p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('admin.orders.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors duration-200 flex items-center space-x-2 shadow-lg">
                    <span>←</span>
                    <span>Back to Orders</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Order Information -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6 mb-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Order Information</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="text-sm font-medium text-gray-500">Order Number</label>
                                <div class="text-lg font-semibold text-gray-900">{{ $order->order_number }}</div>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-500">Order Date</label>
                                <div class="text-gray-900">{{ $order->created_at->format('M d, Y g:i A') }}</div>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-500">Payment Method</label>
                                <div class="text-gray-900">{{ ucfirst($order->payment_method) }}</div>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-500">Payment ID</label>
                                <div class="text-gray-900 text-sm">{{ $order->payment_intent_id }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Customer Information -->
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6 mb-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Customer Information</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="text-sm font-medium text-gray-500">Name</label>
                                <div class="text-gray-900">{{ $order->user->name ?? $order->billing_name }}</div>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-500">Email</label>
                                <div class="text-gray-900">{{ $order->user->email ?? $order->billing_email }}</div>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-500">Phone</label>
                                <div class="text-gray-900">{{ $order->billing_phone ?? 'N/A' }}</div>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-500">Address</label>
                                <div class="text-gray-900">
                                    {{ $order->billing_address }}<br>
                                    {{ $order->billing_city }}, {{ $order->billing_zip }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Items -->
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Order Items</h3>
                        <div class="space-y-4">
                            @foreach($order->orderItems as $item)
                            <div class="flex items-center justify-between border-b border-gray-200 pb-4">
                                <div class="flex items-center">
                                    @if($item->product)
                                        @if($item->product->image)
                                            <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="h-12 w-12 rounded-lg object-cover mr-4">
                                        @else
                                            <div class="h-12 w-12 bg-gray-200 rounded-lg flex items-center justify-center mr-4">
                                                <span class="text-2xl">🧃</span>
                                            </div>
                                        @endif
                                        <div>
                                            <div class="font-medium text-gray-900">{{ $item->product->name }}</div>
                                            <div class="text-sm text-gray-500">Quantity: {{ $item->quantity }}</div>
                                        </div>
                                    @elseif($item->customJuice)
                                        <div class="h-12 w-12 bg-orange-200 rounded-lg flex items-center justify-center mr-4">
                                            <span class="text-2xl">🥤</span>
                                        </div>
                                        <div>
                                            <div class="font-medium text-gray-900">Custom Juice</div>
                                            <div class="text-sm text-gray-500">Quantity: {{ $item->quantity }}</div>
                                        </div>
                                    @endif
                                </div>
                                <div class="text-right">
                                    <div class="font-semibold text-gray-900">${{ number_format($item->total_price, 2) }}</div>
                                    <div class="text-sm text-gray-500">${{ number_format($item->price, 2) }} each</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                        <!-- Order Totals -->
                        <div class="mt-6 pt-4 border-t border-gray-200">
                            <div class="space-y-2">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Subtotal:</span>
                                    <span class="font-semibold">${{ number_format($order->subtotal, 2) }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Tax:</span>
                                    <span class="font-semibold">${{ number_format($order->tax, 2) }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Delivery Fee:</span>
                                    <span class="font-semibold">${{ number_format($order->delivery_fee, 2) }}</span>
                                </div>
                                <div class="flex justify-between text-lg font-bold border-t pt-2">
                                    <span>Total:</span>
                                    <span>${{ number_format($order->total, 2) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Status & Actions -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Order Status</h3>
                        
                        <!-- Current Status -->
                        <div class="mb-6">
                            @php
                                $statusConfig = [
                                    'pending' => ['bg' => 'bg-red-100', 'text' => 'text-red-800', 'icon' => '⏳'],
                                    'preparing' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-800', 'icon' => '🔄'],
                                    'ready' => ['bg' => 'bg-green-100', 'text' => 'text-green-800', 'icon' => '✅'],
                                    'completed' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-800', 'icon' => '🏁'],
                                    'cancelled' => ['bg' => 'bg-gray-100', 'text' => 'text-gray-800', 'icon' => '❌']
                                ];
                                $config = $statusConfig[$order->status] ?? ['bg' => 'bg-gray-100', 'text' => 'text-gray-800', 'icon' => '❓'];
                            @endphp
                            <div class="text-center">
                                <div class="text-4xl mb-3">{{ $config['icon'] }}</div>
                                <span class="inline-flex items-center px-3 py-2 rounded-full text-sm font-medium {{ $config['bg'] }} {{ $config['text'] }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                                @if($order->updated_by_employee)
                                    <div class="text-xs text-gray-500 mt-2">
                                        Last updated by: <strong>{{ $order->updated_by_employee }}</strong>
                                    </div>
                                @endif
                                @if($order->status_updated_at)
                                    <div class="text-xs text-gray-500 mt-1">
                                        {{ $order->status_updated_at->format('M d, Y - H:i') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Update Status Form -->
                        <form action="{{ route('admin.orders.update', $order) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Update Status</label>
                                <select name="status" id="status" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-red-500">
                                    <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>⏳ Pending</option>
                                    <option value="preparing" {{ $order->status === 'preparing' ? 'selected' : '' }}>🔄 Preparing</option>
                                    <option value="ready" {{ $order->status === 'ready' ? 'selected' : '' }}>✅ Ready</option>
                                    <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>🏁 Completed</option>
                                    <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>❌ Cancelled</option>
                                </select>
                            </div>
                            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-semibold mb-4">
                                Update Status
                            </button>
                        </form>

                        <!-- Delete Order -->
                        <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this order? This action cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg font-semibold">
                                Delete Order
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>