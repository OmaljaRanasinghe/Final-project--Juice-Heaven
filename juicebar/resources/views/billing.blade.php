<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl text-gray-800 leading-tight">
                    {{ __('Billing Information') }}
                </h2>
                <p class="text-gray-600 mt-1">Enter your details to complete your order</p>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('cart') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors duration-200 flex items-center space-x-2 shadow-lg">
                    <span>🛒</span>
                    <span>Back to Cart</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Billing Form -->
                <div class="lg:col-span-2">
                    <form id="billingForm" method="POST" action="{{ route('billing.process') }}">
                        @csrf
                        
                        <!-- Billing Information -->
                        <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6 mb-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                                <span class="text-2xl mr-3">📋</span>
                                Billing Information
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name *</label>
                                    <input type="text" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                                    @error('name')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                                    <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                                    @error('email')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number *</label>
                                    <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                                    @error('phone')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Address *</label>
                                    <input type="text" id="address" name="address" value="{{ old('address') }}" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                                    @error('address')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="city" class="block text-sm font-medium text-gray-700 mb-2">City *</label>
                                    <input type="text" id="city" name="city" value="{{ old('city') }}" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                                    @error('city')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="zip" class="block text-sm font-medium text-gray-700 mb-2">ZIP Code *</label>
                                    <input type="text" id="zip" name="zip" value="{{ old('zip') }}" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                                    @error('zip')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Pay Now Button -->
                        <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                            <button type="submit" id="payNowBtn"
                                    class="w-full bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white py-4 rounded-lg font-bold text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                💳 Pay Now - LKR {{ number_format($total, 0) }}
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Order Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6 sticky top-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                            <span class="text-2xl mr-3">📋</span>
                            Order Summary
                        </h3>

                        <!-- Cart Items -->
                        <div class="space-y-4 mb-6 max-h-64 overflow-y-auto">
                            @foreach($cartItems as $item)
                            <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
                                @if($item->custom_juice_id)
                                    <div class="w-12 h-12 rounded-lg flex items-center justify-center text-lg shadow-sm" 
                                         style="background: linear-gradient(135deg, {{ $item->customJuice->dominant_color }}, {{ $item->customJuice->dominant_color }}aa);">
                                        🥤
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="font-semibold text-gray-800 text-sm truncate">{{ $item->customJuice->name }}</h4>
                                        <p class="text-gray-600 text-xs">{{ Str::limit($item->customJuice->ingredients, 30) }}</p>
                                        <div class="flex justify-between items-center mt-1">
                                            <span class="text-gray-600 text-xs">Qty: {{ $item->quantity }}</span>
                                            <span class="font-semibold text-gray-800 text-sm">LKR {{ number_format($item->total_price, 0) }}</span>
                                        </div>
                                    </div>
                                @else
                                    <div class="w-12 h-12 rounded-lg flex items-center justify-center text-lg shadow-sm" 
                                         style="background: linear-gradient(135deg, {{ $item->product->color }}, {{ $item->product->color }}aa);">
                                        {{ $item->product->emoji }}
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="font-semibold text-gray-800 text-sm truncate">{{ $item->product->name }}</h4>
                                        <p class="text-gray-600 text-xs">{{ Str::limit($item->product->description, 30) }}</p>
                                        <div class="flex justify-between items-center mt-1">
                                            <span class="text-gray-600 text-xs">Qty: {{ $item->quantity }}</span>
                                            <span class="font-semibold text-gray-800 text-sm">LKR {{ number_format($item->total_price, 0) }}</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            @endforeach
                        </div>

                        <!-- Price Breakdown -->
                        <div class="space-y-3 mb-6 border-t border-gray-200 pt-4">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="font-semibold text-gray-800">LKR {{ number_format($subtotal, 0) }}</span>
                            </div>
                            
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Tax (8%)</span>
                                <span class="font-semibold text-gray-800">LKR {{ number_format($tax, 0) }}</span>
                            </div>
                            
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Delivery Fee</span>
                                <span class="font-semibold text-gray-800 {{ $deliveryFee == 0 ? 'text-green-600' : '' }}">
                                    {{ $deliveryFee == 0 ? 'FREE' : 'LKR ' . number_format($deliveryFee, 0) }}
                                </span>
                            </div>
                            
                            <div class="border-t border-gray-200 pt-3">
                                <div class="flex justify-between items-center text-xl font-bold">
                                    <span class="text-gray-800">Total</span>
                                    <span class="text-green-600">LKR {{ number_format($total, 0) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>