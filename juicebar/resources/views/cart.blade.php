<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl text-gray-800 leading-tight">
                    {{ __('Shopping Cart') }}
                </h2>
                <p class="text-gray-600 mt-1">Review your fresh juice selections</p>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('favorites') }}" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors duration-200 flex items-center space-x-2 shadow-lg">
                    <span>❤️</span>
                    <span>My Favorites</span>
                </a>
                <a href="{{ route('product') }}" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors duration-200 flex items-center space-x-2 shadow-lg">
                    <span>🛍️</span>
                    <span>Continue Shopping</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Cart Items Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-xl font-bold text-gray-800 flex items-center">
                                <span class="text-2xl mr-3">🛒</span>
                                Cart Items ({{ $cartItems->count() }})
                            </h3>
                            @if($cartItems->count() > 0)
                            <button onclick="clearCart()" class="text-red-500 hover:text-red-700 font-medium text-sm">
                                Clear Cart
                            </button>
                            @endif
                        </div>

                        <!-- Cart Items List -->
                        @if($cartItems->count() > 0)
                        <div class="space-y-4">
                            @foreach($cartItems as $item)
                            <div class="flex items-center space-x-4 p-4 border border-gray-200 rounded-lg hover:shadow-md transition-shadow duration-300">
                                @if($item->custom_juice_id)
                                    <!-- Custom Juice Display -->
                                    <div class="w-20 h-20 rounded-xl flex items-center justify-center text-3xl shadow-lg" style="background: linear-gradient(135deg, {{ $item->customJuice->dominant_color }}, {{ $item->customJuice->dominant_color }}aa);">
                                        <span>🥤</span>
                                    </div>

                                    <!-- Custom Juice Details -->
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-gray-800 text-lg">{{ $item->customJuice->name }}</h4>
                                        <p class="text-gray-600 text-sm">{{ $item->description }}</p>
                                        <div class="flex items-center space-x-4 mt-2">
                                            <span class="text-green-600 font-bold text-lg">LKR {{ number_format($item->customJuice->total_price, 0) }}</span>
                                            <span class="text-gray-400 text-sm">each</span>
                                            <span class="text-purple-600 text-xs font-medium bg-purple-100 px-2 py-1 rounded-full">✨ Custom</span>
                                        </div>
                                        <div class="text-xs text-gray-500 mt-1">
                                            Size: {{ ucfirst($item->customJuice->size) }} | 
                                            Sugar: {{ ucfirst($item->customJuice->sugar_level) }} | 
                                            Ice: {{ ucfirst($item->customJuice->ice_level) }}
                                            @if($item->customJuice->add_protein) | 💪 Protein @endif
                                            @if($item->customJuice->add_vitamins) | ✨ Vitamins @endif
                                        </div>
                                    </div>
                                @else
                                    <!-- Regular Product Display -->
                                    <div class="w-20 h-20 rounded-xl flex items-center justify-center text-3xl shadow-lg {{ $item->product->bg_color }}">
                                        <span>{{ $item->product->emoji }}</span>
                                    </div>

                                    <!-- Product Details -->
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-gray-800 text-lg">{{ $item->product->name }}</h4>
                                        <p class="text-gray-600 text-sm">{{ $item->product->description }}</p>
                                        <div class="flex items-center space-x-2 mt-2">
                                            <span class="text-green-600 font-bold text-lg">LKR {{ number_format($item->product->price, 0) }}</span>
                                            <span class="text-gray-400 text-sm">each</span>
                                        </div>
                                    </div>
                                @endif

                                <!-- Quantity Controls -->
                                <div class="flex items-center space-x-3 bg-gray-50 rounded-lg px-3 py-2">
                                    <button onclick="updateQuantity({{ $item->id }}, {{ $item->quantity - 1 }})" 
                                            class="w-8 h-8 bg-white hover:bg-red-50 rounded-full flex items-center justify-center text-gray-600 hover:text-red-600 transition-colors duration-200 shadow-sm">
                                        <span class="text-lg font-bold">−</span>
                                    </button>
                                    
                                    <span class="w-12 text-center font-semibold text-gray-800">{{ $item->quantity }}</span>
                                    
                                    <button onclick="updateQuantity({{ $item->id }}, {{ $item->quantity + 1 }})" 
                                            class="w-8 h-8 bg-white hover:bg-green-50 rounded-full flex items-center justify-center text-gray-600 hover:text-green-600 transition-colors duration-200 shadow-sm">
                                        <span class="text-lg font-bold">+</span>
                                    </button>
                                </div>

                                <!-- Item Total & Remove -->
                                <div class="text-right">
                                    <div class="font-bold text-xl text-gray-800 mb-2">LKR {{ number_format($item->total_price, 0) }}</div>
                                    <button onclick="removeItem({{ $item->id }})" 
                                            class="text-red-500 hover:text-red-700 text-sm font-medium transition-colors duration-200">
                                        🗑️ Remove
                                    </button>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <!-- Empty Cart Message -->
                        <div class="text-center py-16">
                            <div class="text-8xl mb-4">🛒</div>
                            <h3 class="text-2xl font-bold text-gray-600 mb-3">Your cart is empty</h3>
                            <p class="text-gray-500 mb-6">Add some fresh juices to get started!</p>
                            <a href="{{ route('product') }}" class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition-colors duration-200">
                                <span class="mr-2">🛍️</span>
                                Browse Products
                            </a>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Order Summary Section -->
                <div class="lg:col-span-1">
                    @if($cartItems->count() > 0)
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6 sticky top-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                            <span class="text-2xl mr-3">💰</span>
                            Order Summary
                        </h3>

                        <!-- Summary Details -->
                        <div class="space-y-4 mb-6">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Subtotal ({{ $cartItems->sum('quantity') }} items)</span>
                                <span class="font-semibold text-gray-800">LKR {{ number_format($subtotal, 0) }}</span>
                            </div>
                            
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Delivery Fee</span>
                                <span class="font-semibold text-gray-800 {{ $subtotal >= 25 ? 'text-green-600' : '' }}">
                                    {{ $deliveryFee == 0 ? 'FREE' : 'LKR ' . number_format($deliveryFee, 0) }}
                                </span>
                            </div>
                            
                            @if($subtotal >= 25)
                            <div class="flex items-center text-green-600 bg-green-50 p-3 rounded-lg">
                                <span class="text-lg mr-2">🎉</span>
                                <span class="text-sm font-medium">You unlocked free delivery!</span>
                            </div>
                            @elseif($subtotal > 0 && $subtotal < 25)
                            <div class="flex items-center text-orange-600 bg-orange-50 p-3 rounded-lg">
                                <span class="text-lg mr-2">🚚</span>
                                <span class="text-sm">Add LKR {{ number_format((25 * 300) - $subtotal, 0) }} more for free delivery</span>
                            </div>
                            @endif
                            
                            <div class="border-t border-gray-200 pt-4">
                                <div class="flex justify-between items-center text-xl font-bold">
                                    <span class="text-gray-800">Total</span>
                                    <span class="text-green-600">LKR {{ number_format($total, 0) }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Checkout Button -->
                        <div class="space-y-3">
                            <button onclick="checkout()" 
                                    class="w-full bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white py-4 rounded-lg font-bold text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                🚀 Proceed to Checkout
                            </button>
                        </div>

                        <!-- Trust Badges -->
                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="text-center">
                                    <div class="text-2xl mb-2">🔒</div>
                                    <div class="text-xs text-gray-600 font-medium">Secure Payment</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl mb-2">🚚</div>
                                    <div class="text-xs text-gray-600 font-medium">Fast Delivery</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl mb-2">🌱</div>
                                    <div class="text-xs text-gray-600 font-medium">100% Organic</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl mb-2">💝</div>
                                    <div class="text-xs text-gray-600 font-medium">Money Back</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        // Update cart quantity
        async function updateQuantity(cartItemId, newQuantity) {
            if (newQuantity <= 0) {
                removeItem(cartItemId);
                return;
            }
            
            try {
                const response = await fetch(`/cart/update/${cartItemId}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        quantity: newQuantity
                    })
                });
                
                const data = await response.json();
                
                if (data.success) {
                    location.reload(); // Reload to update totals
                } else {
                    alert('Error updating cart');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Error updating cart');
            }
        }

        // Remove item from cart
        async function removeItem(cartItemId) {
            if (!confirm('Remove this item from cart?')) return;
            
            try {
                const response = await fetch(`/cart/remove/${cartItemId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                });
                
                const data = await response.json();
                
                if (data.success) {
                    location.reload();
                } else {
                    alert('Error removing item');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Error removing item');
            }
        }

        // Clear entire cart
        async function clearCart() {
            if (!confirm('Clear entire cart?')) return;
            
            try {
                const response = await fetch('/cart/clear', {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                });
                
                const data = await response.json();
                
                if (data.success) {
                    location.reload();
                } else {
                    alert('Error clearing cart');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Error clearing cart');
            }
        }

        // Checkout function
        function checkout() {
            window.location.href = '{{ route("billing") }}';
        }
    </script>
</x-app-layout>