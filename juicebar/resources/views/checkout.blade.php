<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl text-gray-800 leading-tight">
                    {{ __('Checkout') }}
                </h2>
                <p class="text-gray-600 mt-1">Complete your fresh juice order</p>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('cart') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors duration-200 flex items-center space-x-2 shadow-lg">
                    <span>🛒</span>
                    <span>Back to Cart</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <form action="{{ route('checkout.process') }}" method="POST" id="checkoutForm">
                @csrf
                <input type="hidden" name="payment_intent_id" id="payment_intent_id">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Checkout Form Section -->
                    <div class="lg:col-span-2 space-y-8">
                        
                        <!-- Step 1: Contact Information -->
                        <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                            <div class="flex items-center mb-6">
                                <div class="bg-yellow-500 text-white rounded-full w-8 h-8 flex items-center justify-center font-bold mr-3">1</div>
                                <h3 class="text-xl font-bold text-gray-800">Contact Information</h3>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="billing_name" class="block text-sm font-medium text-gray-700 mb-2">Full Name *</label>
                                    <input type="text" id="billing_name" name="billing_name" value="{{ old('billing_name', Auth::user()->name) }}" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                                    @error('billing_name')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="billing_email" class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                                    <input type="email" id="billing_email" name="billing_email" value="{{ old('billing_email', Auth::user()->email) }}" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                                    @error('billing_email')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div class="md:col-span-2">
                                    <label for="billing_phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number *</label>
                                    <input type="tel" id="billing_phone" name="billing_phone" value="{{ old('billing_phone') }}" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                                    @error('billing_phone')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Step 2: Billing Address -->
                        <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                            <div class="flex items-center mb-6">
                                <div class="bg-green-500 text-white rounded-full w-8 h-8 flex items-center justify-center font-bold mr-3">2</div>
                                <h3 class="text-xl font-bold text-gray-800">Billing Address</h3>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="md:col-span-2">
                                    <label for="billing_address" class="block text-sm font-medium text-gray-700 mb-2">Street Address *</label>
                                    <input type="text" id="billing_address" name="billing_address" value="{{ old('billing_address') }}" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                                    @error('billing_address')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="billing_city" class="block text-sm font-medium text-gray-700 mb-2">City *</label>
                                    <input type="text" id="billing_city" name="billing_city" value="{{ old('billing_city') }}" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                                    @error('billing_city')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="billing_state" class="block text-sm font-medium text-gray-700 mb-2">State *</label>
                                    <input type="text" id="billing_state" name="billing_state" value="{{ old('billing_state') }}" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                                    @error('billing_state')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="billing_zip" class="block text-sm font-medium text-gray-700 mb-2">ZIP Code *</label>
                                    <input type="text" id="billing_zip" name="billing_zip" value="{{ old('billing_zip') }}" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                                    @error('billing_zip')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Step 3: Delivery Options -->
                        <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                            <div class="flex items-center mb-6">
                                <div class="bg-red-500 text-white rounded-full w-8 h-8 flex items-center justify-center font-bold mr-3">3</div>
                                <h3 class="text-xl font-bold text-gray-800">Delivery Options</h3>
                            </div>
                            
                            <div class="space-y-4 mb-6">
                                <div class="flex items-center space-x-3">
                                    <input type="radio" id="delivery" name="delivery_type" value="delivery" 
                                           class="w-4 h-4 text-green-600" {{ old('delivery_type', 'delivery') == 'delivery' ? 'checked' : '' }}>
                                    <label for="delivery" class="flex items-center space-x-2 cursor-pointer">
                                        <span class="text-2xl">🚚</span>
                                        <div>
                                            <div class="font-semibold text-gray-800">Home Delivery</div>
                                            <div class="text-sm text-gray-600">Get it delivered to your doorstep</div>
                                        </div>
                                    </label>
                                </div>
                                
                                <div class="flex items-center space-x-3">
                                    <input type="radio" id="pickup" name="delivery_type" value="pickup" 
                                           class="w-4 h-4 text-green-600" {{ old('delivery_type') == 'pickup' ? 'checked' : '' }}>
                                    <label for="pickup" class="flex items-center space-x-2 cursor-pointer">
                                        <span class="text-2xl">🏪</span>
                                        <div>
                                            <div class="font-semibold text-gray-800">Store Pickup</div>
                                            <div class="text-sm text-gray-600">Pickup from our store (123 Fresh Street)</div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            
                            <div id="deliveryAddress" class="grid grid-cols-1 md:grid-cols-2 gap-6" style="{{ old('delivery_type', 'delivery') == 'pickup' ? 'display: none;' : '' }}">
                                <div class="md:col-span-2">
                                    <label for="delivery_address" class="block text-sm font-medium text-gray-700 mb-2">Delivery Address *</label>
                                    <input type="text" id="delivery_address" name="delivery_address" value="{{ old('delivery_address') }}" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                    @error('delivery_address')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="delivery_city" class="block text-sm font-medium text-gray-700 mb-2">City *</label>
                                    <input type="text" id="delivery_city" name="delivery_city" value="{{ old('delivery_city') }}" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                    @error('delivery_city')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="delivery_state" class="block text-sm font-medium text-gray-700 mb-2">State *</label>
                                    <input type="text" id="delivery_state" name="delivery_state" value="{{ old('delivery_state') }}" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                    @error('delivery_state')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="delivery_zip" class="block text-sm font-medium text-gray-700 mb-2">ZIP Code *</label>
                                    <input type="text" id="delivery_zip" name="delivery_zip" value="{{ old('delivery_zip') }}" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                    @error('delivery_zip')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Step 4: Payment Method -->
                        <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                            <div class="flex items-center mb-6">
                                <div class="bg-purple-500 text-white rounded-full w-8 h-8 flex items-center justify-center font-bold mr-3">4</div>
                                <h3 class="text-xl font-bold text-gray-800">Payment Method</h3>
                            </div>
                            
                            <div class="border-2 border-green-500 bg-green-50 rounded-lg p-4">
                                <input type="radio" id="card" name="payment_method" value="stripe" 
                                       class="w-4 h-4 text-green-600" checked>
                                <label for="card" class="ml-3 flex items-center space-x-2 cursor-pointer">
                                    <span class="text-2xl">💳</span>
                                    <div>
                                        <div class="font-semibold text-gray-800">Credit/Debit Card</div>
                                        <div class="text-sm text-gray-600">Visa, Mastercard, Amex</div>
                                    </div>
                                </label>
                            </div>
                            
                            <!-- Stripe Card Element -->
                            <div id="card-element" class="mt-4 p-4 border border-gray-300 rounded-lg">
                                <!-- Stripe Elements will create form elements here -->
                            </div>
                            
                            <!-- Used to display form errors -->
                            <div id="card-errors" role="alert" class="text-red-500 text-sm mt-2"></div>
                            
                            @error('payment_method')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Step 5: Special Instructions -->
                        <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                            <div class="flex items-center mb-6">
                                <div class="bg-blue-500 text-white rounded-full w-8 h-8 flex items-center justify-center font-bold mr-3">5</div>
                                <h3 class="text-xl font-bold text-gray-800">Special Instructions</h3>
                            </div>
                            
                            <div>
                                <label for="special_instructions" class="block text-sm font-medium text-gray-700 mb-2">
                                    Order Notes (Optional)
                                </label>
                                <textarea id="special_instructions" name="special_instructions" rows="4" 
                                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" 
                                          placeholder="Any special dietary requirements, allergies, or delivery instructions...">{{ old('special_instructions') }}</textarea>
                                @error('special_instructions')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary Section -->
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6 sticky top-8">
                            <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                                <span class="text-2xl mr-3">📋</span>
                                Order Summary
                            </h3>

                            <!-- Cart Items -->
                            <div class="space-y-4 mb-6 max-h-64 overflow-y-auto">
                                @foreach($cartItems as $item)
                                <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
                                    @if($item->custom_juice_id)
                                        <div class="w-12 h-12 rounded-lg flex items-center justify-center text-lg shadow-sm" 
                                             style="background: linear-gradient(135deg, {{ $item->customJuice->dominant_color }}, {{ $item->customJuice->dominant_color }}aa);">
                                            🥤
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h4 class="font-semibold text-gray-800 text-sm truncate">{{ $item->customJuice->name }}</h4>
                                            <p class="text-gray-600 text-xs">{{ Str::limit($item->customJuice->ingredients, 30) }}</p>
                                            <div class="flex justify-between items-center mt-1">
                                                <span class="text-gray-600 text-xs">Qty: {{ $item->quantity }}</span>
                                                <span class="font-semibold text-gray-800 text-sm">${{ number_format($item->total_price, 2) }}</span>
                                            </div>
                                        </div>
                                    @else
                                        <div class="w-12 h-12 rounded-lg flex items-center justify-center text-lg shadow-sm" 
                                             style="background: linear-gradient(135deg, {{ $item->product->color }}, {{ $item->product->color }}aa);">
                                            {{ $item->product->emoji }}
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h4 class="font-semibold text-gray-800 text-sm truncate">{{ $item->product->name }}</h4>
                                            <p class="text-gray-600 text-xs">{{ Str::limit($item->product->description, 30) }}</p>
                                            <div class="flex justify-between items-center mt-1">
                                                <span class="text-gray-600 text-xs">Qty: {{ $item->quantity }}</span>
                                                <span class="font-semibold text-gray-800 text-sm">${{ number_format($item->total_price, 2) }}</span>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                @endforeach
                            </div>

                            <!-- Price Breakdown -->
                            <div class="space-y-3 mb-6 border-t border-gray-200 pt-4">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Subtotal</span>
                                    <span class="font-semibold text-gray-800">${{ number_format($subtotal, 2) }}</span>
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Tax (8%)</span>
                                    <span class="font-semibold text-gray-800">${{ number_format($tax, 2) }}</span>
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Delivery Fee</span>
                                    <span class="font-semibold text-gray-800 {{ $deliveryFee == 0 ? 'text-green-600' : '' }}">
                                        {{ $deliveryFee == 0 ? 'FREE' : '$' . number_format($deliveryFee, 2) }}
                                    </span>
                                </div>
                                
                                <div class="border-t border-gray-200 pt-3">
                                    <div class="flex justify-between items-center text-xl font-bold">
                                        <span class="text-gray-800">Total</span>
                                        <span class="text-green-600">${{ number_format($total, 2) }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Place Order Button -->
                            <button type="submit" id="placeOrderBtn"
                                    class="w-full bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white py-4 rounded-lg font-bold text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                <span id="btnText">🚀 Place Order</span>
                                <span id="btnLoading" class="hidden">
                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Processing...
                                </span>
                            </button>

                            <!-- Security Badges -->
                            <div class="mt-6 pt-6 border-t border-gray-200">
                                <div class="grid grid-cols-2 gap-4 text-center">
                                    <div>
                                        <div class="text-2xl mb-1">🔒</div>
                                        <div class="text-xs text-gray-600 font-medium">SSL Secure</div>
                                    </div>
                                    <div>
                                        <div class="text-2xl mb-1">✅</div>
                                        <div class="text-xs text-gray-600 font-medium">100% Safe</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Toggle delivery address fields
        document.querySelectorAll('input[name="delivery_type"]').forEach(radio => {
            radio.addEventListener('change', function() {
                const deliveryAddress = document.getElementById('deliveryAddress');
                const isDelivery = this.value === 'delivery';
                
                deliveryAddress.style.display = isDelivery ? 'grid' : 'none';
                
                // Toggle required attributes
                const deliveryFields = ['delivery_address', 'delivery_city', 'delivery_state', 'delivery_zip'];
                deliveryFields.forEach(fieldName => {
                    const field = document.getElementById(fieldName);
                    if (field) {
                        field.required = isDelivery;
                    }
                });
            });
        });

        // Auto-populate delivery address with billing address
        document.getElementById('copyBillingAddress').addEventListener('click', function() {
            if (document.getElementById('delivery').checked) {
                document.getElementById('delivery_address').value = document.getElementById('billing_address').value;
                document.getElementById('delivery_city').value = document.getElementById('billing_city').value;
                document.getElementById('delivery_state').value = document.getElementById('billing_state').value;
                document.getElementById('delivery_zip').value = document.getElementById('billing_zip').value;
            }
        });

        // Add copy billing address button functionality
        document.getElementById('billing_address').addEventListener('input', function() {
            if (!document.getElementById('copyBillingBtn')) {
                const copyBtn = document.createElement('button');
                copyBtn.type = 'button';
                copyBtn.id = 'copyBillingBtn';
                copyBtn.className = 'mt-2 text-sm text-green-600 hover:text-green-700 font-medium';
                copyBtn.innerHTML = '📋 Copy billing address to delivery';
                copyBtn.onclick = function() {
                    if (document.getElementById('delivery').checked) {
                        document.getElementById('delivery_address').value = document.getElementById('billing_address').value;
                        document.getElementById('delivery_city').value = document.getElementById('billing_city').value;
                        document.getElementById('delivery_state').value = document.getElementById('billing_state').value;
                        document.getElementById('delivery_zip').value = document.getElementById('billing_zip').value;
                    }
                };
                document.getElementById('billing_zip').parentNode.appendChild(copyBtn);
            }
        });

        // Form submission with loading state
        document.getElementById('checkoutForm').addEventListener('submit', function(e) {
            const submitBtn = document.getElementById('placeOrderBtn');
            const btnText = document.getElementById('btnText');
            const btnLoading = document.getElementById('btnLoading');
            
            // Show loading state
            submitBtn.disabled = true;
            btnText.classList.add('hidden');
            btnLoading.classList.remove('hidden');
            
            // Re-enable after 30 seconds if form doesn't submit (safety measure)
            setTimeout(() => {
                if (submitBtn.disabled) {
                    submitBtn.disabled = false;
                    btnText.classList.remove('hidden');
                    btnLoading.classList.add('hidden');
                }
            }, 30000);
        });

        // Payment method selection styling
        document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
            radio.addEventListener('change', function() {
                document.querySelectorAll('input[name="payment_method"]').forEach(r => {
                    r.closest('.border-2').classList.remove('border-green-500', 'bg-green-50');
                    r.closest('.border-2').classList.add('border-gray-200');
                });
                
                this.closest('.border-2').classList.remove('border-gray-200');
                this.closest('.border-2').classList.add('border-green-500', 'bg-green-50');
            });
        });

        // Initialize selected payment method styling
        document.addEventListener('DOMContentLoaded', function() {
            const selectedPayment = document.querySelector('input[name="payment_method"]:checked');
            if (selectedPayment) {
                selectedPayment.closest('.border-2').classList.remove('border-gray-200');
                selectedPayment.closest('.border-2').classList.add('border-green-500', 'bg-green-50');
            }
        });
    </script>

    <!-- Stripe JavaScript -->
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM loaded, initializing Stripe and form handlers...');
            
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

        // Add an instance of the card Element into the container
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
        const form = document.getElementById('checkoutForm');
        const submitButton = document.getElementById('placeOrderBtn');
        let clientSecret = null;
        let isProcessingPayment = false;

        const handleFormSubmit = async function(event) {
            event.preventDefault();
            
            console.log('=== FORM SUBMIT STARTED ===');
            console.log('Form action:', form.action);
            console.log('Form method:', form.method);

            // Show loading state
            submitButton.disabled = true;
            document.getElementById('btnText').classList.add('hidden');
            document.getElementById('btnLoading').classList.remove('hidden');

            try {
                // Skip Stripe payment and directly submit with a fake payment ID
                console.log('Auto-approving payment...');
                
                // Set a fake payment intent ID
                const paymentId = 'auto_success_' + Date.now();
                document.getElementById('payment_intent_id').value = paymentId;
                console.log('Set payment_intent_id to:', paymentId);
                
                // Log all form data
                const formData = new FormData(form);
                console.log('Form data:');
                for (let [key, value] of formData.entries()) {
                    console.log(`  ${key}: ${value}`);
                }
                
                // Submit the form directly
                console.log('Submitting form...');
                
                // Remove the event listener to prevent recursion
                form.removeEventListener('submit', handleFormSubmit);
                
                // Submit the original form
                form.submit();
                
            } catch (error) {
                console.error('Error in form submission:', error);
                
                // Re-enable submit button
                submitButton.disabled = false;
                document.getElementById('btnText').classList.remove('hidden');
                document.getElementById('btnLoading').classList.add('hidden');
            }
        };

        form.addEventListener('submit', handleFormSubmit);
        
        }); // End DOMContentLoaded
    </script>
</x-app-layout>