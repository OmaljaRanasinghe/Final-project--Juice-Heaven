<x-app-layout>
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-blue-600 via-purple-600 to-teal-600 text-white py-20">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-5xl md:text-6xl font-bold mb-6">Get In Touch</h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">
                We'd love to hear from you! Reach out for questions, feedback, or just to say hello
            </p>
            <div class="flex justify-center space-x-4 text-4xl">
                <span class="animate-pulse">📞</span>
                <span class="animate-pulse" style="animation-delay: 0.2s;">✉️</span>
                <span class="animate-pulse" style="animation-delay: 0.4s;">📍</span>
                <span class="animate-pulse" style="animation-delay: 0.6s;">💬</span>
            </div>
        </div>
    </section>

    <!-- Quick Contact Cards -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 -mt-32 relative z-10">
                <!-- Phone -->
                <div class="bg-white rounded-2xl p-8 text-center shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
                    <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white text-2xl">📞</span>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-gray-800">Call Us</h3>
                    <p class="text-gray-600 mb-4">Mon-Fri 7AM-9PM</p>
                    <a href="tel:+15551234567" class="text-green-600 font-semibold hover:text-green-700 transition duration-300">
                        (555) 123-JUICE
                    </a>
                </div>

                <!-- Email -->
                <div class="bg-white rounded-2xl p-8 text-center shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
                    <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white text-2xl">✉️</span>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-gray-800">Email Us</h3>
                    <p class="text-gray-600 mb-4">Quick Response</p>
                    <a href="mailto:hello@freshjuiceparadise.com" class="text-blue-600 font-semibold hover:text-blue-700 transition duration-300">
                        hello@freshjuice.com
                    </a>
                </div>

                <!-- Location -->
                <div class="bg-white rounded-2xl p-8 text-center shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
                    <div class="w-16 h-16 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white text-2xl">📍</span>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-gray-800">Visit Us</h3>
                    <p class="text-gray-600 mb-4">Downtown Location</p>
                    <p class="text-purple-600 font-semibold">123 Fresh Street<br>Juice City, JC 12345</p>
                </div>

                <!-- Live Chat -->
                <div class="bg-white rounded-2xl p-8 text-center shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
                    <div class="w-16 h-16 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white text-2xl">💬</span>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-gray-800">Live Chat</h3>
                    <p class="text-gray-600 mb-4">Online Support</p>
                    <button class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition duration-300 font-semibold">
                        Start Chat
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form & Map Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div>
                    <h2 class="text-4xl font-bold mb-8 text-gray-800">Send Us a Message</h2>
                    <form class="space-y-6" action="{{ route('contactus') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">First Name *</label>
                                <input type="text" id="first_name" name="first_name" required 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300" 
                                    placeholder="John">
                            </div>
                            <div>
                                <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">Last Name *</label>
                                <input type="text" id="last_name" name="last_name" required 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300" 
                                    placeholder="Doe">
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                            <input type="email" id="email" name="email" required 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300" 
                                placeholder="john@example.com">
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                            <input type="tel" id="phone" name="phone" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300" 
                                placeholder="(555) 123-4567">
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subject *</label>
                            <select id="subject" name="subject" required 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300">
                                <option value="">Select a subject</option>
                                <option value="general_inquiry">General Inquiry</option>
                                <option value="product_question">Product Question</option>
                                <option value="order_support">Order Support</option>
                                <option value="wholesale_inquiry">Wholesale Inquiry</option>
                                <option value="feedback">Feedback</option>
                                <option value="partnership">Partnership Opportunity</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message *</label>
                            <textarea id="message" name="message" rows="6" required 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300" 
                                placeholder="Tell us how we can help you..."></textarea>
                        </div>

                        <div class="flex items-start">
                            <input type="checkbox" id="newsletter" name="newsletter" 
                                class="mt-1 mr-3 h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="newsletter" class="text-sm text-gray-600">
                                I'd like to receive updates about new products and special offers
                            </label>
                        </div>

                        <button type="submit" 
                            class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3 px-6 rounded-lg font-semibold hover:from-blue-700 hover:to-purple-700 transform hover:-translate-y-1 transition duration-300 shadow-lg">
                            Send Message
                        </button>
                    </form>
                </div>

                <!-- Map & Location Info -->
                <div>
                    <h2 class="text-4xl font-bold mb-8 text-gray-800">Find Our Store</h2>
                    
                    <!-- Map Placeholder -->
                    <div class="bg-gray-200 rounded-2xl h-64 mb-8 flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-green-400 via-blue-500 to-purple-600 opacity-20"></div>
                        <div class="text-center z-10">
                            <span class="text-6xl mb-4 block">🗺️</span>
                            <p class="text-gray-700 font-semibold">Interactive Map</p>
                            <p class="text-gray-600 text-sm">123 Fresh Street, Juice City</p>
                        </div>
                    </div>

                    <!-- Location Details -->
                    <div class="space-y-6">
                        <div class="bg-gray-50 rounded-2xl p-6">
                            <h3 class="text-2xl font-bold mb-4 text-gray-800">Store Hours</h3>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-700">Monday - Friday</span>
                                    <span class="font-semibold text-green-600">7:00 AM - 9:00 PM</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-700">Saturday</span>
                                    <span class="font-semibold text-green-600">8:00 AM - 8:00 PM</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-700">Sunday</span>
                                    <span class="font-semibold text-green-600">9:00 AM - 7:00 PM</span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-blue-50 rounded-2xl p-6">
                            <h3 class="text-2xl font-bold mb-4 text-gray-800">Getting Here</h3>
                            <div class="space-y-3">
                                <div class="flex items-start space-x-3">
                                    <span class="text-blue-600 text-xl">🚗</span>
                                    <div>
                                        <p class="font-semibold text-gray-700">By Car</p>
                                        <p class="text-gray-600 text-sm">Free parking available in our lot behind the building</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <span class="text-green-600 text-xl">🚌</span>
                                    <div>
                                        <p class="font-semibold text-gray-700">Public Transit</p>
                                        <p class="text-gray-600 text-sm">Bus routes 15, 22, and 34 stop directly in front</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <span class="text-orange-600 text-xl">🚴</span>
                                    <div>
                                        <p class="font-semibold text-gray-700">By Bike</p>
                                        <p class="text-gray-600 text-sm">Bike racks available at the front entrance</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">Frequently Asked Questions</h2>
            <div class="max-w-4xl mx-auto">
                <div class="space-y-6">
                    <!-- FAQ Item 1 -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition duration-300">
                        <button class="w-full text-left flex justify-between items-center" onclick="toggleFAQ(1)">
                            <h3 class="text-lg font-semibold text-gray-800">What are your store hours?</h3>
                            <span class="text-2xl text-gray-400" id="faq-icon-1">+</span>
                        </button>
                        <div class="mt-4 text-gray-600 hidden" id="faq-content-1">
                            <p>We're open Monday-Friday 7AM-9PM, Saturday 8AM-8PM, and Sunday 9AM-7PM. We're here to serve you fresh juice throughout the week!</p>
                        </div>
                    </div>

                    <!-- FAQ Item 2 -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition duration-300">
                        <button class="w-full text-left flex justify-between items-center" onclick="toggleFAQ(2)">
                            <h3 class="text-lg font-semibold text-gray-800">Do you offer delivery?</h3>
                            <span class="text-2xl text-gray-400" id="faq-icon-2">+</span>
                        </button>
                        <div class="mt-4 text-gray-600 hidden" id="faq-content-2">
                            <p>Yes! We offer delivery within a 10-mile radius of our store. Orders placed before 2PM are delivered the same day. Delivery fee is $3.99 with free delivery on orders over $25.</p>
                        </div>
                    </div>

                    <!-- FAQ Item 3 -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition duration-300">
                        <button class="w-full text-left flex justify-between items-center" onclick="toggleFAQ(3)">
                            <h3 class="text-lg font-semibold text-gray-800">How long do your juices stay fresh?</h3>
                            <span class="text-2xl text-gray-400" id="faq-icon-3">+</span>
                        </button>
                        <div class="mt-4 text-gray-600 hidden" id="faq-content-3">
                            <p>Our cold-pressed juices stay fresh for 3-5 days when refrigerated. We recommend consuming them within 72 hours of purchase for optimal nutrition and taste.</p>
                        </div>
                    </div>

                    <!-- FAQ Item 4 -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition duration-300">
                        <button class="w-full text-left flex justify-between items-center" onclick="toggleFAQ(4)">
                            <h3 class="text-lg font-semibold text-gray-800">Do you offer wholesale pricing?</h3>
                            <span class="text-2xl text-gray-400" id="faq-icon-4">+</span>
                        </button>
                        <div class="mt-4 text-gray-600 hidden" id="faq-content-4">
                            <p>Absolutely! We work with cafes, gyms, and other businesses. Contact us for wholesale pricing and minimum order requirements. We offer competitive rates for bulk orders.</p>
                        </div>
                    </div>

                    <!-- FAQ Item 5 -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition duration-300">
                        <button class="w-full text-left flex justify-between items-center" onclick="toggleFAQ(5)">
                            <h3 class="text-lg font-semibold text-gray-800">Can I customize my juice blend?</h3>
                            <span class="text-2xl text-gray-400" id="faq-icon-5">+</span>
                        </button>
                        <div class="mt-4 text-gray-600 hidden" id="faq-content-5">
                            <p>Yes! We love creating custom blends. You can choose from our selection of fruits and vegetables to create your perfect juice. Custom blends may take 5-10 minutes to prepare.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Methods Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">Other Ways to Reach Us</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                <!-- Customer Service -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-3xl">🎧</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Customer Service</h3>
                    <p class="text-gray-600 mb-4">Need help with an order or have product questions?</p>
                    <p class="text-blue-600 font-semibold">support@freshjuiceparadise.com</p>
                    <p class="text-gray-600">(555) 123-HELP</p>
                </div>

                <!-- Media Inquiries -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-3xl">📺</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Media Inquiries</h3>
                    <p class="text-gray-600 mb-4">Press, interviews, and media partnerships</p>
                    <p class="text-purple-600 font-semibold">media@freshjuiceparadise.com</p>
                    <p class="text-gray-600">(555) 123-MEDIA</p>
                </div>

                <!-- Wholesale -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-3xl">🏢</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Wholesale</h3>
                    <p class="text-gray-600 mb-4">Bulk orders and business partnerships</p>
                    <p class="text-green-600 font-semibold">wholesale@freshjuiceparadise.com</p>
                    <p class="text-gray-600">(555) 123-BULK</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Social Media Section -->
    <section class="py-16 bg-gradient-to-r from-green-600 to-blue-600 text-white">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold mb-6">Follow Us on Social Media</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto">
                Stay connected for daily juice inspiration, health tips, and behind-the-scenes content
            </p>
            <div class="flex justify-center space-x-6">
                <a href="#" class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-30 transition duration-300">
                    <span class="text-2xl">📘</span>
                </a>
                <a href="#" class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-30 transition duration-300">
                    <span class="text-2xl">📷</span>
                </a>
                <a href="#" class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-30 transition duration-300">
                    <span class="text-2xl">🐦</span>
                </a>
                <a href="#" class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-30 transition duration-300">
                    <span class="text-2xl">🎵</span>
                </a>
                <a href="#" class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-30 transition duration-300">
                    <span class="text-2xl">💼</span>
                </a>
            </div>
        </div>
    </section>

    <!-- JavaScript for FAQ Toggle -->
    <script>
        function toggleFAQ(faqNumber) {
            const content = document.getElementById(`faq-content-${faqNumber}`);
            const icon = document.getElementById(`faq-icon-${faqNumber}`);
            
            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                icon.textContent = '−';
            } else {
                content.classList.add('hidden');
                icon.textContent = '+';
            }
        }

        // Form validation and submission handling
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Simple form validation
                const requiredFields = form.querySelectorAll('[required]');
                let isValid = true;
                
                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        isValid = false;
                        field.classList.add('border-red-500');
                    } else {
                        field.classList.remove('border-red-500');
                    }
                });
                
                if (isValid) {
                    // Here you would typically submit the form to your Laravel backend
                    alert('Thank you for your message! We\'ll get back to you within 24 hours.');
                    form.reset();
                } else {
                    alert('Please fill in all required fields.');
                }
            });
        });
    </script>
</x-app-layout>