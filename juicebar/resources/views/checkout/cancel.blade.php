<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl text-gray-800 leading-tight">
                    {{ __('Payment Cancelled') }}
                </h2>
                <p class="text-gray-600 mt-1">Your order was not completed</p>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('cart') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors duration-200 flex items-center space-x-2 shadow-lg">
                    <span>🛒</span>
                    <span>Back to Cart</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Cancel Message -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-8 text-center">
                <div class="flex justify-center mb-4">
                    <div class="w-16 h-16 bg-yellow-500 rounded-full flex items-center justify-center">
                        <span class="text-white text-3xl">⚠️</span>
                    </div>
                </div>
                
                <h3 class="text-2xl font-bold text-yellow-800 mb-4">Payment Cancelled</h3>
                <p class="text-yellow-700 mb-6">
                    Your payment was cancelled and no charges were made to your card. 
                    Your cart items are still saved and ready for checkout.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('cart') }}" 
                       class="bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors duration-200 flex items-center justify-center space-x-2 shadow-lg">
                        <span>🛒</span>
                        <span>Return to Cart</span>
                    </a>
                    
                    <a href="{{ route('checkout') }}" 
                       class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors duration-200 flex items-center justify-center space-x-2 shadow-lg">
                        <span>💳</span>
                        <span>Try Again</span>
                    </a>
                    
                    <a href="{{ route('dashboard') }}" 
                       class="bg-gray-600 hover:bg-gray-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors duration-200 flex items-center justify-center space-x-2 shadow-lg">
                        <span>🏠</span>
                        <span>Go Home</span>
                    </a>
                </div>
            </div>

            <!-- Help Section -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6 mt-8">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Need Help?</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <h4 class="font-semibold text-gray-700">Common Issues:</h4>
                        <ul class="space-y-2 text-gray-600">
                            <li>• Check if your card details are correct</li>
                            <li>• Ensure you have sufficient funds</li>
                            <li>• Try using a different payment method</li>
                            <li>• Disable browser extensions that might interfere</li>
                        </ul>
                    </div>
                    
                    <div class="space-y-4">
                        <h4 class="font-semibold text-gray-700">Contact Support:</h4>
                        <div class="space-y-2 text-gray-600">
                            <p>📧 Email: support@juicebar.com</p>
                            <p>📞 Phone: (555) 123-4567</p>
                            <p>💬 Live Chat: Available 24/7</p>
                            <a href="{{ route('contactus') }}" class="text-blue-600 hover:text-blue-700 font-medium">Contact Us Page →</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Security Note -->
            <div class="bg-blue-50 border border-blue-200 rounded-xl p-6 mt-8">
                <div class="flex items-start space-x-3">
                    <div class="flex-shrink-0">
                        <span class="text-2xl">🔒</span>
                    </div>
                    <div>
                        <h4 class="font-semibold text-blue-800 mb-2">Your Information is Safe</h4>
                        <p class="text-blue-700 text-sm">
                            We use industry-standard encryption to protect your payment information. 
                            No payment details are stored on our servers, and all transactions are processed securely through Stripe.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>