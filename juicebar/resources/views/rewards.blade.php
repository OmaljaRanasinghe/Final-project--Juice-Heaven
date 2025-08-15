<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl text-gray-800 leading-tight">
                    {{ __('Rewards Program') }}
                </h2>
                <p class="text-gray-600 mt-1">🎁 Earn points and unlock amazing rewards with every sip!</p>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('product') }}" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors duration-200 flex items-center space-x-2 shadow-lg">
                    <span>🧃</span>
                    <span>Shop Juices</span>
                </a>
                <a href="{{ route('favorites') }}" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors duration-200 flex items-center space-x-2 shadow-lg">
                    <span>❤️</span>
                    <span>My Favorites</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-gradient-to-br from-yellow-50 via-orange-50 to-red-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Current Points Section -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-8 mb-8">
                <div class="text-center">
                    <div class="text-6xl mb-4">🏆</div>
                    <h3 class="text-3xl font-bold text-gray-800 mb-2">Your Reward Points</h3>
                    <div class="text-5xl font-bold text-yellow-600 mb-4">{{ number_format($user->points) }} pts</div>
                    
                    <!-- Member Status -->
                    <div class="inline-flex items-center px-4 py-2 rounded-full font-semibold mb-4
                        @if($user->points_level === 'Gold') bg-yellow-100 border border-yellow-300 text-yellow-800
                        @elseif($user->points_level === 'Silver') bg-gray-100 border border-gray-300 text-gray-800
                        @elseif($user->points_level === 'Bronze') bg-orange-100 border border-orange-300 text-orange-800
                        @else bg-blue-100 border border-blue-300 text-blue-800
                        @endif">
                        @if($user->points_level === 'Gold')
                            👑 Gold Member
                        @elseif($user->points_level === 'Silver')
                            🥈 Silver Member
                        @elseif($user->points_level === 'Bronze')
                            🥉 Bronze Member
                        @else
                            🌟 Starter Member
                        @endif
                    </div>
                    <p class="text-gray-600 mb-6">Keep earning points with every purchase!</p>
                    
                    <!-- Points Info -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 max-w-2xl mx-auto">
                        <div class="bg-green-50 p-4 rounded-lg">
                            <div class="text-2xl mb-2">💰</div>
                            <div class="font-semibold text-green-800">Earn Points</div>
                            <div class="text-sm text-green-600">$1 = 1 Point</div>
                        </div>
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <div class="text-2xl mb-2">🎯</div>
                            <div class="font-semibold text-blue-800">Redeem Rewards</div>
                            <div class="text-sm text-blue-600">Use points for free items</div>
                        </div>
                        <div class="bg-purple-50 p-4 rounded-lg">
                            <div class="text-2xl mb-2">⭐</div>
                            <div class="font-semibold text-purple-800">Level Up</div>
                            <div class="text-sm text-purple-600">Unlock better rewards</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Available Rewards -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-8 mb-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                    <span class="text-3xl mr-3">🎁</span>
                    Available Rewards
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($availableRewards as $reward)
                    <div class="border border-gray-200 rounded-xl p-6 hover:shadow-md transition-shadow duration-300 relative">
                        <!-- Reward Header -->
                        <div class="text-center mb-4">
                            <div class="text-4xl mb-3">{{ $reward['emoji'] }}</div>
                            <h4 class="text-xl font-bold text-gray-800 mb-2">{{ $reward['title'] }}</h4>
                            <p class="text-gray-600 text-sm">{{ $reward['description'] }}</p>
                        </div>
                        
                        <!-- Points Required -->
                        <div class="bg-gradient-to-r {{ $reward['color'] }} text-white text-center py-2 px-4 rounded-lg mb-4">
                            <div class="font-bold">{{ $reward['points_required'] }} Points</div>
                        </div>
                        
                        <!-- Redeem Button -->
                        @if($user->points >= $reward['points_required'])
                            <button onclick="redeemReward({{ $reward['id'] }})" 
                                    class="w-full bg-green-600 hover:bg-green-700 text-white py-3 rounded-lg font-semibold transition-colors duration-200">
                                ✨ Redeem Now
                            </button>
                        @else
                            <div class="w-full bg-gray-300 text-gray-500 py-3 rounded-lg font-semibold text-center cursor-not-allowed">
                                Need {{ $reward['points_required'] - $user->points }} more points
                            </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Recent Orders -->
            @if($orders->count() > 0)
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                    <span class="text-3xl mr-3">📋</span>
                    Recent Orders & Points Earned
                </h3>
                
                <div class="space-y-4">
                    @foreach($orders as $order)
                    <div class="flex justify-between items-center p-4 bg-gray-50 rounded-lg">
                        <div>
                            <div class="font-semibold text-gray-800">Order #{{ $order->order_number }}</div>
                            <div class="text-sm text-gray-600">{{ $order->created_at->format('M d, Y') }} • {{ $order->orderItems->count() }} items</div>
                        </div>
                        <div class="text-right">
                            <div class="font-semibold text-gray-800">${{ number_format($order->total, 2) }}</div>
                            <div class="text-sm text-green-600">+{{ floor($order->total) }} points</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Success Modal -->
    <div id="successModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-lg p-8 max-w-md mx-4 text-center">
            <div class="text-6xl mb-4">🎉</div>
            <h3 class="text-2xl font-bold text-gray-800 mb-4">Reward Redeemed!</h3>
            <p id="successMessage" class="text-gray-600 mb-6"></p>
            <div class="text-lg font-semibold text-green-600 mb-6">
                Remaining Points: <span id="remainingPoints"></span>
            </div>
            <button onclick="closeModal()" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold">
                Continue Shopping
            </button>
        </div>
    </div>

    <script>
        function redeemReward(rewardId) {
            fetch('{{ route('rewards.redeem') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ reward_id: rewardId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('successMessage').textContent = data.message;
                    document.getElementById('remainingPoints').textContent = data.remaining_points + ' pts';
                    document.getElementById('successModal').classList.remove('hidden');
                    document.getElementById('successModal').classList.add('flex');
                    
                    // Update points display
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                } else {
                    alert(data.error);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            });
        }

        function closeModal() {
            document.getElementById('successModal').classList.add('hidden');
            document.getElementById('successModal').classList.remove('flex');
        }
    </script>
</x-app-layout>