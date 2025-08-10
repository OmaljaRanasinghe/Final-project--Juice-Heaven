<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.3);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.1);
    }
    
    .glass-card-strong {
        background: rgba(255, 255, 255, 0.4);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.25);
        box-shadow: 0 12px 40px 0 rgba(31, 38, 135, 0.15);
    }
    
    .juice-bottle {
        background: linear-gradient(145deg, #f8f9fa, #ffffff);
        border-radius: 20px 20px 30px 30px;
        position: relative;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    
    .juice-bottle::before {
        content: '';
        position: absolute;
        top: -6px;
        left: 50%;
        transform: translateX(-50%);
        width: 24px;
        height: 12px;
        background: linear-gradient(145deg, #e9ecef, #f8f9fa);
        border-radius: 4px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    
    .red-juice { 
        background: linear-gradient(145deg, #ff6b6b, #ee5a5a);
        box-shadow: 0 8px 25px rgba(255, 107, 107, 0.3);
    }
    .green-juice { 
        background: linear-gradient(145deg, #51cf66, #40c057);
        box-shadow: 0 8px 25px rgba(81, 207, 102, 0.3);
    }
    .orange-juice { 
        background: linear-gradient(145deg, #ffa726, #ff9800);
        box-shadow: 0 8px 25px rgba(255, 167, 38, 0.3);
    }
    .purple-juice { 
        background: linear-gradient(145deg, #9c88ff, #7c69ef);
        box-shadow: 0 8px 25px rgba(156, 136, 255, 0.3);
    }
    .blue-juice {
        background: linear-gradient(145deg, #74c0fc, #339af0);
        box-shadow: 0 8px 25px rgba(116, 192, 252, 0.3);
    }
    .pink-juice {
        background: linear-gradient(145deg, #faa2c1, #e64980);
        box-shadow: 0 8px 25px rgba(250, 162, 193, 0.3);
    }
    
    .star-rating {
        color: #ffd700;
    }
    
    .animate-float {
        animation: float 4s ease-in-out infinite;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-15px) rotate(2deg); }
    }
    
    .leaf-decoration {
        position: fixed;
        opacity: 0.6;
        pointer-events: none;
        z-index: 0;
    }
    
    .payment-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(102, 126, 234, 0.3);
    }
    
    .promo-card {
        background: linear-gradient(135deg, #ff9a56 0%, #ff6b35 100%);
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(255, 154, 86, 0.3);
    }
    
    .elegant-scroll::-webkit-scrollbar {
        width: 6px;
    }
    
    .elegant-scroll::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
    }
    
    .elegant-scroll::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.3);
        border-radius: 10px;
    }
    
    .elegant-scroll::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.5);
    }
    
    .hover-lift {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    
    .hover-lift:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }
    
    .product-card {
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .product-card:hover {
        border: 1px solid rgba(255, 255, 255, 0.4);
        transform: translateY(-5px);
    }
    
    .sidebar-fixed {
        position: sticky;
        top: 2rem;
        height: calc(100vh - 4rem);
    }
    
    .main-content {
        min-height: 200vh;
    }
    
    .scroll-content {
        overflow-y: auto;
        height: 100%;
    }
    
    .category-tag {
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }
    
    .category-tag:hover {
        transform: scale(1.05);
    }
    
    .juice-glow {
        position: relative;
    }
    
    .juice-glow::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 120%;
        height: 120%;
        transform: translate(-50%, -50%);
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        border-radius: 50%;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .juice-glow:hover::after {
        opacity: 1;
    }
</style>

<x-app-layout>
    <!-- Floating Decoration Elements -->
    <div class="leaf-decoration text-4xl animate-float" style="top: 15%; left: 8%; animation-delay: 0s;">🍃</div>
    <div class="leaf-decoration text-3xl animate-float" style="top: 25%; right: 12%; animation-delay: 1s;">🌿</div>
    <div class="leaf-decoration text-2xl animate-float" style="top: 60%; left: 5%; animation-delay: 2s;">🍊</div>
    <div class="leaf-decoration text-3xl animate-float" style="bottom: 20%; right: 15%; animation-delay: 1.5s;">🥝</div>
    <div class="leaf-decoration text-2xl animate-float" style="top: 80%; left: 10%; animation-delay: 0.5s;">🫐</div>
    <div class="leaf-decoration text-2xl animate-float" style="top: 40%; right: 5%; animation-delay: 2.5s;">🍓</div>
    <div class="leaf-decoration text-3xl animate-float" style="bottom: 50%; left: 15%; animation-delay: 3s;">🥭</div>

    <div class="relative z-10 container mx-auto px-8 py-8">
        <div class="grid grid-cols-12 gap-8">
            
            <!-- Left Sidebar - Fixed -->
            <div class="col-span-2 sidebar-fixed">
                <div class="scroll-content elegant-scroll space-y-6">
                    <!-- Logo -->
                    <div class="glass-card-strong rounded-3xl p-8 text-center hover-lift">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-400 via-green-500 to-green-600 rounded-2xl mx-auto mb-4 flex items-center justify-center shadow-lg">
                            <i class="fas fa-seedling text-white text-2xl"></i>
                        </div>
                        <h2 class="text-xl font-bold text-gray-800 mb-1">JUICE</h2>
                        <h2 class="text-xl font-bold bg-gradient-to-r from-green-500 to-green-600 bg-clip-text text-transparent">FRESH</h2>
                        <p class="text-xs text-gray-600 mt-2 opacity-75">Premium Quality</p>
                    </div>

                    <!-- App Icons -->
                    <div class="space-y-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center text-white shadow-lg hover-lift cursor-pointer">
                            <i class="fab fa-figma text-xl"></i>
                        </div>
                        <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center text-white shadow-lg hover-lift cursor-pointer">
                            <i class="fab fa-adobe text-xl"></i>
                        </div>
                    </div>

                    <!-- Fresh Juice Promo -->
                    <div class="glass-card rounded-3xl p-6 bg-gradient-to-br from-green-100 via-green-50 to-emerald-100 hover-lift">
                        <div class="text-center">
                            <div class="text-7xl mb-3 animate-float">🥤</div>
                            <h3 class="font-bold text-green-800 text-xl mb-1">JUICE</h3>
                            <h3 class="font-bold bg-gradient-to-r from-green-600 to-emerald-600 bg-clip-text text-transparent text-xl">FRESH</h3>
                            <p class="text-xs text-green-700 mt-3 mb-4 leading-relaxed">Premium fresh juice delivered daily to your doorstep</p>
                            <button class="w-full bg-gradient-to-r from-green-500 to-green-600 text-white py-3 px-4 rounded-2xl text-sm font-semibold hover:from-green-600 hover:to-green-700 transition-all duration-300 shadow-lg hover:shadow-xl">
                                Explore Fresh
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Area - Scrollable -->
            <div class="col-span-7 main-content">
                <div class="space-y-8">
                    
                    <!-- Welcome Header -->
                    <div class="glass-card-strong rounded-3xl p-8 hover-lift">
                        <div class="flex items-center justify-between">
                            <div>
                                <h1 class="text-3xl font-bold text-gray-800 mb-2">Welcome Back,</h1>
                                <h2 class="text-4xl font-bold bg-gradient-to-r from-green-500 via-emerald-500 to-teal-500 bg-clip-text text-transparent mb-2">JUICE FRESH</h2>
                                <p class="text-gray-600 text-lg">Discover healthy juices at premium quality.</p>
                            </div>
                            <div class="flex space-x-4">
                                <button class="w-12 h-12 bg-white/70 backdrop-blur-sm rounded-2xl flex items-center justify-center shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-110">
                                    <i class="fas fa-search text-gray-600"></i>
                                </button>
                                <button class="w-12 h-12 bg-white/70 backdrop-blur-sm rounded-2xl flex items-center justify-center shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-110">
                                    <i class="fas fa-heart text-red-500"></i>
                                </button>
                                <button class="w-12 h-12 bg-white/70 backdrop-blur-sm rounded-2xl flex items-center justify-center shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-110">
                                    <i class="fas fa-bell text-yellow-500"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Featured Products Grid -->
                    <div class="grid grid-cols-2 gap-6">
                        
                        <!-- Strawberry Juice -->
                        <div class="glass-card rounded-3xl p-8 product-card hover-lift group">
                            <div class="flex items-center justify-between mb-6">
                                <div class="relative juice-glow">
                                    <div class="juice-bottle w-20 h-28 red-juice mx-auto mb-3 animate-float group-hover:scale-110 transition-transform duration-300"></div>
                                    <div class="absolute -top-3 -right-3">
                                        <button class="w-8 h-8 bg-white/80 backdrop-blur-sm rounded-full flex items-center justify-center shadow-lg group-hover:scale-125 transition-all duration-300">
                                            <i class="fas fa-heart text-red-500 text-sm"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="flex-1 ml-6">
                                    <h3 class="font-bold text-gray-800 text-xl mb-2">Strawberry Delight</h3>
                                    <div class="flex items-center mb-3">
                                        <div class="flex star-rating text-base mr-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="text-gray-500 text-sm">(4.9)</span>
                                    </div>
                                    <p class="text-3xl font-bold bg-gradient-to-r from-green-500 to-emerald-500 bg-clip-text text-transparent">$5.60</p>
                                    <p class="text-gray-500 text-sm mt-2">Fresh strawberry blend</p>
                                </div>
                            </div>
                            <button class="w-full bg-white/80 backdrop-blur-sm text-gray-800 py-4 px-6 rounded-2xl font-semibold hover:bg-white transition-all duration-300 shadow-lg hover:shadow-xl group-hover:scale-105">
                                <i class="fas fa-plus mr-2"></i>Add to Cart
                            </button>
                        </div>

                        <!-- Kiwi Juice -->
                        <div class="glass-card rounded-3xl p-8 product-card hover-lift group">
                            <div class="flex items-center justify-between mb-6">
                                <div class="relative juice-glow">
                                    <div class="juice-bottle w-20 h-28 green-juice mx-auto mb-3 animate-float group-hover:scale-110 transition-transform duration-300" style="animation-delay: 0.5s;"></div>
                                    <div class="absolute -top-3 -right-3">
                                        <button class="w-8 h-8 bg-white/80 backdrop-blur-sm rounded-full flex items-center justify-center shadow-lg group-hover:scale-125 transition-all duration-300">
                                            <i class="fas fa-heart text-gray-400 text-sm hover:text-green-500 transition-colors"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="flex-1 ml-6">
                                    <h3 class="font-bold text-gray-800 text-xl mb-2">Kiwi Paradise</h3>
                                    <div class="flex items-center mb-3">
                                        <div class="flex star-rating text-base mr-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="text-gray-500 text-sm">(4.8)</span>
                                    </div>
                                    <p class="text-3xl font-bold bg-gradient-to-r from-green-500 to-emerald-500 bg-clip-text text-transparent">$5.60</p>
                                    <p class="text-gray-500 text-sm mt-2">Exotic kiwi blend</p>
                                </div>
                            </div>
                            <button class="w-full bg-white/80 backdrop-blur-sm text-gray-800 py-4 px-6 rounded-2xl font-semibold hover:bg-white transition-all duration-300 shadow-lg hover:shadow-xl group-hover:scale-105">
                                <i class="fas fa-plus mr-2"></i>Add to Cart
                            </button>
                        </div>

                        <!-- Promo Banner -->
                        <div class="col-span-2 promo-card p-8 text-white relative overflow-hidden hover-lift group">
                            <div class="relative z-10">
                                <h3 class="text-3xl font-bold mb-3">FLAT 10% OFF</h3>
                                <h4 class="text-2xl font-semibold mb-4 text-orange-100">ORANGE JUICE SPECIAL</h4>
                                <p class="text-orange-100 mb-6 text-lg">Limited time offer on fresh orange juice collection</p>
                                <button class="bg-white text-orange-600 px-8 py-4 rounded-2xl font-semibold hover:bg-orange-50 transition-all duration-300 shadow-lg hover:shadow-xl group-hover:scale-105">
                                    <i class="fas fa-tag mr-2"></i>Claim Offer
                                </button>
                            </div>
                            <div class="absolute right-8 top-1/2 transform -translate-y-1/2">
                                <div class="juice-bottle w-24 h-32 orange-juice animate-float group-hover:scale-110 transition-transform duration-300" style="animation-delay: 1s;"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Fresh Juices Section -->
                    <div class="glass-card-strong rounded-3xl p-8 hover-lift">
                        <div class="flex items-center justify-between mb-8">
                            <div>
                                <h3 class="text-2xl font-bold text-gray-800 mb-2">Fresh Juices Collection</h3>
                                <p class="text-gray-600">Handpicked premium quality juices</p>
                            </div>
                            <div class="flex space-x-3">
                                <button class="category-tag px-6 py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-2xl text-sm font-semibold shadow-lg">
                                    <i class="fas fa-apple-alt mr-2"></i>FRUITS
                                </button>
                                <button class="category-tag px-6 py-3 bg-white/70 text-gray-600 rounded-2xl text-sm font-semibold hover:bg-white transition-all duration-300 shadow-lg">
                                    <i class="fas fa-carrot mr-2"></i>Vegetables
                                </button>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-4 gap-6">
                            <!-- Kiwi Juice Small -->
                            <div class="text-center group cursor-pointer hover-lift">
                                <div class="relative juice-glow">
                                    <div class="juice-bottle w-16 h-20 green-juice mx-auto mb-4 group-hover:scale-110 transition-all duration-300"></div>
                                    <button class="absolute -top-2 -right-2 w-6 h-6 bg-white/80 backdrop-blur-sm rounded-full flex items-center justify-center shadow-lg opacity-0 group-hover:opacity-100 transition-all duration-300">
                                        <i class="fas fa-heart text-gray-400 text-xs hover:text-green-500"></i>
                                    </button>
                                </div>
                                <h4 class="font-semibold text-gray-800 text-base mb-1">Kiwi Fresh</h4>
                                <p class="text-green-600 font-bold text-lg">$5.60</p>
                                <div class="flex star-rating text-sm justify-center mt-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>

                            <!-- Strawberry Juice Small -->
                            <div class="text-center group cursor-pointer hover-lift">
                                <div class="relative juice-glow">
                                    <div class="juice-bottle w-16 h-20 red-juice mx-auto mb-4 group-hover:scale-110 transition-all duration-300"></div>
                                    <button class="absolute -top-2 -right-2 w-6 h-6 bg-white/80 backdrop-blur-sm rounded-full flex items-center justify-center shadow-lg opacity-0 group-hover:opacity-100 transition-all duration-300">
                                        <i class="fas fa-heart text-red-500 text-xs"></i>
                                    </button>
                                </div>
                                <h4 class="font-semibold text-gray-800 text-base mb-1">Strawberry</h4>
                                <p class="text-green-600 font-bold text-lg">$5.60</p>
                                <div class="flex star-rating text-sm justify-center mt-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>

                            <!-- Grape Juice Small -->
                            <div class="text-center group cursor-pointer hover-lift">
                                <div class="relative juice-glow">
                                    <div class="juice-bottle w-16 h-20 purple-juice mx-auto mb-4 group-hover:scale-110 transition-all duration-300"></div>
                                    <button class="absolute -top-2 -right-2 w-6 h-6 bg-white/80 backdrop-blur-sm rounded-full flex items-center justify-center shadow-lg opacity-0 group-hover:opacity-100 transition-all duration-300">
                                        <i class="fas fa-heart text-gray-400 text-xs hover:text-purple-500"></i>
                                    </button>
                                </div>
                                <h4 class="font-semibold text-gray-800 text-base mb-1">Grape Juice</h4>
                                <p class="text-green-600 font-bold text-lg">$6.20</p>
                                <div class="flex star-rating text-sm justify-center mt-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>

                            <!-- Blueberry Juice Small -->
                            <div class="text-center group cursor-pointer hover-lift">
                                <div class="relative juice-glow">
                                    <div class="juice-bottle w-16 h-20 blue-juice mx-auto mb-4 group-hover:scale-110 transition-all duration-300"></div>
                                    <button class="absolute -top-2 -right-2 w-6 h-6 bg-white/80 backdrop-blur-sm rounded-full flex items-center justify-center shadow-lg opacity-0 group-hover:opacity-100 transition-all duration-300">
                                        <i class="fas fa-heart text-gray-400 text-xs hover:text-blue-500"></i>
                                    </button>
                                </div>
                                <h4 class="font-semibold text-gray-800 text-base mb-1">Blueberry</h4>
                                <p class="text-green-600 font-bold text-lg">$7.80</p>
                                <div class="flex star-rating text-sm justify-center mt-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Premium Collection Section -->
                    <div class="glass-card-strong rounded-3xl p-8 hover-lift">
                        <div class="flex items-center justify-between mb-8">
                            <div>
                                <h3 class="text-2xl font-bold text-gray-800 mb-2">Premium Collection</h3>
                                <p class="text-gray-600">Exclusive blends for connoisseurs</p>
                            </div>
                            <button class="px-6 py-3 bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-2xl font-semibold hover:from-purple-600 hover:to-pink-600 transition-all duration-300 shadow-lg">
                                <i class="fas fa-crown mr-2"></i>View All
                            </button>
                        </div>
                        
                        <div class="grid grid-cols-3 gap-6">
                            <!-- Mango Passion -->
                            <div class="glass-card rounded-2xl p-6 text-center group hover-lift">
                                <div class="relative juice-glow">
                                    <div class="juice-bottle w-18 h-24 orange-juice mx-auto mb-4 group-hover:scale-110 transition-all duration-300"></div>
                                </div>
                                <h4 class="font-bold text-gray-800 text-lg mb-2">Mango Passion</h4>
                                <p class="text-gray-500 text-sm mb-3">Tropical blend with passion fruit</p>
                                <p class="text-green-600 font-bold text-xl">$8.90</p>
                                <button class="w-full mt-4 bg-gradient-to-r from-green-400 to-green-500 text-white py-2 px-4 rounded-xl font-semibold hover:from-green-500 hover:to-green-600 transition-all duration-300">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Health Benefits Section -->
                    <div class="glass-card-strong rounded-3xl p-8 hover-lift">
                        <div class="text-center mb-8">
                            <h3 class="text-2xl font-bold text-gray-800 mb-2">Why Choose Our Juices?</h3>
                            <p class="text-gray-600">Health benefits that make a difference</p>
                        </div>
                        
                        <div class="grid grid-cols-3 gap-6">
                            <div class="text-center group">
                                <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-green-500 rounded-2xl mx-auto mb-4 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <i class="fas fa-leaf text-white text-2xl"></i>
                                </div>
                                <h4 class="font-bold text-gray-800 mb-2">100% Organic</h4>
                                <p class="text-gray-600 text-sm">Certified organic fruits and vegetables</p>
                            </div>
                            
                            <div class="text-center group">
                                <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-blue-500 rounded-2xl mx-auto mb-4 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <i class="fas fa-snowflake text-white text-2xl"></i>
                                </div>
                                <h4 class="font-bold text-gray-800 mb-2">Cold Pressed</h4>
                                <p class="text-gray-600 text-sm">Maximum nutrient retention</p>
                            </div>
                            
                            <div class="text-center group">
                                <div class="w-16 h-16 bg-gradient-to-br from-purple-400 to-purple-500 rounded-2xl mx-auto mb-4 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <i class="fas fa-heart text-white text-2xl"></i>
                                </div>
                                <h4 class="font-bold text-gray-800 mb-2">Heart Healthy</h4>
                                <p class="text-gray-600 text-sm">Boost your cardiovascular health</p>
                            </div>
                        </div>
                    </div>

                    <!-- Customer Reviews Section -->
                    <div class="glass-card-strong rounded-3xl p-8 hover-lift">
                        <div class="text-center mb-8">
                            <h3 class="text-2xl font-bold text-gray-800 mb-2">What Our Customers Say</h3>
                            <p class="text-gray-600">Real reviews from satisfied customers</p>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-6">
                            <div class="glass-card rounded-2xl p-6 hover-lift">
                                <div class="flex items-center mb-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-pink-400 to-pink-500 rounded-full flex items-center justify-center text-white font-bold mr-4">
                                        S
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-gray-800">Sarah Johnson</h4>
                                        <div class="flex star-rating text-sm">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-600 italic">"The best juice bar in town! Fresh, healthy, and delicious. I order daily now."</p>
                            </div>
                            
                            <div class="glass-card rounded-2xl p-6 hover-lift">
                                <div class="flex items-center mb-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-500 rounded-full flex items-center justify-center text-white font-bold mr-4">
                                        M
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-gray-800">Mike Chen</h4>
                                        <div class="flex star-rating text-sm">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-600 italic">"Amazing quality and taste. The green detox juice helped me feel more energetic!"</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar - Fixed -->
            <div class="col-span-3 sidebar-fixed">
                <div class="scroll-content elegant-scroll space-y-6">
                    
                    <!-- Java Plum Juice Detail -->
                    <div class="glass-card-strong rounded-3xl p-8 hover-lift">
                        <div class="text-center mb-6">
                            <div class="relative">
                                <div class="juice-bottle w-24 h-32 purple-juice mx-auto mb-6 animate-float"></div>
                                <div class="absolute top-2 right-6">
                                    <button class="w-10 h-10 bg-white/80 backdrop-blur-sm rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition-all duration-300">
                                        <i class="fas fa-heart text-purple-500"></i>
                                    </button>
                                </div>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-3">Java Plum Juice</h3>
                            <div class="flex star-rating justify-center mb-3 text-lg">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="text-gray-600 text-base mb-6 leading-relaxed">Long lasting summer flavor drink with a light & refreshing taste that energizes your day</p>
                        </div>
                        
                        <div class="space-y-6">
                            <div>
                                <label class="block text-base font-semibold text-gray-700 mb-4">Quantity Selection</label>
                                <div class="flex items-center space-x-4">
                                    <span class="text-base text-gray-600 font-medium">500 ml</span>
                                    <div class="flex-1">
                                        <div class="flex justify-between text-sm text-gray-500 mb-2">
                                            <span>1 Hr</span>
                                            <span>2 Hr</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-3">
                                            <div class="bg-gradient-to-r from-orange-400 to-orange-500 h-3 rounded-full shadow-lg" style="width: 65%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex items-center justify-between">
                                <button class="w-12 h-12 bg-white/80 backdrop-blur-sm rounded-2xl flex items-center justify-center shadow-lg hover:scale-110 transition-all duration-300">
                                    <i class="fas fa-heart text-gray-400 hover:text-purple-500 transition-colors"></i>
                                </button>
                                <button class="flex-1 bg-gradient-to-r from-green-500 to-green-600 text-white py-4 px-8 rounded-2xl font-semibold mx-4 hover:from-green-600 hover:to-green-700 transition-all duration-300 shadow-lg hover:shadow-xl">
                                    Add to Cart
                                </button>
                            </div>
                            
                            <div class="text-center">
                                <p class="text-4xl font-bold bg-gradient-to-r from-green-500 to-emerald-500 bg-clip-text text-transparent">$5.60</p>
                                <p class="text-gray-500 text-sm mt-1">Per bottle</p>
                            </div>
                        </div>
                    </div>

                    <!-- Shopping Cart -->
                    <div class="glass-card-strong rounded-3xl p-8 hover-lift">
                        <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                            <i class="fas fa-shopping-cart mr-3 text-green-600"></i>
                            Shopping Cart
                            <span class="ml-auto bg-red-500 text-white text-xs px-2 py-1 rounded-full">3</span>
                        </h3>
                        
                        <div class="space-y-5">
                            <!-- Cart Item 1 -->
                            <div class="flex items-center space-x-4 p-4 bg-white/50 rounded-2xl hover:bg-white/70 transition-all duration-300">
                                <div class="juice-bottle w-10 h-14 red-juice"></div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-800 text-base">Strawberry Juice</h4>
                                    <p class="text-green-600 font-bold text-lg">$5.60</p>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <span class="text-orange-600 bg-orange-100 px-3 py-1 rounded-full text-sm font-bold">01</span>
                                    <button class="w-8 h-8 bg-red-100 text-red-600 rounded-full flex items-center justify-center text-sm hover:bg-red-200 transition-colors">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Cart Item 2 -->
                            <div class="flex items-center space-x-4 p-4 bg-white/50 rounded-2xl hover:bg-white/70 transition-all duration-300">
                                <div class="juice-bottle w-10 h-14 orange-juice"></div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-800 text-base">Root Reboot</h4>
                                    <p class="text-green-600 font-bold text-lg">$7.25</p>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <span class="text-orange-600 bg-orange-100 px-3 py-1 rounded-full text-sm font-bold">02</span>
                                    <button class="w-8 h-8 bg-red-100 text-red-600 rounded-full flex items-center justify-center text-sm hover:bg-red-200 transition-colors">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Cart Item 3 -->
                            <div class="flex items-center space-x-4 p-4 bg-white/50 rounded-2xl hover:bg-white/70 transition-all duration-300">
                                <div class="juice-bottle w-10 h-14 green-juice"></div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-800 text-base">Kiwi Juice</h4>
                                    <p class="text-green-600 font-bold text-lg">$5.60</p>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <span class="text-orange-600 bg-orange-100 px-3 py-1 rounded-full text-sm font-bold">01</span>
                                    <button class="w-8 h-8 bg-red-100 text-red-600 rounded-full flex items-center justify-center text-sm hover:bg-red-200 transition-colors">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="border-t border-white/30 mt-6 pt-6">
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-gray-600">Subtotal:</span>
                                <span class="font-bold text-gray-800">$18.45</span>
                            </div>
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-gray-600">Delivery:</span>
                                <span class="font-bold text-green-600">Free</span>
                            </div>
                            <div class="flex justify-between items-center text-lg">
                                <span class="font-bold text-gray-800">Total:</span>
                                <span class="font-bold text-green-600">$18.45</span>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Section -->
                    <div class="payment-card p-8 text-white hover-lift">
                        <h3 class="text-xl font-bold mb-6 flex items-center">
                            <i class="fas fa-credit-card mr-3"></i>
                            Make Payment
                        </h3>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center">
                                <span className="text-blue-100">Grand Total</span>
                                <span class="font-bold text-2xl">$26.60</span>
                            </div>
                            <p class="text-blue-100 text-base leading-relaxed">Please select your preferred payment method below</p>
                            
                            <div class="space-y-4 mt-6">
                                <label class="flex items-center space-x-4 cursor-pointer p-3 rounded-xl hover:bg-white/10 transition-all duration-300">
                                    <input type="radio" name="payment" class="form-radio text-white w-5 h-5" checked>
                                    <span class="text-lg">Save Cards</span>
                                </label>
                                <div class="pl-12 text-base text-blue-100 flex items-center justify-between">
                                    <span>4552 5665 1268 1485</span>
                                    <i class="fab fa-cc-mastercard text-2xl"></i>
                                </div>
                                
                                <label class="flex items-center space-x-4 cursor-pointer p-3 rounded-xl hover:bg-white/10 transition-all duration-300">
                                    <input type="radio" name="payment" class="form-radio text-white w-5 h-5">
                                    <span class="text-lg">Debit / Credit Card</span>
                                </label>
                                
                                <label class="flex items-center space-x-4 cursor-pointer p-3 rounded-xl hover:bg-white/10 transition-all duration-300">
                                    <input type="radio" name="payment" class="form-radio text-white w-5 h-5">
                                    <span class="text-lg">Bank Transfer</span>
                                </label>
                                
                                <label class="flex items-center space-x-4 cursor-pointer p-3 rounded-xl hover:bg-white/10 transition-all duration-300">
                                    <input type="radio" name="payment" class="form-radio text-white w-5 h-5">
                                    <span class="text-lg">Digital Wallets</span>
                                </label>
                            </div>
                            
                            <button class="w-full bg-gradient-to-r from-green-400 to-green-500 hover:from-green-500 hover:to-green-600 text-white py-4 px-8 rounded-2xl font-semibold mt-8 transition-all duration-300 shadow-lg hover:shadow-xl text-lg">
                                <i class="fas fa-lock mr-2"></i>Secure Payment
                            </button>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="glass-card-strong rounded-3xl p-8 hover-lift">
                        <h3 class="text-xl font-bold text-gray-800 mb-6">Quick Actions</h3>
                        <div class="space-y-4">
                            <button class="w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white py-3 px-6 rounded-2xl font-semibold hover:from-blue-600 hover:to-blue-700 transition-all duration-300 shadow-lg text-left flex items-center">
                                <i class="fas fa-history mr-3"></i>
                                Order History
                            </button>
                            <button class="w-full bg-gradient-to-r from-purple-500 to-purple-600 text-white py-3 px-6 rounded-2xl font-semibold hover:from-purple-600 hover:to-purple-700 transition-all duration-300 shadow-lg text-left flex items-center">
                                <i class="fas fa-star mr-3"></i>
                                Favorites
                            </button>
                            <button class="w-full bg-gradient-to-r from-orange-500 to-orange-600 text-white py-3 px-6 rounded-2xl font-semibold hover:from-orange-600 hover:to-orange-700 transition-all duration-300 shadow-lg text-left flex items-center">
                                <i class="fas fa-gift mr-3"></i>
                                Rewards
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>  

</x-app-layout>

<script>
        // Enhanced interactive animations
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth scroll behavior
            document.documentElement.style.scrollBehavior = 'smooth';
            
            // Add floating animation to leaf decorations with random delays
            const leaves = document.querySelectorAll('.leaf-decoration');
            leaves.forEach((leaf, index) => {
                leaf.style.animationDelay = `${Math.random() * 3}s`;
                leaf.classList.add('animate-float');
            });

            // Enhanced add to cart functionality
            const addToCartButtons = document.querySelectorAll('button');
            addToCartButtons.forEach(button => {
                if (button.textContent.includes('Add to Cart')) {
                    button.addEventListener('click', function(e) {
                        e.preventDefault();
                        
                        // Create success animation
                        const originalContent = this.innerHTML;
                        this.innerHTML = '<i class="fas fa-check mr-2"></i>Added Successfully!';
                        this.classList.add('bg-green-600', 'text-white', 'scale-105');
                        
                        // Add cart bounce animation
                        const cartIcon = document.querySelector('.fa-shopping-cart');
                        if (cartIcon) {
                            cartIcon.classList.add('animate-bounce');
                            setTimeout(() => {
                                cartIcon.classList.remove('animate-bounce');
                            }, 1000);
                        }
                        
                        // Reset button after delay
                        setTimeout(() => {
                            this.innerHTML = originalContent;
                            this.classList.remove('bg-green-600', 'text-white', 'scale-105');
                        }, 2500);
                    });
                }
            });

            // Heart favorite functionality
            const heartButtons = document.querySelectorAll('.fa-heart');
            heartButtons.forEach(heart => {
                heart.parentElement.addEventListener('click', function(e) {
                    e.preventDefault();
                    heart.classList.toggle('text-red-500');
                    heart.classList.toggle('text-gray-400');
                    
                    // Add pulse animation
                    heart.classList.add('animate-pulse');
                    setTimeout(() => {
                        heart.classList.remove('animate-pulse');
                    }, 500);
                });
            });

            // Quantity selector animation
            const quantityBar = document.querySelector('.bg-gradient-to-r.from-orange-400');
            if (quantityBar) {
                let currentWidth = 65;
                quantityBar.addEventListener('click', function() {
                    currentWidth = currentWidth === 65 ? 85 : 65;
                    this.style.width = currentWidth + '%';
                });
            }

            // Smooth scroll animations on scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            // Observe all cards for scroll animations
            const cards = document.querySelectorAll('.glass-card, .glass-card-strong');
            cards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(card);
            });

            // Category filter functionality
            const categoryButtons = document.querySelectorAll('.category-tag');
            categoryButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons
                    categoryButtons.forEach(btn => {
                        btn.classList.remove('bg-gradient-to-r', 'from-orange-500', 'to-orange-600', 'text-white');
                        btn.classList.add('bg-white/70', 'text-gray-600');
                    });
                    
                    // Add active class to clicked button
                    this.classList.add('bg-gradient-to-r', 'from-orange-500', 'to-orange-600', 'text-white');
                    this.classList.remove('bg-white/70', 'text-gray-600');
                });
            });
        });
    </script>