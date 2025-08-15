<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl text-gray-800 leading-tight">
                    {{ __('Payment') }}
                </h2>
                <p class="text-gray-600 mt-1">Complete your payment securely</p>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('billing') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors duration-200 flex items-center space-x-2 shadow-lg">
                    <span>⬅️</span>
                    <span>Back to Billing</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Order Summary -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6 mb-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                    <span class="text-2xl mr-3">📋</span>
                    Order Summary
                </h3>
                <div class="text-center">
                    <div class="text-3xl font-bold text-green-600">${{ number_format($total, 2) }}</div>
                    <div class="text-gray-600">{{ $cartItems->count() }} item(s)</div>
                </div>
            </div>

            <!-- Payment Form -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                    <span class="text-2xl mr-3">💳</span>
                    Payment Details
                </h3>

                <form id="payment-form">
                    @csrf
                    
                    <!-- Stripe Card Element -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Card Information</label>
                        <div id="card-element" class="p-4 border border-gray-300 rounded-lg">
                            <!-- Stripe Elements will create form elements here -->
                        </div>
                        <div id="card-errors" role="alert" class="text-red-500 text-sm mt-2"></div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" id="submit-payment" 
                            class="w-full bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white py-4 rounded-lg font-bold text-lg transition-all duration-300 shadow-lg hover:shadow-xl">
                        <span id="button-text">💳 Pay ${{ number_format($total, 2) }}</span>
                        <span id="loading" class="hidden">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Processing...
                        </span>
                    </button>
                </form>

                <!-- Security Info -->
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <div class="flex items-center justify-center space-x-8 text-sm text-gray-600">
                        <div class="flex items-center">
                            <span class="text-lg mr-2">🔒</span>
                            <span>SSL Secure</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-lg mr-2">💳</span>
                            <span>256-bit Encryption</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-lg mr-2">✅</span>
                            <span>PCI Compliant</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stripe JavaScript -->
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Stripe
            const stripe = Stripe('{{ config('services.stripe.key') }}');
            const elements = stripe.elements();

            // Create card element
            const cardElement = elements.create('card', {
                style: {
                    base: {
                        fontSize: '16px',
                        color: '#424770',
                        '::placeholder': {
                            color: '#aab7c4',
                        },
                    },
                    invalid: {
                        color: '#9e2146',
                    },
                },
            });

            cardElement.mount('#card-element');

            // Handle real-time validation errors from the card Element
            cardElement.on('change', function(event) {
                const displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            // Handle form submission
            const form = document.getElementById('payment-form');
            form.addEventListener('submit', async function(event) {
                event.preventDefault();

                const submitButton = document.getElementById('submit-payment');
                const buttonText = document.getElementById('button-text');
                const loading = document.getElementById('loading');

                // Show loading
                submitButton.disabled = true;
                buttonText.classList.add('hidden');
                loading.classList.remove('hidden');

                try {
                    // Create payment method
                    const {error, paymentMethod} = await stripe.createPaymentMethod({
                        type: 'card',
                        card: cardElement,
                        billing_details: {
                            name: '{{ $billingData["name"] }}',
                            email: '{{ $billingData["email"] }}',
                            phone: '{{ $billingData["phone"] }}',
                            address: {
                                line1: '{{ $billingData["address"] }}',
                                city: '{{ $billingData["city"] }}',
                                postal_code: '{{ $billingData["zip"] }}',
                            }
                        }
                    });

                    if (error) {
                        // Show error to customer
                        document.getElementById('card-errors').textContent = error.message;
                        
                        // Re-enable submit button
                        submitButton.disabled = false;
                        buttonText.classList.remove('hidden');
                        loading.classList.add('hidden');
                    } else {
                        // Send payment method to server
                        const response = await fetch('{{ route('payment.process') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({
                                payment_method_id: paymentMethod.id
                            })
                        });

                        const result = await response.json();

                        if (result.success) {
                            // Redirect to success page
                            window.location.href = result.redirect_url;
                        } else {
                            // Show error
                            document.getElementById('card-errors').textContent = result.error || 'Payment failed. Please try again.';
                            
                            // Re-enable submit button
                            submitButton.disabled = false;
                            buttonText.classList.remove('hidden');
                            loading.classList.add('hidden');
                        }
                    }
                } catch (error) {
                    console.error('Error:', error);
                    document.getElementById('card-errors').textContent = 'An unexpected error occurred.';
                    
                    // Re-enable submit button
                    submitButton.disabled = false;
                    buttonText.classList.remove('hidden');
                    loading.classList.add('hidden');
                }
            });
        });
    </script>
</x-app-layout>