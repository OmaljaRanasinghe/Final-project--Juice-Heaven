<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl text-gray-800 leading-tight">
                    {{ __('Our Fresh Juices') }}
                </h2>
                <p class="text-gray-600 mt-1">100% Natural, Fresh & Healthy Juices - Made Daily</p>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('cart') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors duration-200 flex items-center space-x-2 shadow-lg">
                    <span>🛍️</span>
                    <span>View Cart (<span id="cart-count">{{ $cartCount ?? 0 }}</span>)</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Search and Filter Section -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6 mb-8">
                <div class="flex flex-col lg:flex-row gap-6">
                    <!-- Search Bar -->
                    <div class="flex-1">
                        <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Search Juices</label>
                        <div class="relative">
                            <input type="text" id="search" placeholder="Search by name, ingredient, or benefit..." 
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                <span class="text-gray-400">🔍</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Category Filter -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                        <div class="flex flex-wrap gap-2">
                            <button class="filter-btn px-4 py-2 rounded-full bg-green-600 text-white font-medium text-sm shadow-lg transition-all duration-200 hover:shadow-xl" data-category="all">
                                All Juices
                            </button>
                            <button class="filter-btn px-4 py-2 rounded-full bg-gray-200 text-gray-700 hover:bg-gray-300 font-medium text-sm transition-all duration-200" data-category="tropical">
                                🌴 Tropical
                            </button>
                            <button class="filter-btn px-4 py-2 rounded-full bg-gray-200 text-gray-700 hover:bg-gray-300 font-medium text-sm transition-all duration-200" data-category="citrus">
                                🍊 Citrus
                            </button>
                            <button class="filter-btn px-4 py-2 rounded-full bg-gray-200 text-gray-700 hover:bg-gray-300 font-medium text-sm transition-all duration-200" data-category="berry">
                                🫐 Berry
                            </button>
                            <button class="filter-btn px-4 py-2 rounded-full bg-gray-200 text-gray-700 hover:bg-gray-300 font-medium text-sm transition-all duration-200" data-category="green">
                                🥬 Green
                            </button>
                        </div>
                    </div>
                    
                    <!-- Price Filter -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Price Range</label>
                        <select id="price-filter" class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            <option value="all">All Prices</option>
                            <option value="0-1200">Under LKR 1,200</option>
                            <option value="1200-1800">LKR 1,200 - 1,800</option>
                            <option value="1800-9999">LKR 1,800+</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Products Grid -->
            <div id="products-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($products as $product)
                <div class="product-card bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300" 
                     data-category="{{ $product->category }}" 
                     data-price="{{ $product->price }}" 
                     data-name="{{ strtolower($product->name) }}" 
                     data-ingredients="{{ is_array($product->ingredients) ? implode(' ', $product->ingredients) : ($product->ingredients ?? '') }}">
                    <div class="relative">
                        @if($product->image)
                            <div class="h-48 bg-cover bg-center relative" style="background-image: url('{{ asset('storage/' . $product->image) }}');">
                                <div class="absolute inset-0 bg-black bg-opacity-20 flex items-center justify-center">
                                    <span class="text-6xl drop-shadow-lg">{{ $product->emoji }}</span>
                                </div>
                            </div>
                        @else
                            <div class="h-48 {{ $product->bg_color }} flex items-center justify-center">
                                <span class="text-6xl">{{ $product->emoji }}</span>
                            </div>
                        @endif
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
                                data-favorited="{{ in_array($product->id, $favoriteProductIds) ? 'true' : 'false' }}">
                            <span class="favorite-icon text-lg">{{ in_array($product->id, $favoriteProductIds) ? '❤️' : '🤍' }}</span>
                        </button>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gray-800">{{ $product->name }}</h3>
                        <p class="text-gray-600 mb-3 text-sm">{{ $product->description }}</p>
                        <div class="flex flex-wrap gap-1 mb-4">
                            @if(is_array($product->ingredients))
                                @foreach($product->ingredients as $ingredient)
                                <span class="px-2 py-1 bg-gray-100 text-gray-800 text-xs rounded-full capitalize">{{ str_replace('-', ' ', $ingredient) }}</span>
                                @endforeach
                            @else
                                <span class="px-2 py-1 bg-gray-100 text-gray-800 text-xs rounded-full capitalize">{{ $product->ingredients ?? 'Fresh ingredients' }}</span>
                            @endif
                        </div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-2xl font-bold text-green-600">LKR {{ number_format($product->price, 0) }}</span>
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

            <!-- No Results Message -->
            <div id="no-results" class="hidden text-center py-12">
                <div class="text-6xl mb-4">🔍</div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">No juices found</h3>
                <p class="text-gray-600">Try adjusting your search criteria or filters.</p>
            </div>
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
            const searchInput = document.getElementById('search');
            const filterButtons = document.querySelectorAll('.filter-btn');
            const priceFilter = document.getElementById('price-filter');
            const productCards = document.querySelectorAll('.product-card');
            const noResults = document.getElementById('no-results');

            function filterProducts() {
                const searchTerm = searchInput.value.toLowerCase();
                const activeCategory = document.querySelector('.filter-btn.bg-green-600').dataset.category;
                const priceRange = priceFilter.value;
                let visibleCount = 0;

                productCards.forEach(card => {
                    const category = card.dataset.category;
                    const name = card.dataset.name.toLowerCase();
                    const ingredients = card.dataset.ingredients.toLowerCase();
                    const price = parseFloat(card.dataset.price);
                    
                    let matches = true;

                    // Category filter
                    if (activeCategory !== 'all' && category !== activeCategory) {
                        matches = false;
                    }

                    // Search filter
                    if (searchTerm && !name.includes(searchTerm) && !ingredients.includes(searchTerm)) {
                        matches = false;
                    }

                    // Price filter
                    if (priceRange !== 'all') {
                        const [min, max] = priceRange.split('-').map(parseFloat);
                        if (max && (price < min || price > max)) {
                            matches = false;
                        } else if (!max && price < min) {
                            matches = false;
                        }
                    }

                    if (matches) {
                        card.style.display = 'block';
                        card.style.animation = 'fadeIn 0.5s ease-in-out';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                });

                // Show/hide no results message
                if (visibleCount === 0) {
                    noResults.classList.remove('hidden');
                } else {
                    noResults.classList.add('hidden');
                }
            }

            // Search input
            searchInput.addEventListener('input', filterProducts);

            // Category filter buttons
            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons
                    filterButtons.forEach(btn => {
                        btn.classList.remove('bg-green-600', 'text-white', 'shadow-xl');
                        btn.classList.add('bg-gray-200', 'text-gray-700');
                    });
                    
                    // Add active class to clicked button
                    this.classList.add('bg-green-600', 'text-white', 'shadow-xl');
                    this.classList.remove('bg-gray-200', 'text-gray-700');

                    filterProducts();
                });
            });

            // Price filter
            priceFilter.addEventListener('change', filterProducts);

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

            // Favorite functionality
            document.querySelectorAll('.favorite-btn').forEach(button => {
                button.addEventListener('click', async function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    const productId = this.getAttribute('data-product-id');
                    const favoriteIcon = this.querySelector('.favorite-icon');
                    const originalIcon = favoriteIcon.textContent;
                    
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
                            // Update the heart icon
                            favoriteIcon.textContent = data.favorited ? '❤️' : '🤍';
                            this.setAttribute('data-favorited', data.favorited ? 'true' : 'false');
                            
                            // Show notification
                            showNotification(data.message, 'success');
                        } else {
                            throw new Error(data.message || 'Failed to toggle favorite');
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        showNotification(error.message || 'Failed to toggle favorite', 'error');
                        
                        // Reset icon
                        favoriteIcon.textContent = originalIcon;
                    } finally {
                        // Re-enable button
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

            // Add fade-in animation CSS
            const style = document.createElement('style');
            style.textContent = `
                @keyframes fadeIn {
                    from { opacity: 0; transform: translateY(20px); }
                    to { opacity: 1; transform: translateY(0); }
                }
            `;
            document.head.appendChild(style);
        });
    </script>
</x-app-layout>