<x-employee-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl text-gray-800 leading-tight">
                    Order #{{ $order->id }}
                </h2>
                <p class="text-gray-600 mt-1">📦 Order details and customizations</p>
            </div>
            <div>
                <a href="{{ route('employee.orders.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors duration-200 flex items-center space-x-2 shadow-lg">
                    <span>←</span>
                    <span>Back to Orders</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Order Details -->
                <div class="lg:col-span-2">
                    <!-- Customer Information -->
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6 mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">👤 Customer Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-600">Name</p>
                                <p class="font-medium">{{ $order->user->name }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Email</p>
                                <p class="font-medium">{{ $order->user->email }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Order Date</p>
                                <p class="font-medium">{{ $order->created_at->format('M d, Y - H:i') }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Order Total</p>
                                <p class="font-medium text-green-600">LKR {{ number_format($order->total, 0) }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Order Items -->
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">🧃 Order Items</h3>
                        <div class="space-y-4">
                            @foreach($order->orderItems as $item)
                                <div class="border-l-4 border-blue-500 pl-4 py-3 bg-gray-50 rounded-r-lg">
                                    @if($item->product)
                                        <!-- Regular Product -->
                                        <div class="flex items-start justify-between">
                                            <div class="flex-1">
                                                <div class="flex items-center space-x-3 mb-2">
                                                    @if($item->product->image)
                                                        <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="w-12 h-12 rounded-lg object-cover">
                                                    @else
                                                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center text-xl">
                                                            {{ $item->product->emoji ?? '🧃' }}
                                                        </div>
                                                    @endif
                                                    <div>
                                                        <h4 class="font-semibold text-gray-900">{{ $item->product->name }}</h4>
                                                        <p class="text-sm text-gray-600">{{ $item->product->category }}</p>
                                                    </div>
                                                </div>
                                                <p class="text-sm text-gray-700 mb-2">{{ $item->product->description }}</p>
                                            </div>
                                            <div class="text-right ml-4">
                                                <p class="font-semibold">Qty: {{ $item->quantity }}</p>
                                                <p class="text-green-600 font-bold">${{ number_format($item->price * $item->quantity, 2) }}</p>
                                            </div>
                                        </div>
                                    @elseif($item->customJuice)
                                        <!-- Custom Juice -->
                                        <div class="flex items-start justify-between">
                                            <div class="flex-1">
                                                <div class="flex items-center space-x-3 mb-2">
                                                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center text-xl">
                                                        🥤
                                                    </div>
                                                    <div>
                                                        <h4 class="font-semibold text-gray-900">{{ $item->customJuice->name }}</h4>
                                                        <p class="text-sm text-gray-600">Custom Juice</p>
                                                    </div>
                                                </div>
                                                
                                                <!-- Comprehensive Custom Juice Recipe -->
                                                <div class="bg-gradient-to-br from-orange-50 to-yellow-50 rounded-lg p-4 border-2 border-orange-200">
                                                    <div class="flex items-center justify-between mb-4">
                                                        <div class="flex items-center">
                                                            <span class="text-2xl mr-3">🥤</span>
                                                            <h5 class="font-bold text-xl text-orange-900">CUSTOM JUICE RECIPE</h5>
                                                        </div>
                                                        @if($item->customJuice->dominant_color)
                                                            <div class="w-8 h-8 rounded-full border-2 border-gray-400" style="background-color: {{ $item->customJuice->dominant_color }}"></div>
                                                        @endif
                                                    </div>
                                                    
                                                    <!-- Juice Name -->
                                                    @if($item->customJuice->name)
                                                        <div class="mb-4 p-3 bg-white rounded-lg border-2 border-orange-300">
                                                            <div class="flex items-center">
                                                                <span class="text-orange-600 mr-2">🏷️</span>
                                                                <span class="text-sm font-semibold text-orange-800">JUICE NAME:</span>
                                                            </div>
                                                            <span class="text-lg font-bold text-gray-900 ml-6">{{ $item->customJuice->name }}</span>
                                                        </div>
                                                    @endif

                                                    <!-- Detailed Specifications Grid -->
                                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                                        <!-- Cup Size -->
                                                        @if($item->customJuice->size)
                                                            <div class="bg-white rounded-lg p-3 border-2 border-blue-300">
                                                                <div class="flex items-center mb-2">
                                                                    <span class="text-blue-600 text-lg mr-2">📏</span>
                                                                    <span class="text-sm font-bold text-gray-800">CUP SIZE</span>
                                                                </div>
                                                                <div class="bg-blue-100 text-blue-900 px-3 py-2 rounded font-bold text-center">
                                                                    {{ strtoupper($item->customJuice->size) }}
                                                                    @if($item->customJuice->size == 'small')
                                                                        (12 oz)
                                                                    @elseif($item->customJuice->size == 'medium')
                                                                        (16 oz)
                                                                    @elseif($item->customJuice->size == 'large')
                                                                        (20 oz)
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endif

                                                        <!-- Ice Level -->
                                                        @if($item->customJuice->ice_level)
                                                            <div class="bg-white rounded-lg p-3 border-2 border-cyan-300">
                                                                <div class="flex items-center mb-2">
                                                                    <span class="text-cyan-600 text-lg mr-2">🧊</span>
                                                                    <span class="text-sm font-bold text-gray-800">ICE LEVEL</span>
                                                                </div>
                                                                <div class="bg-cyan-100 text-cyan-900 px-3 py-2 rounded font-bold text-center">
                                                                    {{ strtoupper($item->customJuice->ice_level) }}
                                                                    @if($item->customJuice->ice_level == 'no_ice')
                                                                        ❌ NO ICE
                                                                    @elseif($item->customJuice->ice_level == 'light')
                                                                        🧊 LIGHT ICE
                                                                    @elseif($item->customJuice->ice_level == 'regular')
                                                                        🧊🧊 REGULAR ICE
                                                                    @elseif($item->customJuice->ice_level == 'extra')
                                                                        🧊🧊🧊 EXTRA ICE
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endif

                                                        <!-- Sweetness Level -->
                                                        @if($item->customJuice->sugar_level)
                                                            <div class="bg-white rounded-lg p-3 border-2 border-pink-300">
                                                                <div class="flex items-center mb-2">
                                                                    <span class="text-pink-600 text-lg mr-2">🍯</span>
                                                                    <span class="text-sm font-bold text-gray-800">SWEETNESS</span>
                                                                </div>
                                                                <div class="bg-pink-100 text-pink-900 px-3 py-2 rounded font-bold text-center">
                                                                    {{ strtoupper($item->customJuice->sugar_level) }}
                                                                    @if($item->customJuice->sugar_level == 'no_sugar')
                                                                        ❌ NO SUGAR
                                                                    @elseif($item->customJuice->sugar_level == 'light')
                                                                        🍯 LIGHT SWEET
                                                                    @elseif($item->customJuice->sugar_level == 'regular')
                                                                        🍯🍯 REGULAR SWEET
                                                                    @elseif($item->customJuice->sugar_level == 'extra')
                                                                        🍯🍯🍯 EXTRA SWEET
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endif

                                                        <!-- Total Price -->
                                                        <div class="bg-white rounded-lg p-3 border-2 border-green-300">
                                                            <div class="flex items-center mb-2">
                                                                <span class="text-green-600 text-lg mr-2">💰</span>
                                                                <span class="text-sm font-bold text-gray-800">PRICE</span>
                                                            </div>
                                                            <div class="bg-green-100 text-green-900 px-3 py-2 rounded font-bold text-center text-lg">
                                                                ${{ number_format($item->customJuice->total_price ?? $item->price, 2) }}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Selected Fruits with Quantities -->
                                                    @if($item->customJuice->selected_fruits)
                                                        <div class="mb-4">
                                                            <div class="flex items-center mb-3">
                                                                <span class="text-orange-600 text-lg mr-2">🍊</span>
                                                                <span class="text-sm font-bold text-gray-800">SELECTED FRUITS & QUANTITIES</span>
                                                            </div>
                                                            <div class="bg-white rounded-lg p-3 border-2 border-orange-300">
                                                                @php
                                                                    $selectedFruits = $item->customJuice->selected_fruits;
                                                                    if (is_string($selectedFruits)) {
                                                                        $selectedFruits = json_decode($selectedFruits, true);
                                                                    }
                                                                @endphp
                                                                @if(is_array($selectedFruits) && !empty($selectedFruits))
                                                                    <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                                                                        @foreach($selectedFruits as $fruitId => $quantity)
                                                                            @php
                                                                                $fruit = \App\Models\Fruit::find($fruitId);
                                                                            @endphp
                                                                            @if($fruit)
                                                                                <div class="bg-orange-100 border-2 border-orange-400 rounded-lg p-2 text-center">
                                                                                    <div class="text-lg">{{ $fruit->emoji ?? '🍊' }}</div>
                                                                                    <div class="font-semibold text-orange-900 text-sm">{{ $fruit->name }}</div>
                                                                                    <div class="text-xs text-orange-700 font-bold">Qty: {{ $quantity }}</div>
                                                                                </div>
                                                                            @endif
                                                                        @endforeach
                                                                    </div>
                                                                @else
                                                                    <div class="text-gray-600 italic text-center">No fruits specified</div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endif


                                                    <!-- Preparation Summary -->
                                                    <div class="bg-gray-900 text-white rounded-lg p-3 mt-4">
                                                        <div class="flex items-center mb-2">
                                                            <span class="text-yellow-400 text-lg mr-2">👨‍🍳</span>
                                                            <span class="text-sm font-bold text-yellow-400">PREPARATION SUMMARY</span>
                                                        </div>
                                                        <div class="text-sm space-y-1">
                                                            <div>• Blend selected fruits with specified quantities</div>
                                                            <div>• Use {{ strtoupper($item->customJuice->size ?? 'medium') }} cup ({{ $item->customJuice->size == 'small' ? '12oz' : ($item->customJuice->size == 'large' ? '20oz' : '16oz') }})</div>
                                                            <div>• Add {{ strtoupper($item->customJuice->ice_level ?? 'regular') }} ice</div>
                                                            <div>• Sweetness level: {{ strtoupper($item->customJuice->sugar_level ?? 'regular') }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-right ml-4">
                                                <p class="font-semibold">Qty: {{ $item->quantity }}</p>
                                                <p class="text-green-600 font-bold">${{ number_format($item->price * $item->quantity, 2) }}</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Status Management -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6 sticky top-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">🔄 Order Status</h3>
                        
                        <!-- Current Status -->
                        <div class="mb-6">
                            @php
                                $statusInfo = [
                                    'pending' => ['color' => 'bg-red-100 text-red-800', 'icon' => '⏳', 'label' => 'Pending'],
                                    'preparing' => ['color' => 'bg-yellow-100 text-yellow-800', 'icon' => '🔄', 'label' => 'Preparing'],
                                    'ready' => ['color' => 'bg-green-100 text-green-800', 'icon' => '✅', 'label' => 'Ready'],
                                    'completed' => ['color' => 'bg-blue-100 text-blue-800', 'icon' => '🏁', 'label' => 'Completed']
                                ];
                                $current = $statusInfo[$order->status] ?? ['color' => 'bg-gray-100 text-gray-800', 'icon' => '❓', 'label' => 'Unknown'];
                            @endphp
                            
                            <div class="text-center">
                                <div class="text-4xl mb-2">{{ $current['icon'] }}</div>
                                <span class="inline-flex px-3 py-2 text-sm font-semibold rounded-full {{ $current['color'] }}">
                                    {{ $current['label'] }}
                                </span>
                            </div>
                        </div>

                        <!-- Status Update Form -->
                        <form action="{{ route('employee.orders.updateStatus', $order) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            
                            <div class="mb-4">
                                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Update Status</label>
                                <select name="status" id="status" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500" required>
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>⏳ Pending</option>
                                    <option value="preparing" {{ $order->status == 'preparing' ? 'selected' : '' }}>🔄 Preparing</option>
                                    <option value="ready" {{ $order->status == 'ready' ? 'selected' : '' }}>✅ Ready for Pickup</option>
                                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>🏁 Completed</option>
                                </select>
                            </div>

                            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-semibold transition-colors">
                                Update Status
                            </button>
                        </form>

                        <!-- Order Summary -->
                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <h4 class="font-medium text-gray-900 mb-3">📊 Order Summary</h4>
                            <div class="space-y-2 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Items:</span>
                                    <span>{{ $order->orderItems->sum('quantity') }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Subtotal:</span>
                                    <span>LKR {{ number_format($order->subtotal, 0) }}</span>
                                </div>
                                <div class="flex justify-between font-semibold text-lg pt-2 border-t">
                                    <span>Total:</span>
                                    <span class="text-green-600">LKR {{ number_format($order->total, 0) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-employee-layout>