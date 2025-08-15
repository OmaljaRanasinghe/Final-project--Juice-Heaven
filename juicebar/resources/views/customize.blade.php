<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl text-gray-800 leading-tight">
                    {{ __('Create Your Custom Juice') }}
                </h2>
                <p class="text-gray-600 mt-1">Mix and match your favorite fruits to create the perfect blend</p>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('product') }}" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors duration-200 flex items-center space-x-2 shadow-lg">
                    <span>🛍️</span>
                    <span>Browse Menu</span>
                </a>
                <a href="{{ route('favorites') }}" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors duration-200 flex items-center space-x-2 shadow-lg">
                    <span>❤️</span>
                    <span>Favorites</span>
                </a>
                <a href="{{ route('cart') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors duration-200 flex items-center space-x-2 shadow-lg">
                    <span>🛒</span>
                    <span id="header-cart-count">Cart ({{ $cartCount ?? 0 }})</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-gradient-to-br from-green-50 via-yellow-50 to-orange-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Hero Section -->
            <div class="text-center mb-12">
                <div class="inline-flex items-center space-x-4 mb-6">
                    <span class="text-6xl animate-bounce">🥤</span>
                    <div class="text-4xl">+</div>
                    <span class="text-6xl animate-pulse">🍓</span>
                    <div class="text-4xl">+</div>
                    <span class="text-6xl animate-bounce" style="animation-delay: 0.2s;">🥭</span>
                    <div class="text-4xl">=</div>
                    <span class="text-6xl animate-pulse" style="animation-delay: 0.4s;">😋</span>
                </div>
                <h3 class="text-3xl font-bold text-gray-800 mb-4">Build Your Perfect Juice Blend</h3>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Select your favorite fruits, adjust sweetness, and customize your perfect juice creation. 
                    Watch the color change in real-time as you build your masterpiece!
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- Juice Builder Form -->
                <div class="lg:col-span-2">
                    <form id="juice-builder-form" class="space-y-8">
                        @csrf
                        

                        <!-- Fruit Selection -->
                        <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                            <h4 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                                <span class="text-2xl mr-3">🍎</span>
                                Select Your Fruits (Choose 1-5 servings each)
                            </h4>
                            
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                                @foreach($fruits as $fruit)
                                <div class="fruit-selector relative group cursor-pointer" data-fruit-id="{{ $fruit->id }}" data-fruit-color="{{ $fruit->color }}" data-fruit-name="{{ $fruit->name }}">
                                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl p-4 border-2 border-transparent hover:border-green-300 transition-all duration-300 text-center transform hover:scale-105">
                                        <div class="text-4xl mb-2">{{ $fruit->emoji }}</div>
                                        <h5 class="font-semibold text-gray-800 text-sm">{{ $fruit->name }}</h5>
                                        <p class="text-xs text-gray-600 mb-2">LKR {{ number_format($fruit->price_per_serving, 0) }}/serving</p>
                                        <p class="text-xs text-gray-500 mb-3">{{ $fruit->description }}</p>
                                        
                                        <!-- Quantity Selector -->
                                        <div class="quantity-controls hidden items-center justify-center space-x-2">
                                            <button type="button" class="quantity-btn minus w-6 h-6 bg-red-500 hover:bg-red-600 text-white rounded-full flex items-center justify-center text-xs font-bold">−</button>
                                            <span class="quantity-display font-bold text-lg w-8 text-center">0</span>
                                            <button type="button" class="quantity-btn plus w-6 h-6 bg-green-500 hover:bg-green-600 text-white rounded-full flex items-center justify-center text-xs font-bold">+</button>
                                        </div>
                                        
                                        <!-- Add Button -->
                                        <button type="button" class="add-fruit-btn w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                                            Add to Blend
                                        </button>
                                    </div>
                                    
                                    <!-- Selected Indicator -->
                                    <div class="selected-indicator absolute -top-2 -right-2 w-6 h-6 bg-green-500 text-white rounded-full flex items-center justify-center text-sm font-bold hidden">
                                        <span class="selected-count">1</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Customization Options Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            
                            <!-- Size Selection -->
                            <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                                <h4 class="text-lg font-bold text-gray-800 mb-4 flex items-center justify-center">
                                    <span class="text-xl mr-2">📏</span>
                                    Size
                                </h4>
                                <div class="space-y-3">
                                    <label class="size-option cursor-pointer block">
                                        <input type="radio" name="size" value="small" class="sr-only">
                                        <div class="border-2 border-gray-200 rounded-lg p-3 text-center hover:border-green-300 transition-all duration-200 flex items-center">
                                            <div class="text-2xl mr-3">🥃</div>
                                            <div class="text-left">
                                                <div class="font-semibold text-gray-800">Small</div>
                                                <div class="text-xs text-gray-600">12oz (-20%)</div>
                                            </div>
                                        </div>
                                    </label>
                                    <label class="size-option cursor-pointer block">
                                        <input type="radio" name="size" value="medium" class="sr-only" checked>
                                        <div class="border-2 border-green-500 bg-green-50 rounded-lg p-3 text-center transition-all duration-200 flex items-center">
                                            <div class="text-2xl mr-3">🥤</div>
                                            <div class="text-left">
                                                <div class="font-semibold text-gray-800">Medium</div>
                                                <div class="text-xs text-gray-600">16oz (Standard)</div>
                                            </div>
                                        </div>
                                    </label>
                                    <label class="size-option cursor-pointer block">
                                        <input type="radio" name="size" value="large" class="sr-only">
                                        <div class="border-2 border-gray-200 rounded-lg p-3 text-center hover:border-green-300 transition-all duration-200 flex items-center">
                                            <div class="text-2xl mr-3">🍺</div>
                                            <div class="text-left">
                                                <div class="font-semibold text-gray-800">Large</div>
                                                <div class="text-xs text-gray-600">20oz (+30%)</div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            
                            <!-- Sugar Level -->
                            <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                                <h4 class="text-lg font-bold text-gray-800 mb-4 flex items-center justify-center">
                                    <span class="text-xl mr-2">🍯</span>
                                    Sweetness
                                </h4>
                                <div class="space-y-3">
                                    <label class="flex items-center cursor-pointer p-2 rounded-lg hover:bg-gray-50 transition-colors">
                                        <input type="radio" name="sugar_level" value="none" class="sr-only sugar-radio">
                                        <div class="radio-custom w-4 h-4 border-2 border-gray-300 rounded-full mr-3"></div>
                                        <span class="text-sm font-medium">None</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer p-2 rounded-lg hover:bg-gray-50 transition-colors">
                                        <input type="radio" name="sugar_level" value="low" class="sr-only sugar-radio">
                                        <div class="radio-custom w-4 h-4 border-2 border-gray-300 rounded-full mr-3"></div>
                                        <span class="text-sm font-medium">Light</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer p-2 rounded-lg hover:bg-gray-50 transition-colors">
                                        <input type="radio" name="sugar_level" value="medium" class="sr-only sugar-radio" checked>
                                        <div class="radio-custom w-4 h-4 border-2 border-green-500 bg-green-500 rounded-full mr-3"></div>
                                        <span class="text-sm font-medium">Medium</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer p-2 rounded-lg hover:bg-gray-50 transition-colors">
                                        <input type="radio" name="sugar_level" value="high" class="sr-only sugar-radio">
                                        <div class="radio-custom w-4 h-4 border-2 border-gray-300 rounded-full mr-3"></div>
                                        <span class="text-sm font-medium">High</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Ice Level -->
                            <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                                <h4 class="text-lg font-bold text-gray-800 mb-4 flex items-center justify-center">
                                    <span class="text-xl mr-2">🧊</span>
                                    Ice Level
                                </h4>
                                <div class="space-y-3">
                                    <label class="flex items-center cursor-pointer p-2 rounded-lg hover:bg-gray-50 transition-colors">
                                        <input type="radio" name="ice_level" value="none" class="sr-only ice-radio">
                                        <div class="radio-custom w-4 h-4 border-2 border-gray-300 rounded-full mr-3"></div>
                                        <span class="text-sm font-medium">None</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer p-2 rounded-lg hover:bg-gray-50 transition-colors">
                                        <input type="radio" name="ice_level" value="light" class="sr-only ice-radio">
                                        <div class="radio-custom w-4 h-4 border-2 border-gray-300 rounded-full mr-3"></div>
                                        <span class="text-sm font-medium">Light</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer p-2 rounded-lg hover:bg-gray-50 transition-colors">
                                        <input type="radio" name="ice_level" value="regular" class="sr-only ice-radio" checked>
                                        <div class="radio-custom w-4 h-4 border-2 border-blue-500 bg-blue-500 rounded-full mr-3"></div>
                                        <span class="text-sm font-medium">Regular</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer p-2 rounded-lg hover:bg-gray-50 transition-colors">
                                        <input type="radio" name="ice_level" value="extra" class="sr-only ice-radio">
                                        <div class="radio-custom w-4 h-4 border-2 border-gray-300 rounded-full mr-3"></div>
                                        <span class="text-sm font-medium">Extra</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

                <!-- Live Preview & Summary -->
                <div class="lg:col-span-1">
                    <div class="sticky top-8 space-y-6">
                        
                        <!-- Juice Preview -->
                        <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6 text-center">
                            <h4 class="text-xl font-bold text-gray-800 mb-4">Your Juice Preview</h4>
                            
                            <!-- Juice Jug Animation -->
                            <div class="relative mx-auto w-40 h-48 mb-6 overflow-hidden">
                                <!-- Jug Body -->
                                <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-28 h-36 bg-gray-100 border-2 border-gray-300" style="border-radius: 20px 20px 0 0; border-bottom: none;"></div>
                                
                                <!-- Jug Handle -->
                                <div class="absolute right-1 top-16 w-5 h-10 border-3 border-gray-400 rounded-r-full bg-transparent"></div>
                                
                                <!-- Jug Spout -->
                                <div class="absolute top-10 left-1/2 transform -translate-x-1/2 translate-x-8 w-6 h-3 bg-gray-100 border border-gray-300 rounded-r-lg"></div>
                                
                                <!-- Juice Liquid Container (with overflow hidden) -->
                                <div class="absolute bottom-1 left-1/2 transform -translate-x-1/2 w-24 h-32 overflow-hidden" style="border-radius: 18px 18px 0 0;">
                                    <div id="juice-liquid" class="absolute bottom-0 left-0 right-0 transition-all duration-700 ease-in-out"
                                         style="height: 30%; background: linear-gradient(to top, #ff6b35, #ffa500aa); border-radius: 18px 18px 0 0; max-height: 100%;"></div>
                                </div>
                                
                                <!-- Jug Rim -->
                                <div class="absolute top-10 left-1/2 transform -translate-x-1/2 w-28 h-2 bg-gray-300 rounded-full shadow-inner border border-gray-400"></div>
                                
                                <!-- Jug Lid -->
                                <div class="absolute top-8 left-1/2 transform -translate-x-1/2 w-20 h-3 bg-gray-400 rounded-full shadow-lg border border-gray-500"></div>
                                <div class="absolute top-6 left-1/2 transform -translate-x-1/2 w-3 h-3 bg-gray-500 rounded-full shadow-inner"></div>
                                
                                <!-- Shine Effect -->
                                <div class="absolute top-14 left-1/2 transform -translate-x-1/2 translate-x-4 w-2 h-6 bg-white opacity-30 rounded-full"></div>
                                
                                <!-- Bubbles Animation (only show when there's liquid) -->
                                <div id="bubble-container" class="absolute inset-0 opacity-0 transition-opacity duration-500">
                                    <div class="bubble absolute bottom-12 left-1/2 w-1 h-1 bg-white opacity-60 rounded-full animate-bounce" style="animation-delay: 0s; animation-duration: 2s;"></div>
                                    <div class="bubble absolute bottom-16 left-1/2 transform translate-x-1 w-1 h-1 bg-white opacity-40 rounded-full animate-bounce" style="animation-delay: 0.7s; animation-duration: 2.3s;"></div>
                                    <div class="bubble absolute bottom-20 left-1/2 transform -translate-x-1 w-1 h-1 bg-white opacity-50 rounded-full animate-bounce" style="animation-delay: 1.4s; animation-duration: 1.8s;"></div>
                                </div>
                            </div>

                            <div id="juice-preview-fruits" class="text-lg font-semibold text-gray-800 mb-4">Select fruits to see your blend</div>
                            <div id="juice-preview-price" class="text-3xl font-bold text-green-600">LKR 0</div>
                        </div>

                        <!-- Order Summary -->
                        <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                            <h4 class="text-lg font-bold text-gray-800 mb-4">Order Summary</h4>
                            
                            <div id="summary-details" class="space-y-3 text-sm">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Base Price:</span>
                                    <span id="base-price" class="font-semibold">LKR 0</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Size:</span>
                                    <span id="size-info" class="font-semibold">Medium (Standard)</span>
                                </div>
                                <div class="border-t border-gray-200 pt-3 mt-3">
                                    <div class="flex justify-between font-bold text-xl">
                                        <span>Total:</span>
                                        <span id="total-price" class="text-green-600">LKR 0</span>
                                    </div>
                                </div>
                            </div>

                            <button type="button" id="create-juice-btn" 
                                    class="w-full mt-6 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white py-3 rounded-lg font-bold text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 disabled:opacity-50 disabled:cursor-not-allowed"
                                    disabled>
                                🚀 Create My Juice
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectedFruits = {};
            let currentPrice = 0;
            let currentSize = 'medium';

            const fruitData = @json($fruits->keyBy('id'));
            const sizeMultipliers = { small: 0.8, medium: 1.0, large: 1.3 };
            const userName = @json($userName);

            // Fruit Selection Logic
            document.querySelectorAll('.fruit-selector').forEach(selector => {
                const fruitId = selector.dataset.fruitId;
                const addBtn = selector.querySelector('.add-fruit-btn');
                const quantityControls = selector.querySelector('.quantity-controls');
                const quantityDisplay = selector.querySelector('.quantity-display');
                const selectedIndicator = selector.querySelector('.selected-indicator');
                const selectedCount = selector.querySelector('.selected-count');
                const minusBtn = selector.querySelector('.minus');
                const plusBtn = selector.querySelector('.plus');

                addBtn.addEventListener('click', function() {
                    selectedFruits[fruitId] = 1;
                    quantityDisplay.textContent = '1';
                    addBtn.classList.add('hidden');
                    quantityControls.classList.remove('hidden');
                    quantityControls.classList.add('flex');
                    selector.classList.add('ring-4', 'ring-green-200');
                    selectedIndicator.classList.remove('hidden');
                    selectedCount.textContent = '1';
                    updatePreview();
                });

                plusBtn.addEventListener('click', function() {
                    if (selectedFruits[fruitId] < 5) {
                        selectedFruits[fruitId]++;
                        quantityDisplay.textContent = selectedFruits[fruitId];
                        selectedCount.textContent = selectedFruits[fruitId];
                        updatePreview();
                    }
                });

                minusBtn.addEventListener('click', function() {
                    if (selectedFruits[fruitId] > 1) {
                        selectedFruits[fruitId]--;
                        quantityDisplay.textContent = selectedFruits[fruitId];
                        selectedCount.textContent = selectedFruits[fruitId];
                        updatePreview();
                    } else {
                        delete selectedFruits[fruitId];
                        quantityControls.classList.add('hidden');
                        quantityControls.classList.remove('flex');
                        addBtn.classList.remove('hidden');
                        selector.classList.remove('ring-4', 'ring-green-200');
                        selectedIndicator.classList.add('hidden');
                        updatePreview();
                    }
                });
            });

            // Size Selection
            document.querySelectorAll('.size-option').forEach(option => {
                const input = option.querySelector('input');
                const div = option.querySelector('div');

                option.addEventListener('click', function() {
                    document.querySelectorAll('.size-option input').forEach(inp => {
                        inp.checked = false;
                        inp.closest('.size-option').querySelector('div').classList.remove('border-green-500', 'bg-green-50');
                        inp.closest('.size-option').querySelector('div').classList.add('border-gray-200');
                    });
                    
                    input.checked = true;
                    div.classList.add('border-green-500', 'bg-green-50');
                    div.classList.remove('border-gray-200');
                    currentSize = input.value;
                    updateSizeInfo();
                    updatePreview();
                });
            });

            // Sugar and Ice Selection
            document.querySelectorAll('.sugar-radio, .ice-radio').forEach(radio => {
                radio.addEventListener('change', function() {
                    // Update visual state
                    const name = this.name;
                    document.querySelectorAll(`input[name="${name}"]`).forEach(r => {
                        const custom = r.closest('label').querySelector('.radio-custom');
                        if (r.checked) {
                            custom.classList.add('bg-green-500', 'border-green-500');
                        } else {
                            custom.classList.remove('bg-green-500', 'border-green-500');
                            custom.classList.add('border-gray-300');
                        }
                    });
                });
            });


            function updatePreview() {
                let basePrice = 0;
                let colors = [];
                let fruitNames = [];

                // Calculate base price and collect colors
                for (let fruitId in selectedFruits) {
                    const fruit = fruitData[fruitId];
                    const quantity = selectedFruits[fruitId];
                    
                    basePrice += fruit.price_per_serving * quantity;
                    fruitNames.push(fruit.name);
                    
                    // Add color with weight
                    for (let i = 0; i < quantity; i++) {
                        colors.push(fruit.color);
                    }
                }

                // Apply size multiplier
                const totalPrice = basePrice * sizeMultipliers[currentSize];

                // Update display
                document.getElementById('base-price').textContent = 'LKR ' + Math.round(basePrice);
                document.getElementById('total-price').textContent = 'LKR ' + Math.round(totalPrice);
                document.getElementById('juice-preview-price').textContent = 'LKR ' + Math.round(totalPrice);
                
                // Update fruits display
                const fruitsText = fruitNames.length > 0 ? fruitNames.join(', ') : 'Select fruits to see your blend';
                document.getElementById('juice-preview-fruits').textContent = fruitsText;

                // Update juice color
                updateJuiceColor(colors);
                updateCreateButton();
            }

            function updateSizeInfo() {
                const sizeNames = { small: 'Small (-20%)', medium: 'Medium (Standard)', large: 'Large (+30%)' };
                document.getElementById('size-info').textContent = sizeNames[currentSize];
            }

            function updateJuiceColor(colors) {
                const liquid = document.getElementById('juice-liquid');
                const bubbleContainer = document.getElementById('bubble-container');
                
                if (colors.length === 0) {
                    liquid.style.background = 'linear-gradient(to top, #ff6b35, #ffa500aa)';
                    liquid.style.height = '20%';
                    bubbleContainer.style.opacity = '0';
                    return;
                }

                // Calculate liquid level based on fruit count (more fruits = more liquid)
                const totalFruits = colors.length;
                const liquidLevel = Math.min(20 + (totalFruits * 8), 85); // Start at 20%, add 8% per fruit, max 85%
                
                if (colors.length === 1) {
                    const color = colors[0];
                    liquid.style.background = `linear-gradient(to top, ${color}, ${color}cc)`;
                } else if (colors.length <= 3) {
                    // Blend colors for small number of fruits
                    const color1 = colors[0];
                    const color2 = colors[1] || colors[0];
                    liquid.style.background = `linear-gradient(to top, ${color1}, ${color2}aa)`;
                } else {
                    // Multiple colors - create a vibrant blend
                    const colorCounts = {};
                    colors.forEach(color => {
                        colorCounts[color] = (colorCounts[color] || 0) + 1;
                    });
                    
                    const dominantColor = Object.keys(colorCounts).reduce((a, b) => 
                        colorCounts[a] > colorCounts[b] ? a : b
                    );
                    
                    // Get second most frequent color for blending
                    const sortedColors = Object.keys(colorCounts).sort((a, b) => colorCounts[b] - colorCounts[a]);
                    const secondColor = sortedColors[1] || sortedColors[0];
                    
                    liquid.style.background = `linear-gradient(to top, ${dominantColor}, ${secondColor}aa, ${dominantColor}99)`;
                }
                
                liquid.style.height = `${liquidLevel}%`;
                
                // Show bubbles when there's liquid
                bubbleContainer.style.opacity = totalFruits > 0 ? '1' : '0';
                
                // Add a subtle animation effect
                liquid.style.transform = 'scale(1.02)';
                setTimeout(() => {
                    liquid.style.transform = 'scale(1)';
                }, 300);
            }

            function updateCreateButton() {
                const btn = document.getElementById('create-juice-btn');
                const hasFruits = Object.keys(selectedFruits).length > 0;
                
                btn.disabled = !hasFruits;
            }

            // Create Juice
            document.getElementById('create-juice-btn').addEventListener('click', async function() {
                // Generate automatic name with user's name
                const autoName = `${userName}'s Juice`;
                
                const formData = new FormData();
                formData.append('_token', document.querySelector('input[name="_token"]').value);
                formData.append('name', autoName);
                
                // Add selected fruits
                for (let fruitId in selectedFruits) {
                    formData.append(`selected_fruits[${fruitId}]`, selectedFruits[fruitId]);
                }
                
                formData.append('size', currentSize);
                formData.append('sugar_level', document.querySelector('input[name="sugar_level"]:checked').value);
                formData.append('ice_level', document.querySelector('input[name="ice_level"]:checked').value);
                formData.append('add_protein', '0');
                formData.append('add_vitamins', '0');

                try {
                    const response = await fetch('{{ route("customize.store") }}', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });

                    const data = await response.json();
                    
                    if (data.success) {
                        // Update cart count if available
                        if (data.cart_count !== undefined) {
                            updateCartCount(data.cart_count);
                        }
                        
                        // Show success animation
                        showSuccessMessage(data.message, data.juice);
                    } else {
                        alert('Error creating juice. Please try again.');
                    }
                } catch (error) {
                    console.error('Error:', error);
                    alert('Error creating juice. Please try again.');
                }
            });

            function showSuccessMessage(message, juice) {
                // Create overlay
                const overlay = document.createElement('div');
                overlay.className = 'fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4';
                
                overlay.innerHTML = `
                    <div class="bg-white rounded-xl p-8 max-w-md w-full text-center transform animate-bounce">
                        <div class="text-6xl mb-4">🎉</div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Juice Created!</h3>
                        <div class="bg-gray-50 rounded-lg p-4 mb-4">
                            <h4 class="font-bold text-lg text-gray-800">${juice.name}</h4>
                            <p class="text-gray-600">${juice.fruits}</p>
                            <p class="text-gray-600">Size: ${juice.size}</p>
                            <p class="text-2xl font-bold text-green-600 mt-2">LKR ${juice.total_price}</p>
                        </div>
                        <p class="text-gray-600 mb-6">${message}</p>
                        <div class="flex space-x-3 justify-center">
                            <button onclick="toggleCustomJuiceFavorite(${juice.id}, this)" class="bg-red-600 hover:bg-red-700 text-white px-4 py-3 rounded-lg font-semibold transition-colors custom-juice-favorite-btn" data-custom-juice-id="${juice.id}" data-favorited="false">
                                🤍 Favorite
                            </button>
                            <a href="{{ route('cart') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-3 rounded-lg font-semibold transition-colors">
                                🛒 Go to Cart
                            </a>
                            <button onclick="this.closest('.fixed').remove(); resetForm();" class="bg-green-600 hover:bg-green-700 text-white px-4 py-3 rounded-lg font-semibold transition-colors">
                                ✨ Create Another
                            </button>
                        </div>
                    </div>
                `;
                
                document.body.appendChild(overlay);
                
                // Auto remove after 5 seconds
                setTimeout(() => {
                    if (document.body.contains(overlay)) {
                        document.body.removeChild(overlay);
                    }
                }, 5000);
            }

            function updateCartCount(count) {
                // Update the specific cart count element in header
                const headerCartCount = document.getElementById('header-cart-count');
                if (headerCartCount) {
                    // Add visual feedback animation
                    headerCartCount.style.transform = 'scale(1.2)';
                    headerCartCount.style.transition = 'transform 0.3s ease';
                    headerCartCount.textContent = `Cart (${count})`;
                    
                    // Return to normal size after animation
                    setTimeout(() => {
                        headerCartCount.style.transform = 'scale(1)';
                    }, 300);
                    
                    // Add a brief color change for extra visibility
                    const cartLink = headerCartCount.closest('a');
                    if (cartLink) {
                        cartLink.style.backgroundColor = '#10b981'; // Green color
                        setTimeout(() => {
                            cartLink.style.backgroundColor = ''; // Reset to original
                        }, 1000);
                    }
                }
                
                // Also update any other cart count elements as fallback
                const cartCountElements = document.querySelectorAll('[id*="cart-count"], .cart-count');
                cartCountElements.forEach(element => {
                    if (element.id !== 'header-cart-count') {
                        element.textContent = count;
                    }
                });
            }

            function resetForm() {
                // Reset all fruit selections
                Object.keys(selectedFruits).forEach(fruitId => {
                    delete selectedFruits[fruitId];
                    const selector = document.querySelector(`[data-fruit-id="${fruitId}"]`);
                    if (selector) {
                        const quantityControls = selector.querySelector('.quantity-controls');
                        const addBtn = selector.querySelector('.add-fruit-btn');
                        const selectedIndicator = selector.querySelector('.selected-indicator');
                        
                        quantityControls.classList.add('hidden');
                        quantityControls.classList.remove('flex');
                        addBtn.classList.remove('hidden');
                        selector.classList.remove('ring-4', 'ring-green-200');
                        selectedIndicator.classList.add('hidden');
                    }
                });
                
                // Reset size to medium
                document.querySelector('input[name="size"][value="medium"]').checked = true;
                currentSize = 'medium';
                
                updatePreview();
                updateSizeInfo();
            }

            // Initialize default state
            updateSizeInfo();
            updatePreview();

            // Custom Juice Favorite functionality
            window.toggleCustomJuiceFavorite = async function(customJuiceId, button) {
                const originalContent = button.innerHTML;
                const isCurrentlyFavorited = button.getAttribute('data-favorited') === 'true';
                
                // Disable button and show loading
                button.disabled = true;
                button.innerHTML = '⏳ Loading...';
                
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
                        // Update button appearance
                        if (data.favorited) {
                            button.innerHTML = '❤️ Favorited';
                            button.classList.remove('bg-red-600', 'hover:bg-red-700');
                            button.classList.add('bg-pink-600', 'hover:bg-pink-700');
                        } else {
                            button.innerHTML = '🤍 Favorite';
                            button.classList.remove('bg-pink-600', 'hover:bg-pink-700');
                            button.classList.add('bg-red-600', 'hover:bg-red-700');
                        }
                        button.setAttribute('data-favorited', data.favorited ? 'true' : 'false');
                        
                        // Show notification using existing function
                        showNotification(data.message, 'success');
                    } else {
                        throw new Error(data.message || 'Failed to toggle favorite');
                    }
                } catch (error) {
                    console.error('Error:', error);
                    button.innerHTML = originalContent;
                    showNotification(error.message || 'Failed to toggle favorite', 'error');
                } finally {
                    // Re-enable button
                    button.disabled = false;
                }
            };

            // Toast notification function (reused from existing code)
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