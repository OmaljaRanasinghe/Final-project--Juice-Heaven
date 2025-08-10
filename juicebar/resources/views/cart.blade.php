<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh Juice Paradise - Shopping Cart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'juice-orange': '#ff6b35',
                        'juice-green': '#38d9a9',
                        'juice-pink': '#ed64a6',
                        'juice-yellow': '#fbbf24',
                    },
                    fontFamily: {
                        'inter': ['Inter', 'system-ui', 'sans-serif'],
                    },
                    animation: {
                        'fadeInUp': 'fadeInUp 0.6s ease-out forwards',
                        'slideInRight': 'slideInRight 0.5s ease-out',
                        'bounceIn': 'bounceIn 0.6s ease-out',
                        'shake': 'shake 0.5s ease-in-out',
                        'pulse-soft': 'pulse-soft 2s infinite',
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(30px); }
            to { opacity: 1; transform: translateX(0); }
        }
        
        @keyframes bounceIn {
            0% { opacity: 0; transform: scale(0.3); }
            50% { opacity: 1; transform: scale(1.05); }
            70% { transform: scale(0.9); }
            100% { opacity: 1; transform: scale(1); }
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-3px); }
            20%, 40%, 60%, 80% { transform: translateX(3px); }
        }
        
        @keyframes pulse-soft {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.05); opacity: 0.9; }
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .cart-item {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .cart-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .quantity-btn {
            transition: all 0.2s ease;
        }

        .quantity-btn:hover {
            transform: scale(1.1);
        }

        .quantity-btn:active {
            transform: scale(0.95);
        }

        .checkout-btn {
            background: linear-gradient(135deg, #38d9a9 0%, #20bf6b 100%);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .checkout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(56, 217, 169, 0.4);
        }

        .continue-btn {
            background: linear-gradient(135deg, #ff6b35 0%, #f9844a 100%);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .continue-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(255, 107, 53, 0.4);
        }

        .floating-decoration {
            position: absolute;
            opacity: 0.05;
            pointer-events: none;
            animation: float 8s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }

        .stagger-1 { animation-delay: 0.1s; }
        .stagger-2 { animation-delay: 0.2s; }
        .stagger-3 { animation-delay: 0.3s; }
        .stagger-4 { animation-delay: 0.4s; }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-orange-50 via-amber-50 to-green-50 font-inter relative overflow-x-hidden">
    <!-- Floating decorations -->
    <div class="floating-decoration text-6xl text-juice-orange top-10 left-10">🥭</div>
    <div class="floating-decoration text-5xl text-juice-green top-20 right-20" style="animation-delay: -2s;">🍍</div>
    <div class="floating-decoration text-4xl text-juice-pink bottom-32 left-16" style="animation-delay: -4s;">🧃</div>
    <div class="floating-decoration text-5xl text-juice-yellow bottom-20 right-24" style="animation-delay: -1s;">🍊</div>

    <div class="container mx-auto px-4 py-8 relative z-10" x-data="cartData()">
        <!-- Header -->
        <div class="text-center mb-12 opacity-0 animate-fadeInUp">
            <div class="flex items-center justify-center mb-4">
                <div class="w-14 h-14 bg-gradient-to-r from-juice-orange to-orange-400 rounded-2xl flex items-center justify-center text-3xl mr-4 shadow-lg animate-pulse-soft">
                    🛒
                </div>
                <h1 class="text-4xl font-bold text-gray-800">
                    <span class="text-juice-orange">Shopping</span> 
                    <span class="text-juice-green">Cart</span>
                </h1>
            </div>
            <p class="text-gray-600 text-lg">Fresh & healthy juices ready for checkout</p>
        </div>

        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Cart Items Section -->
                <div class="lg:col-span-2">
                    <div class="glass-effect rounded-2xl p-6 shadow-xl opacity-0 animate-fadeInUp stagger-1">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                            <span class="text-juice-orange mr-2">🧃</span>
                            Your Items (<span x-text="items.length"></span>)
                        </h2>

                        <!-- Cart Items -->
                        <div class="space-y-4">
                            <template x-for="(item, index) in items" :key="item.id">
                                <div class="cart-item bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
                                    <div class="flex items-center space-x-4">
                                        <!-- Product Image -->
                                        <div class="w-20 h-20 bg-gradient-to-br from-orange-100 to-green-100 rounded-xl flex items-center justify-center text-3xl shadow-sm">
                                            <span x-text="item.emoji"></span>
                                        </div>

                                        <!-- Product Details -->
                                        <div class="flex-1">
                                            <h3 class="font-semibold text-gray-800 text-lg" x-text="item.name"></h3>
                                            <p class="text-gray-500 text-sm" x-text="item.description"></p>
                                            <div class="flex items-center mt-2">
                                                <span class="text-juice-orange font-bold text-lg">$<span x-text="item.price.toFixed(2)"></span></span>
                                                <span class="text-gray-400 text-sm ml-2">per bottle</span>
                                            </div>
                                        </div>

                                        <!-- Quantity Controls -->
                                        <div class="flex items-center space-x-3">
                                            <button @click="updateQuantity(index, item.quantity - 1)" 
                                                    class="quantity-btn w-8 h-8 bg-gray-100 hover:bg-red-100 rounded-full flex items-center justify-center text-gray-600 hover:text-red-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                                </svg>
                                            </button>
                                            
                                            <span class="w-12 text-center font-semibold text-gray-800" x-text="item.quantity"></span>
                                            
                                            <button @click="updateQuantity(index, item.quantity + 1)" 
                                                    class="quantity-btn w-8 h-8 bg-gray-100 hover:bg-green-100 rounded-full flex items-center justify-center text-gray-600 hover:text-green-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                </svg>
                                            </button>
                                        </div>

                                        <!-- Item Total -->
                                        <div class="text-right">
                                            <div class="font-bold text-xl text-gray-800">$<span x-text="(item.price * item.quantity).toFixed(2)"></span></div>
                                            <button @click="removeItem(index)" 
                                                    class="text-red-500 hover:text-red-700 text-sm mt-1 transition-colors duration-200">
                                                Remove
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>

                        <!-- Empty Cart Message -->
                        <div x-show="items.length === 0" class="text-center py-12">
                            <div class="text-6xl mb-4 animate-bounceIn">🛒</div>
                            <h3 class="text-xl font-semibold text-gray-600 mb-2">Your cart is empty</h3>
                            <p class="text-gray-500">Add some fresh juices to get started!</p>
                        </div>
                    </div>
                </div>

                <!-- Order Summary Section -->
                <div class="lg:col-span-1">
                    <div class="glass-effect rounded-2xl p-6 shadow-xl opacity-0 animate-fadeInUp stagger-2 sticky top-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                            <span class="text-juice-green mr-2">💰</span>
                            Order Summary
                        </h2>

                        <!-- Summary Details -->
                        <div class="space-y-4 mb-6">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="font-semibold text-gray-800">$<span x-text="subtotal.toFixed(2)"></span></span>
                            </div>
                            
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Delivery Fee</span>
                                <span class="font-semibold text-gray-800" x-text="subtotal >= 25 ? 'FREE' : '$4.99'"></span>
                            </div>
                            
                            <div class="flex justify-between items-center text-green-600" x-show="subtotal >= 25">
                                <span class="text-sm">🎉 Free delivery unlocked!</span>
                            </div>
                            
                            <div class="border-t border-gray-200 pt-4">
                                <div class="flex justify-between items-center text-lg font-bold">
                                    <span class="text-gray-800">Total</span>
                                    <span class="text-juice-orange text-2xl">$<span x-text="total.toFixed(2)"></span></span>
                                </div>
                            </div>
                        </div>

                        <!-- Promo Code -->
                        <div class="mb-6">
                            <div class="flex space-x-2">
                                <input type="text" 
                                       placeholder="Promo code" 
                                       class="flex-1 px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-juice-orange focus:border-transparent">
                                <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors duration-200 font-medium">
                                    Apply
                                </button>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="space-y-3">
                            <button class="checkout-btn w-full py-4 text-white font-bold rounded-xl text-lg shadow-lg" 
                                    x-show="items.length > 0"
                                    @click="checkout()">
                                🚀 Proceed to Checkout
                            </button>
                            
                            <button class="continue-btn w-full py-3 text-white font-semibold rounded-xl shadow-lg"
                                    @click="continueShopping()">
                                🛍️ Continue Shopping
                            </button>
                        </div>

                        <!-- Trust Badges -->
                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <div class="grid grid-cols-2 gap-4 text-center">
                                <div class="text-center">
                                    <div class="text-2xl mb-1">🔒</div>
                                    <div class="text-xs text-gray-500">Secure Payment</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl mb-1">🚚</div>
                                    <div class="text-xs text-gray-500">Fast Delivery</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl mb-1">🌱</div>
                                    <div class="text-xs text-gray-500">100% Organic</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl mb-1">💝</div>
                                    <div class="text-xs text-gray-500">Money Back</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recommended Products -->
        <div class="max-w-6xl mx-auto mt-12 opacity-0 animate-fadeInUp stagger-3">
            <div class="glass-effect rounded-2xl p-6 shadow-xl">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                    <span class="text-juice-pink mr-2">⭐</span>
                    You might also like
                </h2>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <template x-for="product in recommendedProducts" :key="product.id">
                        <div class="bg-white rounded-xl p-4 text-center hover:shadow-lg transition-all duration-300 cursor-pointer border border-gray-100"
                             @click="addRecommended(product)">
                            <div class="w-16 h-16 bg-gradient-to-br from-orange-100 to-green-100 rounded-xl flex items-center justify-center text-3xl mx-auto mb-3">
                                <span x-text="product.emoji"></span>
                            </div>
                            <h3 class="font-semibold text-gray-800 text-sm mb-1" x-text="product.name"></h3>
                            <p class="text-juice-orange font-bold">$<span x-text="product.price.toFixed(2)"></span></p>
                            <button class="mt-2 px-3 py-1 bg-juice-orange text-white text-xs rounded-lg hover:bg-orange-600 transition-colors">
                                Add to Cart
                            </button>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>

    <script>
        function cartData() {
            return {
                items: [
                    {
                        id: 1,
                        name: "Tropical Paradise",
                        description: "Mango, Pineapple & Passion Fruit",
                        price: 8.99,
                        quantity: 2,
                        emoji: "🥭"
                    },
                    {
                        id: 2,
                        name: "Green Goddess",
                        description: "Spinach, Apple & Cucumber",
                        price: 7.99,
                        quantity: 1,
                        emoji: "🥬"
                    },
                    {
                        id: 3,
                        name: "Berry Blast",
                        description: "Mixed Berries & Pomegranate",
                        price: 9.99,
                        quantity: 3,
                        emoji: "🫐"
                    }
                ],
                
                recommendedProducts: [
                    { id: 4, name: "Citrus Sunrise", price: 8.49, emoji: "🍊" },
                    { id: 5, name: "Carrot Ginger", price: 7.49, emoji: "🥕" },
                    { id: 6, name: "Watermelon Fresh", price: 6.99, emoji: "🍉" },
                    { id: 7, name: "Apple Celery", price: 7.99, emoji: "🍎" }
                ],

                get subtotal() {
                    return this.items.reduce((sum, item) => sum + (item.price * item.quantity), 0);
                },

                get deliveryFee() {
                    return this.subtotal >= 25 ? 0 : 4.99;
                },

                get total() {
                    return this.subtotal + this.deliveryFee;
                },

                updateQuantity(index, newQuantity) {
                    if (newQuantity <= 0) {
                        this.removeItem(index);
                    } else {
                        this.items[index].quantity = newQuantity;
                        this.animateUpdate();
                    }
                },

                removeItem(index) {
                    // Add shake animation before removing
                    const cartItem = document.querySelectorAll('.cart-item')[index];
                    if (cartItem) {
                        cartItem.classList.add('animate-shake');
                        setTimeout(() => {
                            this.items.splice(index, 1);
                        }, 500);
                    }
                },

                addRecommended(product) {
                    const existingItem = this.items.find(item => item.id === product.id);
                    if (existingItem) {
                        existingItem.quantity++;
                    } else {
                        this.items.push({
                            ...product,
                            description: "Freshly squeezed daily",
                            quantity: 1
                        });
                    }
                    this.animateAdd();
                },

                animateUpdate() {
                    // Add pulse animation to cart
                    const cartIcon = document.querySelector('.animate-pulse-soft');
                    if (cartIcon) {
                        cartIcon.classList.add('animate-bounceIn');
                        setTimeout(() => {
                            cartIcon.classList.remove('animate-bounceIn');
                        }, 600);
                    }
                },

                animateAdd() {
                    // Show added to cart feedback
                    this.showNotification('Added to cart! 🎉');
                    this.animateUpdate();
                },

                showNotification(message) {
                    // Create a simple notification
                    const notification = document.createElement('div');
                    notification.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 animate-slideInRight';
                    notification.textContent = message;
                    document.body.appendChild(notification);
                    
                    setTimeout(() => {
                        notification.style.opacity = '0';
                        setTimeout(() => {
                            document.body.removeChild(notification);
                        }, 300);
                    }, 2000);
                },

                checkout() {
                    this.showNotification('Redirecting to checkout... 🚀');
                    // Here you would redirect to actual checkout
                    setTimeout(() => {
                        console.log('Proceeding to checkout with items:', this.items);
                    }, 1000);
                },

                continueShopping() {
                    this.showNotification('Redirecting to products... 🛍️');
                    // Here you would redirect to products page
                    setTimeout(() => {
                        console.log('Continue shopping');
                    }, 1000);
                }
            }
        }

        // Initialize animations when page loads
        document.addEventListener('DOMContentLoaded', function() {
            // Trigger staggered animations
            const elements = document.querySelectorAll('.opacity-0');
            elements.forEach((el, index) => {
                setTimeout(() => {
                    el.classList.remove('opacity-0');
                    el.classList.add('animate-fadeInUp');
                }, index * 200);
            });
        });
    </script>
</body>
</html>

</x-app-layout>