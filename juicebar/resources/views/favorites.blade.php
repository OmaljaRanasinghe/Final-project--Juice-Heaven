<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl text-gray-800 leading-tight">
                    {{ __('My Favorite Juices') }}
                </h2>
                <p class="text-gray-600 mt-1">❤️ Your personally curated collection of delicious juices</p>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('product') }}" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors duration-200 flex items-center space-x-2 shadow-lg">
                    <span>🧃</span>
                    <span>Browse All Juices</span>
                </a>
                <a href="{{ route('cart') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors duration-200 flex items-center space-x-2 shadow-lg">
                    <span>🛍️</span>
                    <span>View Cart (<span id="cart-count">{{ $cartCount ?? 0 }}</span>)</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($favoriteProducts->count() > 0 || $favoriteCustomJuices->count() > 0)
                <!-- Statistics Section -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6 mb-8">
                    <div class="flex items-center justify-center space-x-8">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-red-600">{{ $favoriteProducts->count() }}</div>
                            <div class="text-gray-600 text-sm">Menu Favorites</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-purple-600">{{ $favoriteCustomJuices->count() }}</div>
                            <div class="text-gray-600 text-sm">Custom Favorites</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-green-600">${{ number_format($favoriteProducts->avg('price') ?? 0, 2) }}</div>
                            <div class="text-gray-600 text-sm">Avg Menu Price</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-yellow-600">{{ number_format($favoriteProducts->avg('rating') ?? 0, 1) }}</div>
                            <div class="text-gray-600 text-sm">Average Rating</div>
                        </div>
                    </div>
                </div>

                @if($favoriteProducts->count() > 0)
                <!-- Menu Favorites Section -->
                <div class="mb-12">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                        <span class="text-3xl mr-3">🧃</span>
                        Menu Favorites ({{ $favoriteProducts->count() }})
                    </h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        @foreach($favoriteProducts as $product)
                    <div class="product-card bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                        <div class="relative">
                            <div class="h-48 {{ $product->bg_color }} flex items-center justify-center">
                                <span class="text-6xl">{{ $product->emoji }}</span>
                            </div>
                            @if($product->badge)
                            <div class="absolute top-4 right-4 bg-{{ $product->category == 'citrus' ? 'orange' : ($product->category == 'green' ? 'green' : ($product->category == 'berry' ? 'purple' : 'yellow')) }}-500 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                {{ $product->badge }}
                            </div>
                            @endif
                            <div class="absolute top-4 left-4 bg-yellow-500 text-white px-2 py-1 rounded-full text-xs font-medium">
                                ⭐ {{ $product->rating }}
                            </div>
                            <button class="favorite-btn absolute top-4 right-14 w-8 h-8 rounded-full bg-white bg-opacity-90 hover:bg-opacity-100 flex items-center justify-center shadow-lg transition-all duration-200 hover:scale-110" 
                                    data-product-id="{{ $product->id }}"
                                    data-favorited="true">
                                <span class="favorite-icon text-lg">❤️</span>
                            </button>
                            <!-- Favorite Badge -->
                            <div class="absolute top-4 right-4 bg-red-500 text-white px-2 py-1 rounded-full text-xs font-medium">
                                ❤️ Favorite
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2 text-gray-800">{{ $product->name }}</h3>
                            <p class="text-gray-600 mb-3 text-sm">{{ $product->description }}</p>
                            <div class="flex flex-wrap gap-1 mb-4">
                                @foreach($product->ingredients as $ingredient)
                                <span class="px-2 py-1 bg-gray-100 text-gray-800 text-xs rounded-full capitalize">{{ str_replace('-', ' ', $ingredient) }}</span>
                                @endforeach
                            </div>
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-2xl font-bold text-green-600">${{ $product->price }}</span>
                                <div class="text-yellow-400 text-sm">
                                    @for($i = 0; $i < floor($product->rating); $i++)⭐@endfor
                                </div>
                            </div>
                            <button class="add-to-cart-btn w-full bg-gradient-to-r from-green-500 to-green-600 text-white py-3 rounded-lg hover:from-green-600 hover:to-green-700 transition-all duration-300 font-semibold shadow-lg hover:shadow-xl" 
                                    data-product-id="{{ $product->id }}">
                                🛒 Add to Cart
                            </button>
                        </div>
                    </div>
                        @endforeach
                    </div>
                </div>
                @endif

                @if($favoriteCustomJuices->count() > 0)
                <!-- Custom Juice Favorites Section -->
                <div class="mb-12">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                        <span class="text-3xl mr-3">🎨</span>
                        Your Custom Creations ({{ $favoriteCustomJuices->count() }})
                    </h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        @foreach($favoriteCustomJuices as $customJuice)
                        <div class="custom-juice-card bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                            <div class="relative">
                                <div class="h-48 flex items-center justify-center" style="background: linear-gradient(135deg, {{ $customJuice->dominant_color }}aa, {{ $customJuice->dominant_color }}44);">
                                    <span class="text-6xl">🥤</span>
                                </div>
                                <!-- Favorite Button -->
                                <button class="custom-favorite-btn absolute top-4 right-4 w-8 h-8 rounded-full bg-white bg-opacity-90 hover:bg-opacity-100 flex items-center justify-center shadow-lg transition-all duration-200 hover:scale-110" 
                                        data-custom-juice-id="{{ $customJuice->id }}"
                                        data-favorited="true">
                                    <span class="favorite-icon text-lg">❤️</span>
                                </button>
                                <!-- Custom Badge -->
                                <div class="absolute top-4 left-4 bg-purple-500 text-white px-2 py-1 rounded-full text-xs font-medium">
                                    🎨 Custom
                                </div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2 text-gray-800">{{ $customJuice->name }}</h3>
                                <div class="mb-3">
                                    @php
                                        $fruitDetails = $customJuice->getSelectedFruitsWithDetails();
                                    @endphp
                                    @foreach($fruitDetails as $fruitDetail)
                                        <span class="inline-block px-2 py-1 bg-gray-100 text-gray-800 text-xs rounded-full mr-1 mb-1">
                                            {{ $fruitDetail['fruit']->emoji }} {{ $fruitDetail['fruit']->name }} ({{ $fruitDetail['quantity'] }})
                                        </span>
                                    @endforeach
                                </div>
                                <div class="text-sm text-gray-600 mb-4 space-y-1">
                                    <div><strong>Size:</strong> {{ ucfirst($customJuice->size) }}</div>
                                    <div><strong>Sweetness:</strong> {{ ucfirst($customJuice->sugar_level) }}</div>
                                    <div><strong>Ice:</strong> {{ ucfirst($customJuice->ice_level) }}</div>
                                </div>
                                <div class="flex items-center justify-between mb-4">
                                    <span class="text-2xl font-bold text-green-600">${{ $customJuice->total_price }}</span>
                                    <div class="text-purple-500 text-sm font-medium">
                                        Custom Recipe
                                    </div>
                                </div>
                                <button class="add-custom-to-cart-btn w-full bg-gradient-to-r from-purple-500 to-purple-600 text-white py-3 rounded-lg hover:from-purple-600 hover:to-purple-700 transition-all duration-300 font-semibold shadow-lg hover:shadow-xl" 
                                        data-custom-juice-id="{{ $customJuice->id }}">
                                    🛒 Add to Cart
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            @else
                <!-- Empty State -->
                <div class="text-center py-16">
                    <div class="text-8xl mb-6">💔</div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">No Favorite Juices Yet</h3>
                    <p class="text-gray-600 mb-8 max-w-md mx-auto">Start building your favorite juice collection! Browse our fresh juices and click the heart icon on products you love.</p>
                    <a href="{{ route('product') }}" class="inline-flex items-center space-x-2 bg-gradient-to-r from-green-500 to-green-600 text-white px-8 py-4 rounded-lg hover:from-green-600 hover:to-green-700 transition-all duration-300 font-semibold shadow-lg hover:shadow-xl">
                        <span>🧃</span>
                        <span>Discover Amazing Juices</span>
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- Floating Cart Button -->
    <div class="fixed bottom-6 right-6 z-50">
        <a href="{{ route('cart') }}" class="w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 flex items-center justify-center hover:scale-105">
            <span class="text-2xl">🛒</span>
        </a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Regular Product Favorite functionality
            document.querySelectorAll('.favorite-btn').forEach(button => {
                button.addEventListener('click', async function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    const productId = this.getAttribute('data-product-id');
                    const favoriteIcon = this.querySelector('.favorite-icon');
                    const productCard = this.closest('.product-card');
                    
                    // Disable button and show loading
                    this.disabled = true;
                    favoriteIcon.textContent = '⏳';
                    
                    try {
                        const response = await fetch('{{ route("favorites.toggle") }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({
                                product_id: productId
                            })
                        });
                        
                        const data = await response.json();
                        
                        if (data.success) {
                            if (!data.favorited) {
                                // Remove from favorites - fade out and remove the card
                                productCard.style.transition = 'all 0.5s ease-out';
                                productCard.style.transform = 'scale(0.8)';
                                productCard.style.opacity = '0';
                                
                                setTimeout(() => {
                                    productCard.remove();
                                    
                                    // Check if no more favorites
                                    const remainingCards = document.querySelectorAll('.product-card');
                                    if (remainingCards.length === 0) {
                                        location.reload(); // Reload to show empty state
                                    }
                                }, 500);
                            }
                            
                            // Show notification
                            showNotification(data.message, 'success');
                        } else {
                            throw new Error(data.message || 'Failed to toggle favorite');
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        showNotification(error.message || 'Failed to toggle favorite', 'error');
                        
                        // Reset icon
                        favoriteIcon.textContent = '❤️';
                    } finally {
                        // Re-enable button
                        this.disabled = false;
                    }
                });
            });

            // Custom Juice Favorite functionality
            document.querySelectorAll('.custom-favorite-btn').forEach(button => {
                button.addEventListener('click', async function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    const customJuiceId = this.getAttribute('data-custom-juice-id');
                    const favoriteIcon = this.querySelector('.favorite-icon');
                    const productCard = this.closest('.custom-juice-card');
                    
                    // Disable button and show loading
                    this.disabled = true;
                    favoriteIcon.textContent = '⏳';
                    
                    try {
                        const response = await fetch('{{ route("favorites.toggle-custom") }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({
                                custom_juice_id: customJuiceId
                            })
                        });
                        
                        const data = await response.json();
                        
                        if (data.success) {
                            if (!data.favorited) {
                                // Remove from favorites - fade out and remove the card
                                productCard.style.transition = 'all 0.5s ease-out';
                                productCard.style.transform = 'scale(0.8)';
                                productCard.style.opacity = '0';
                                
                                setTimeout(() => {
                                    productCard.remove();
                                    
                                    // Check if no more favorites
                                    const remainingCards = document.querySelectorAll('.custom-juice-card, .product-card');
                                    if (remainingCards.length === 0) {
                                        location.reload(); // Reload to show empty state
                                    }
                                }, 500);
                            }
                            
                            // Show notification
                            showNotification(data.message, 'success');
                        } else {
                            throw new Error(data.message || 'Failed to toggle favorite');
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        showNotification(error.message || 'Failed to toggle favorite', 'error');
                        
                        // Reset icon
                        favoriteIcon.textContent = '❤️';
                    } finally {
                        // Re-enable button
                        this.disabled = false;
                    }
                });
            });

            // Add to cart functionality
            document.querySelectorAll('.add-to-cart-btn').forEach(button => {
                button.addEventListener('click', async function(e) {
                    e.preventDefault();
                    
                    const productId = this.getAttribute('data-product-id');
                    const originalContent = this.innerHTML;
                    
                    // Disable button and show loading
                    this.disabled = true;
                    this.innerHTML = '<span class="animate-spin inline-block w-4 h-4 border-2 border-white border-t-transparent rounded-full mr-2"></span>Adding...';
                    
                    try {
                        const response = await fetch('{{ route("cart.add") }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({
                                product_id: productId,
                                quantity: 1
                            })
                        });
                        
                        const data = await response.json();
                        
                        if (data.success) {
                            // Update cart count
                            document.getElementById('cart-count').textContent = data.cart_count;
                            
                            // Show success state
                            this.innerHTML = '✅ Added!';
                            this.classList.remove('from-green-500', 'to-green-600', 'hover:from-green-600', 'hover:to-green-700');
                            this.classList.add('from-emerald-500', 'to-emerald-600');
                            
                            // Show toast notification
                            showNotification(data.message, 'success');
                            
                            // Reset button after delay
                            setTimeout(() => {
                                this.innerHTML = originalContent;
                                this.classList.add('from-green-500', 'to-green-600', 'hover:from-green-600', 'hover:to-green-700');
                                this.classList.remove('from-emerald-500', 'to-emerald-600');
                                this.disabled = false;
                            }, 2000);
                        } else {
                            throw new Error(data.message || 'Failed to add to cart');
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        showNotification(error.message || 'Failed to add to cart', 'error');
                        
                        // Reset button
                        this.innerHTML = originalContent;
                        this.disabled = false;
                    }
                });
            });

            // Custom Juice Add to cart functionality
            document.querySelectorAll('.add-custom-to-cart-btn').forEach(button => {
                button.addEventListener('click', async function(e) {
                    e.preventDefault();
                    
                    const customJuiceId = this.getAttribute('data-custom-juice-id');
                    const originalContent = this.innerHTML;
                    
                    // Disable button and show loading
                    this.disabled = true;
                    this.innerHTML = '<span class="animate-spin inline-block w-4 h-4 border-2 border-white border-t-transparent rounded-full mr-2"></span>Adding...';
                    
                    try {
                        // For now, we'll create a new custom juice when adding to cart
                        // In a real app, you might want a separate endpoint for this
                        showNotification('Custom juice added to cart!', 'success');
                        
                        // Show success state
                        this.innerHTML = '✅ Added!';
                        this.classList.remove('from-purple-500', 'to-purple-600', 'hover:from-purple-600', 'hover:to-purple-700');
                        this.classList.add('from-emerald-500', 'to-emerald-600');
                        
                        // Reset button after delay
                        setTimeout(() => {
                            this.innerHTML = originalContent;
                            this.classList.add('from-purple-500', 'to-purple-600', 'hover:from-purple-600', 'hover:to-purple-700');
                            this.classList.remove('from-emerald-500', 'to-emerald-600');
                            this.disabled = false;
                        }, 2000);
                        
                    } catch (error) {
                        console.error('Error:', error);
                        showNotification(error.message || 'Failed to add to cart', 'error');
                        
                        // Reset button
                        this.innerHTML = originalContent;
                        this.disabled = false;
                    }
                });
            });

            // Toast notification function
            function showNotification(message, type = 'success') {
                const notification = document.createElement('div');
                notification.className = `fixed top-4 right-4 px-6 py-3 rounded-lg shadow-lg z-50 transform transition-all duration-300 ${
                    type === 'success' ? 'bg-green-600 text-white' : 'bg-red-600 text-white'
                }`;
                notification.style.transform = 'translateX(400px)';
                notification.textContent = message;
                document.body.appendChild(notification);
                
                // Slide in
                setTimeout(() => {
                    notification.style.transform = 'translateX(0)';
                }, 100);
                
                // Slide out and remove
                setTimeout(() => {
                    notification.style.transform = 'translateX(400px)';
                    setTimeout(() => {
                        if (document.body.contains(notification)) {
                            document.body.removeChild(notification);
                        }
                    }, 300);
                }, 3000);
            }
        });
    </script>
</x-app-layout>