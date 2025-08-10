<x-app-layout>
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-green-400 via-blue-500 to-purple-600 text-white py-20">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-5xl font-bold mb-4">Fresh Juice Paradise</h1>
            <p class="text-xl mb-8">100% Natural, Fresh & Healthy Juices</p>
            <a href="#products" class="bg-white text-blue-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition duration-300">
                Explore Our Juices
            </a>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">Our Fresh Juices</h2>
            
            <!-- Category Filter -->
            <div class="flex justify-center mb-12">
                <div class="flex space-x-4 bg-white rounded-full p-2 shadow-lg">
                    <button class="px-6 py-2 rounded-full bg-blue-600 text-white font-semibold">All</button>
                    <button class="px-6 py-2 rounded-full text-gray-600 hover:bg-gray-100 transition duration-300">Tropical</button>
                    <button class="px-6 py-2 rounded-full text-gray-600 hover:bg-gray-100 transition duration-300">Citrus</button>
                    <button class="px-6 py-2 rounded-full text-gray-600 hover:bg-gray-100 transition duration-300">Berry</button>
                    <button class="px-6 py-2 rounded-full text-gray-600 hover:bg-gray-100 transition duration-300">Green</button>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                <!-- Mango Juice -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
                    <div class="relative">
                        <div class="h-48 bg-gradient-to-br from-yellow-400 to-orange-500 flex items-center justify-center">
                            <span class="text-6xl">🥭</span>
                        </div>
                        <div class="absolute top-4 right-4 bg-green-500 text-white px-2 py-1 rounded-full text-xs font-semibold">
                            Fresh
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gray-800">Mango Juice</h3>
                        <p class="text-gray-600 mb-4">Sweet and creamy tropical mango juice packed with vitamins</p>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-2xl font-bold text-orange-600">$4.99</span>
                            <div class="flex items-center">
                                <span class="text-yellow-400">★★★★★</span>
                                <span class="text-gray-600 ml-1">(4.8)</span>
                            </div>
                        </div>
                        <div class="flex space-x-2 mb-4">
                            <span class="px-2 py-1 bg-orange-100 text-orange-800 text-xs rounded-full">Vitamin A</span>
                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs rounded-full">Tropical</span>
                        </div>
                        <button class="w-full bg-orange-500 text-white py-2 rounded-lg hover:bg-orange-600 transition duration-300 font-semibold">
                            Add to Cart
                        </button>
                    </div>
                </div>

                <!-- Watermelon Juice -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
                    <div class="relative">
                        <div class="h-48 bg-gradient-to-br from-red-400 to-pink-500 flex items-center justify-center">
                            <span class="text-6xl">🍉</span>
                        </div>
                        <div class="absolute top-4 right-4 bg-blue-500 text-white px-2 py-1 rounded-full text-xs font-semibold">
                            Hydrating
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gray-800">Watermelon Juice</h3>
                        <p class="text-gray-600 mb-4">Refreshing and hydrating summer fruit juice</p>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-2xl font-bold text-red-600">$3.99</span>
                            <div class="flex items-center">
                                <span class="text-yellow-400">★★★★☆</span>
                                <span class="text-gray-600 ml-1">(4.6)</span>
                            </div>
                        </div>
                        <div class="flex space-x-2 mb-4">
                            <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">Hydrating</span>
                            <span class="px-2 py-1 bg-red-100 text-red-800 text-xs rounded-full">Summer</span>
                        </div>
                        <button class="w-full bg-red-500 text-white py-2 rounded-lg hover:bg-red-600 transition duration-300 font-semibold">
                            Add to Cart
                        </button>
                    </div>
                </div>

                <!-- Orange Juice -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
                    <div class="relative">
                        <div class="h-48 bg-gradient-to-br from-orange-400 to-yellow-500 flex items-center justify-center">
                            <span class="text-6xl">🍊</span>
                        </div>
                        <div class="absolute top-4 right-4 bg-orange-500 text-white px-2 py-1 rounded-full text-xs font-semibold">
                            Classic
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gray-800">Orange Juice</h3>
                        <p class="text-gray-600 mb-4">Classic citrus juice loaded with Vitamin C</p>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-2xl font-bold text-orange-600">$3.49</span>
                            <div class="flex items-center">
                                <span class="text-yellow-400">★★★★★</span>
                                <span class="text-gray-600 ml-1">(4.9)</span>
                            </div>
                        </div>
                        <div class="flex space-x-2 mb-4">
                            <span class="px-2 py-1 bg-orange-100 text-orange-800 text-xs rounded-full">Vitamin C</span>
                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs rounded-full">Citrus</span>
                        </div>
                        <button class="w-full bg-orange-500 text-white py-2 rounded-lg hover:bg-orange-600 transition duration-300 font-semibold">
                            Add to Cart
                        </button>
                    </div>
                </div>

                <!-- Apple Juice -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
                    <div class="relative">
                        <div class="h-48 bg-gradient-to-br from-red-400 to-green-500 flex items-center justify-center">
                            <span class="text-6xl">🍎</span>
                        </div>
                        <div class="absolute top-4 right-4 bg-green-500 text-white px-2 py-1 rounded-full text-xs font-semibold">
                            Crisp
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gray-800">Apple Juice</h3>
                        <p class="text-gray-600 mb-4">Crisp and sweet apple juice from fresh apples</p>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-2xl font-bold text-red-600">$3.79</span>
                            <div class="flex items-center">
                                <span class="text-yellow-400">★★★★☆</span>
                                <span class="text-gray-600 ml-1">(4.5)</span>
                            </div>
                        </div>
                        <div class="flex space-x-2 mb-4">
                            <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Fiber</span>
                            <span class="px-2 py-1 bg-red-100 text-red-800 text-xs rounded-full">Classic</span>
                        </div>
                        <button class="w-full bg-red-500 text-white py-2 rounded-lg hover:bg-red-600 transition duration-300 font-semibold">
                            Add to Cart
                        </button>
                    </div>
                </div>

                <!-- Green Juice -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
                    <div class="relative">
                        <div class="h-48 bg-gradient-to-br from-green-400 to-lime-500 flex items-center justify-center">
                            <span class="text-6xl">🥬</span>
                        </div>
                        <div class="absolute top-4 right-4 bg-green-600 text-white px-2 py-1 rounded-full text-xs font-semibold">
                            Detox
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gray-800">Green Detox</h3>
                        <p class="text-gray-600 mb-4">Healthy blend of spinach, kale, and green apple</p>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-2xl font-bold text-green-600">$5.99</span>
                            <div class="flex items-center">
                                <span class="text-yellow-400">★★★★☆</span>
                                <span class="text-gray-600 ml-1">(4.4)</span>
                            </div>
                        </div>
                        <div class="flex space-x-2 mb-4">
                            <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Iron</span>
                            <span class="px-2 py-1 bg-lime-100 text-lime-800 text-xs rounded-full">Detox</span>
                        </div>
                        <button class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600 transition duration-300 font-semibold">
                            Add to Cart
                        </button>
                    </div>
                </div>

                <!-- Berry Mix -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
                    <div class="relative">
                        <div class="h-48 bg-gradient-to-br from-purple-400 to-pink-500 flex items-center justify-center">
                            <span class="text-6xl">🫐</span>
                        </div>
                        <div class="absolute top-4 right-4 bg-purple-500 text-white px-2 py-1 rounded-full text-xs font-semibold">
                            Antioxidant
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gray-800">Berry Mix</h3>
                        <p class="text-gray-600 mb-4">Antioxidant-rich blend of blueberries and strawberries</p>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-2xl font-bold text-purple-600">$5.49</span>
                            <div class="flex items-center">
                                <span class="text-yellow-400">★★★★★</span>
                                <span class="text-gray-600 ml-1">(4.7)</span>
                            </div>
                        </div>
                        <div class="flex space-x-2 mb-4">
                            <span class="px-2 py-1 bg-purple-100 text-purple-800 text-xs rounded-full">Antioxidants</span>
                            <span class="px-2 py-1 bg-pink-100 text-pink-800 text-xs rounded-full">Berry</span>
                        </div>
                        <button class="w-full bg-purple-500 text-white py-2 rounded-lg hover:bg-purple-600 transition duration-300 font-semibold">
                            Add to Cart
                        </button>
                    </div>
                </div>

                <!-- Pineapple Juice -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
                    <div class="relative">
                        <div class="h-48 bg-gradient-to-br from-yellow-400 to-orange-400 flex items-center justify-center">
                            <span class="text-6xl">🍍</span>
                        </div>
                        <div class="absolute top-4 right-4 bg-yellow-500 text-white px-2 py-1 rounded-full text-xs font-semibold">
                            Tropical
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gray-800">Pineapple Juice</h3>
                        <p class="text-gray-600 mb-4">Sweet and tangy tropical pineapple juice</p>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-2xl font-bold text-yellow-600">$4.49</span>
                            <div class="flex items-center">
                                <span class="text-yellow-400">★★★★☆</span>
                                <span class="text-gray-600 ml-1">(4.6)</span>
                            </div>
                        </div>
                        <div class="flex space-x-2 mb-4">
                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs rounded-full">Enzymes</span>
                            <span class="px-2 py-1 bg-orange-100 text-orange-800 text-xs rounded-full">Tropical</span>
                        </div>
                        <button class="w-full bg-yellow-500 text-white py-2 rounded-lg hover:bg-yellow-600 transition duration-300 font-semibold">
                            Add to Cart
                        </button>
                    </div>
                </div>

                <!-- Grape Juice -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
                    <div class="relative">
                        <div class="h-48 bg-gradient-to-br from-purple-500 to-indigo-600 flex items-center justify-center">
                            <span class="text-6xl">🍇</span>
                        </div>
                        <div class="absolute top-4 right-4 bg-purple-600 text-white px-2 py-1 rounded-full text-xs font-semibold">
                            Rich
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gray-800">Grape Juice</h3>
                        <p class="text-gray-600 mb-4">Rich and flavorful purple grape juice</p>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-2xl font-bold text-purple-600">$4.29</span>
                            <div class="flex items-center">
                                <span class="text-yellow-400">★★★★☆</span>
                                <span class="text-gray-600 ml-1">(4.3)</span>
                            </div>
                        </div>
                        <div class="flex space-x-2 mb-4">
                            <span class="px-2 py-1 bg-purple-100 text-purple-800 text-xs rounded-full">Resveratrol</span>
                            <span class="px-2 py-1 bg-indigo-100 text-indigo-800 text-xs rounded-full">Classic</span>
                        </div>
                        <button class="w-full bg-purple-500 text-white py-2 rounded-lg hover:bg-purple-600 transition duration-300 font-semibold">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl font-bold mb-6 text-gray-800">Why Choose Our Juices?</h2>
                    <p class="text-gray-600 mb-6 text-lg">
                        At Fresh Juice Paradise, we're committed to bringing you the purest, most delicious juices made from hand-picked, organic fruits and vegetables. Our cold-press extraction method preserves maximum nutrients and flavor.
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="flex items-start space-x-3">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-white text-sm">✓</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">100% Organic</h4>
                                <p class="text-gray-600 text-sm">Certified organic fruits and vegetables</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-white text-sm">✓</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Cold-Pressed</h4>
                                <p class="text-gray-600 text-sm">Maximum nutrition retention</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-white text-sm">✓</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">No Additives</h4>
                                <p class="text-gray-600 text-sm">Pure fruit with no preservatives</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-white text-sm">✓</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Fresh Daily</h4>
                                <p class="text-gray-600 text-sm">Made fresh every morning</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-green-100 to-blue-100 rounded-2xl p-8 text-center">
                    <div class="text-6xl mb-4">🥤</div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Farm to Glass</h3>
                    <p class="text-gray-600">
                        Our fruits are harvested at peak ripeness and juiced within 24 hours to ensure maximum freshness and nutritional value.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Nutrition Section -->
    <section id="nutrition" class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">Nutritional Benefits</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white rounded-xl p-6 text-center shadow-lg">
                    <div class="text-4xl mb-4">💪</div>
                    <h3 class="text-xl font-bold mb-2 text-gray-800">Boost Energy</h3>
                    <p class="text-gray-600">Natural sugars provide sustained energy without crashes</p>
                </div>
                <div class="bg-white rounded-xl p-6 text-center shadow-lg">
                    <div class="text-4xl mb-4">🛡️</div>
                    <h3 class="text-xl font-bold mb-2 text-gray-800">Immune Support</h3>
                    <p class="text-gray-600">Packed with vitamins C and antioxidants</p>
                </div>
                <div class="bg-white rounded-xl p-6 text-center shadow-lg">
                    <div class="text-4xl mb-4">💧</div>
                    <h3 class="text-xl font-bold mb-2 text-gray-800">Hydration</h3>
                    <p class="text-gray-600">Natural electrolytes keep you hydrated</p>
                </div>
                <div class="bg-white rounded-xl p-6 text-center shadow-lg">
                    <div class="text-4xl mb-4">✨</div>
                    <h3 class="text-xl font-bold mb-2 text-gray-800">Detox</h3>
                    <p class="text-gray-600">Natural cleansing properties support wellness</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Reviews Section -->
    <section id="reviews" class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">What Our Customers Say</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-50 rounded-xl p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold">S</div>
                        <div class="ml-4">
                            <h4 class="font-bold text-gray-800">Sarah Johnson</h4>
                            <div class="text-yellow-400">★★★★★</div>
                        </div>
                    </div>
                    <p class="text-gray-600">"The mango juice is absolutely delicious! You can really taste the freshness. I order it every week now."</p>
                </div>
                <div class="bg-gray-50 rounded-xl p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center text-white font-bold">M</div>
                        <div class="ml-4">
                            <h4 class="font-bold text-gray-800">Mike Chen</h4>
                            <div class="text-yellow-400">★★★★★</div>
                        </div>
                    </div>
                    <p class="text-gray-600">"Love the green detox juice! It's become part of my daily routine. Great quality and taste."</p>
                </div>
                <div class="bg-gray-50 rounded-xl p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center text-white font-bold">E</div>
                        <div class="ml-4">
                            <h4 class="font-bold text-gray-800">Emily Davis</h4>
                            <div class="text-yellow-400">★★★★★</div>
                        </div>
                    </div>
                    <p class="text-gray-600">"Best juice bar in town! The berry mix is my favorite. Perfect balance of sweet and tart."</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-16 bg-gray-900 text-white">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div>
                    <h2 class="text-4xl font-bold mb-6">Get In Touch</h2>
                    <p class="text-gray-300 mb-8">Have questions about our juices or want to place a custom order? We'd love to hear from you!</p>
                    
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center">
                                <span class="text-sm">📍</span>
                            </div>
                            <div>
                                <h4 class="font-semibold">Address</h4>
                                <p class="text-gray-300">123 Fresh Street, Juice City, JC 12345</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center">
                                <span class="text-sm">📞</span>
                            </div>
                            <div>
                                <h4 class="font-semibold">Phone</h4>
                                <p class="text-gray-300">(555) 123-JUICE</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-purple-600 rounded-full flex items-center justify-center">
                                <span class="text-sm">✉️</span>
                            </div>
                            <div>
                                <h4 class="font-semibold">Email</h4>
                                <p class="text-gray-300">hello@freshjuiceparadise.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-800 rounded-xl p-8">
                    <h3 class="text-2xl font-bold mb-6">Send us a Message</h3>
                    <form class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium mb-2">Name</label>
                            <input type="text" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white" placeholder="Your Name">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2">Email</label>
                            <input type="email" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white" placeholder="your@email.com">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2">Message</label>
                            <textarea rows="4" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white" placeholder="Your message..."></textarea>
                        </div>
                        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300 font-semibold">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Subscription Section -->
    <section class="py-16 bg-gradient-to-r from-blue-600 to-purple-600 text-white">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold mb-4">Stay Fresh with Our Newsletter</h2>
            <p class="text-xl mb-8">Get exclusive offers, new juice releases, and health tips delivered to your inbox</p>
            <div class="max-w-md mx-auto flex">
                <input type="email" placeholder="Enter your email" class="flex-1 px-4 py-3 rounded-l-lg text-gray-800 focus:outline-none">
                <button class="bg-orange-500 px-6 py-3 rounded-r-lg font-semibold hover:bg-orange-600 transition duration-300">
                    Subscribe
                </button>
            </div>
        </div>
    </section>



    <!-- Floating Cart Button -->
    <div class="fixed bottom-6 right-6 z-50">
        <button class="w-16 h-16 bg-orange-500 text-white rounded-full shadow-lg hover:bg-orange-600 transition duration-300 flex items-center justify-center">
            <span class="text-2xl">🛒</span>
        </button>
    </div>

    <!-- Back to Top Button -->
    <div class="fixed bottom-6 left-6 z-50">
        <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" class="w-12 h-12 bg-gray-800 text-white rounded-full shadow-lg hover:bg-gray-700 transition duration-300 flex items-center justify-center">
            <span class="text-sm">↑</span>
        </button>
    </div>

    <script>
        // Simple JavaScript for category filtering (can be enhanced with Alpine.js or Vue.js)
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth scrolling for navigation links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Category filter functionality
            const filterButtons = document.querySelectorAll('.flex.space-x-4 button');
            const productCards = document.querySelectorAll('.grid.grid-cols-1 > div');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons
                    filterButtons.forEach(btn => {
                        btn.classList.remove('bg-blue-600', 'text-white');
                        btn.classList.add('text-gray-600');
                    });
                    
                    // Add active class to clicked button
                    this.classList.add('bg-blue-600', 'text-white');
                    this.classList.remove('text-gray-600');

                    // Simple filter logic (you can enhance this based on your needs)
                    const filterText = this.textContent.toLowerCase();
                    
                    productCards.forEach(card => {
                        if (filterText === 'all') {
                            card.style.display = 'block';
                        } else {
                            // You can add data attributes to products for better filtering
                            card.style.display = 'block';
                        }
                    });
                });
            });
        });
    </script>
</x-app-layout>