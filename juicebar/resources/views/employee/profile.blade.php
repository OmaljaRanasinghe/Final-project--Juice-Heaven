<x-employee-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl text-gray-800 leading-tight">
                    Employee Profile
                </h2>
                <p class="text-gray-600 mt-1">👤 Your profile and work statistics</p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Profile Information -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                        <div class="text-center mb-6">
                            <!-- Profile Avatar -->
                            <div class="w-24 h-24 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <span class="text-blue-600 text-3xl font-bold">{{ strtoupper(substr($employee->name, 0, 2)) }}</span>
                            </div>
                            
                            <!-- Name and Role -->
                            <h3 class="text-xl font-bold text-gray-900 mb-1">{{ $employee->name }}</h3>
                            <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mb-3">
                                <span class="mr-1">👷</span>
                                Employee
                            </div>
                        </div>

                        <!-- Profile Details -->
                        <div class="space-y-4">
                            <!-- Email -->
                            <div class="border-l-4 border-blue-500 pl-4">
                                <div class="flex items-center mb-1">
                                    <span class="text-gray-600 mr-2">📧</span>
                                    <span class="text-sm font-medium text-gray-700">Email</span>
                                </div>
                                <div class="text-gray-900">{{ $employee->email }}</div>
                            </div>

                            <!-- Employee ID -->
                            @if($employee->employee_id)
                                <div class="border-l-4 border-green-500 pl-4">
                                    <div class="flex items-center mb-1">
                                        <span class="text-gray-600 mr-2">🆔</span>
                                        <span class="text-sm font-medium text-gray-700">Employee ID</span>
                                    </div>
                                    <div class="text-gray-900 font-mono">{{ $employee->employee_id }}</div>
                                </div>
                            @endif

                            <!-- Join Date -->
                            <div class="border-l-4 border-purple-500 pl-4">
                                <div class="flex items-center mb-1">
                                    <span class="text-gray-600 mr-2">📅</span>
                                    <span class="text-sm font-medium text-gray-700">Joined</span>
                                </div>
                                <div class="text-gray-900">{{ $employee->created_at->format('M d, Y') }}</div>
                            </div>

                            <!-- Last Login -->
                            @if($employee->last_login_at)
                                <div class="border-l-4 border-yellow-500 pl-4">
                                    <div class="flex items-center mb-1">
                                        <span class="text-gray-600 mr-2">🕐</span>
                                        <span class="text-sm font-medium text-gray-700">Last Login</span>
                                    </div>
                                    <div class="text-gray-900">{{ $employee->last_login_at->format('M d, Y - H:i') }}</div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Work Statistics & Activity -->
                <div class="lg:col-span-2">
                    <!-- Work Statistics -->
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6 mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">📊 Work Statistics</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <!-- Total Orders Handled -->
                            <div class="text-center p-4 bg-blue-50 rounded-lg border border-blue-200">
                                <div class="text-3xl font-bold text-blue-600 mb-1">{{ $totalOrdersHandled }}</div>
                                <div class="text-sm text-blue-800 font-medium">Total Orders Handled</div>
                            </div>

                            <!-- Today's Orders -->
                            <div class="text-center p-4 bg-green-50 rounded-lg border border-green-200">
                                <div class="text-3xl font-bold text-green-600 mb-1">{{ $todaysOrdersHandled }}</div>
                                <div class="text-sm text-green-800 font-medium">Orders Today</div>
                            </div>

                            <!-- Performance Badge -->
                            <div class="text-center p-4 bg-yellow-50 rounded-lg border border-yellow-200">
                                <div class="text-2xl mb-1">
                                    @if($totalOrdersHandled >= 100)
                                        🏆
                                    @elseif($totalOrdersHandled >= 50)
                                        🥈
                                    @elseif($totalOrdersHandled >= 20)
                                        🥉
                                    @else
                                        ⭐
                                    @endif
                                </div>
                                <div class="text-sm text-yellow-800 font-medium">
                                    @if($totalOrdersHandled >= 100)
                                        Expert Level
                                    @elseif($totalOrdersHandled >= 50)
                                        Advanced
                                    @elseif($totalOrdersHandled >= 20)
                                        Experienced
                                    @else
                                        Getting Started
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">📝 Recent Activity</h3>
                        
                        @if($recentActivity->count() > 0)
                            <div class="space-y-4 max-h-96 overflow-y-auto">
                                @foreach($recentActivity as $order)
                                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg border">
                                        <div class="flex items-center space-x-4">
                                            <!-- Status Icon -->
                                            <div class="flex-shrink-0">
                                                @php
                                                    $statusIcons = [
                                                        'pending' => '⏳',
                                                        'preparing' => '🔄',
                                                        'ready' => '✅',
                                                        'completed' => '🏁'
                                                    ];
                                                @endphp
                                                <span class="text-2xl">{{ $statusIcons[$order->status] ?? '❓' }}</span>
                                            </div>
                                            
                                            <!-- Order Details -->
                                            <div>
                                                <div class="font-semibold text-gray-900">
                                                    Order #{{ $order->id }} - {{ ucfirst($order->status) }}
                                                </div>
                                                <div class="text-sm text-gray-600">
                                                    {{ $order->user->name ?? 'Customer' }} • {{ $order->orderItems->count() }} items
                                                </div>
                                                <div class="text-xs text-gray-500">
                                                    {{ $order->status_updated_at ? $order->status_updated_at->format('M d, Y - H:i') : $order->updated_at->format('M d, Y - H:i') }}
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Order Value -->
                                        <div class="text-right">
                                            <div class="text-sm font-semibold text-green-600">
                                                LKR {{ number_format($order->total, 0) }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8">
                                <div class="text-4xl mb-3">📝</div>
                                <h4 class="text-lg font-medium text-gray-900 mb-2">No Recent Activity</h4>
                                <p class="text-gray-600">Your order handling activity will appear here.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="mt-8 bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">⚡ Quick Actions</h3>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <a href="{{ route('employee.orders.index') }}" class="flex items-center justify-center p-4 bg-blue-50 hover:bg-blue-100 border border-blue-200 rounded-lg transition-colors">
                        <span class="text-blue-600 text-xl mr-2">📦</span>
                        <span class="text-blue-800 font-medium">View Orders</span>
                    </a>
                    
                    <a href="{{ route('employee.orders.index') }}?status=pending" class="flex items-center justify-center p-4 bg-red-50 hover:bg-red-100 border border-red-200 rounded-lg transition-colors">
                        <span class="text-red-600 text-xl mr-2">⏳</span>
                        <span class="text-red-800 font-medium">Pending Orders</span>
                    </a>
                    
                    <a href="{{ route('employee.orders.index') }}?status=preparing" class="flex items-center justify-center p-4 bg-yellow-50 hover:bg-yellow-100 border border-yellow-200 rounded-lg transition-colors">
                        <span class="text-yellow-600 text-xl mr-2">🔄</span>
                        <span class="text-yellow-800 font-medium">In Progress</span>
                    </a>
                    
                    <a href="{{ route('employee.dashboard') }}" class="flex items-center justify-center p-4 bg-green-50 hover:bg-green-100 border border-green-200 rounded-lg transition-colors">
                        <span class="text-green-600 text-xl mr-2">📊</span>
                        <span class="text-green-800 font-medium">Dashboard</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-employee-layout>