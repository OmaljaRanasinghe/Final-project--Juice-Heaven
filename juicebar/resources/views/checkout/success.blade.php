<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl text-gray-800 leading-tight">
                    {{ __('Order Confirmed!') }}
                </h2>
                <p class="text-gray-600 mt-1">Thank you for your order</p>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('dashboard') }}" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors duration-200 flex items-center space-x-2 shadow-lg">
                    <span>🏠</span>
                    <span>Back to Dashboard</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Success Message -->
            <div class="bg-green-50 border border-green-200 rounded-xl p-6 mb-8">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center">
                            <span class="text-white text-2xl">✅</span>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-green-800">Payment Successful!</h3>
                        <p class="text-green-700">Your order has been confirmed and we're preparing your fresh juices.</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Order Details -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                        <span class="text-2xl mr-3">📋</span>
                        Order Details
                    </h3>

                    <div class="space-y-4">
                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                            <span class="font-medium text-gray-600">Order Number</span>
                            <span class="font-bold text-gray-800">{{ $order->order_number }}</span>
                        </div>

                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                            <span class="font-medium text-gray-600">Order Date</span>
                            <span class="text-gray-800">{{ $order->created_at->format('M d, Y at h:i A') }}</span>
                        </div>

                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                            <span class="font-medium text-gray-600">Payment Method</span>
                            <span class="text-gray-800">Credit Card</span>
                        </div>

                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                            <span class="font-medium text-gray-600">Delivery Type</span>
                            <span class="text-gray-800 capitalize">
                                @if($order->delivery_type === 'delivery')
                                    🚚 Home Delivery
                                @else
                                    🏪 Store Pickup
                                @endif
                            </span>
                        </div>

                        <div class="flex justify-between items-center py-2">
                            <span class="font-medium text-gray-600">Status</span>
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium capitalize">
                                {{ $order->status }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Delivery Information -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                        @if($order->delivery_type === 'delivery')
                            <span class="text-2xl mr-3">🚚</span>
                            Delivery Address
                        @else
                            <span class="text-2xl mr-3">🏪</span>
                            Pickup Information
                        @endif
                    </h3>

                    @if($order->delivery_type === 'delivery')
                        <div class="space-y-2">
                            <p class="font-semibold text-gray-800">{{ $order->billing_name }}</p>
                            <p class="text-gray-600">{{ $order->delivery_address }}</p>
                            <p class="text-gray-600">{{ $order->delivery_city }}, {{ $order->delivery_state }} {{ $order->delivery_zip }}</p>
                            <p class="text-gray-600">{{ $order->billing_phone }}</p>
                        </div>
                        
                        <div class="mt-6 p-4 bg-blue-50 rounded-lg">
                            <p class="text-sm text-blue-800">
                                <strong>Estimated Delivery:</strong> 30-45 minutes
                            </p>
                        </div>
                    @else
                        <div class="space-y-2">
                            <p class="font-semibold text-gray-800">Pickup Location:</p>
                            <p class="text-gray-600">JuiceBar Fresh Juice Store</p>
                            <p class="text-gray-600">123 Fresh Street</p>
                            <p class="text-gray-600">Your City, State 12345</p>
                        </div>
                        
                        <div class="mt-6 p-4 bg-blue-50 rounded-lg">
                            <p class="text-sm text-blue-800">
                                <strong>Pickup Time:</strong> 15-20 minutes
                            </p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Order Items -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6 mt-8">
                <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                    <span class="text-2xl mr-3">🥤</span>
                    Your Order
                </h3>

                <div class="space-y-4">
                    @foreach($order->orderItems as $item)
                    <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                        @if($item->custom_juice_id)
                            <div class="w-16 h-16 rounded-lg flex items-center justify-center text-2xl shadow-sm" 
                                 style="background: linear-gradient(135deg, {{ $item->customJuice->dominant_color }}, {{ $item->customJuice->dominant_color }}aa);">
                                🥤
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-gray-800">{{ $item->customJuice->name }}</h4>
                                <p class="text-gray-600 text-sm">{{ $item->customJuice->ingredients }}</p>
                                <p class="text-gray-600 text-sm">Quantity: {{ $item->quantity }}</p>
                            </div>
                        @else
                            <div class="w-16 h-16 rounded-lg flex items-center justify-center text-2xl shadow-sm" 
                                 style="background: linear-gradient(135deg, {{ $item->product->color }}, {{ $item->product->color }}aa);">
                                {{ $item->product->emoji }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-gray-800">{{ $item->product->name }}</h4>
                                <p class="text-gray-600 text-sm">{{ $item->product->description }}</p>
                                <p class="text-gray-600 text-sm">Quantity: {{ $item->quantity }}</p>
                            </div>
                        @endif
                        <div class="text-right">
                            <p class="font-semibold text-gray-800">${{ number_format($item->total_price, 2) }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Order Total -->
                <div class="border-t border-gray-200 mt-6 pt-6">
                    <div class="space-y-2">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Subtotal</span>
                            <span class="text-gray-800">${{ number_format($order->subtotal, 2) }}</span>
                        </div>
                        
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Tax</span>
                            <span class="text-gray-800">${{ number_format($order->tax, 2) }}</span>
                        </div>
                        
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Delivery Fee</span>
                            <span class="text-gray-800 {{ $order->delivery_fee == 0 ? 'text-green-600' : '' }}">
                                {{ $order->delivery_fee == 0 ? 'FREE' : '$' . number_format($order->delivery_fee, 2) }}
                            </span>
                        </div>
                        
                        <div class="border-t border-gray-200 pt-2">
                            <div class="flex justify-between items-center text-xl font-bold">
                                <span class="text-gray-800">Total</span>
                                <span class="text-green-600">${{ number_format($order->total, 2) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Next Steps -->
            <div class="bg-blue-50 border border-blue-200 rounded-xl p-6 mt-8">
                <h3 class="text-lg font-semibold text-blue-800 mb-4">What's Next?</h3>
                <div class="space-y-2 text-blue-700">
                    <p>✅ We've received your order and payment</p>
                    <p>🥤 Our team is preparing your fresh juices</p>
                    @if($order->delivery_type === 'delivery')
                        <p>🚚 Your order will be delivered within 30-45 minutes</p>
                    @else
                        <p>🏪 Your order will be ready for pickup in 15-20 minutes</p>
                    @endif
                    <p>📧 You'll receive updates via email at {{ $order->billing_email }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>