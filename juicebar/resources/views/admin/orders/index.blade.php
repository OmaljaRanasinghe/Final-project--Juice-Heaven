<x-admin-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <img src="{{ asset('logo/logo.png') }}" alt="JuiceBar Logo" class="h-10 w-10 mr-3 rounded-lg shadow-sm">
                <div>
                    <h2 class="font-bold text-3xl text-gray-800 leading-tight">
                        Order Management
                    </h2>
                    <p class="text-gray-600 mt-1">📦 Monitor and manage customer orders</p>
                </div>
            </div>
            <div class="flex space-x-4">
                <select onchange="filterOrders(this.value)" class="bg-white border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-red-500">
                    <option value="">All Orders</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="preparing" {{ request('status') == 'preparing' ? 'selected' : '' }}>Preparing</option>
                    <option value="ready" {{ request('status') == 'ready' ? 'selected' : '' }}>Ready</option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
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

            <!-- Order Status Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Pending</p>
                            <p class="text-3xl font-bold text-red-600 mt-1">{{ $statusCounts['pending'] }}</p>
                        </div>
                        <div class="bg-red-100 p-3 rounded-lg">
                            <span class="text-2xl">⏳</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Preparing</p>
                            <p class="text-3xl font-bold text-yellow-600 mt-1">{{ $statusCounts['preparing'] }}</p>
                        </div>
                        <div class="bg-yellow-100 p-3 rounded-lg">
                            <span class="text-2xl">🔄</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Ready</p>
                            <p class="text-3xl font-bold text-green-600 mt-1">{{ $statusCounts['ready'] }}</p>
                        </div>
                        <div class="bg-green-100 p-3 rounded-lg">
                            <span class="text-2xl">✅</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Completed</p>
                            <p class="text-3xl font-bold text-blue-600 mt-1">{{ $statusCounts['completed'] }}</p>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-lg">
                            <span class="text-2xl">🏁</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800">All Orders</h3>
                </div>

                @if($orders->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order #</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($orders as $order)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $order->order_number }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $order->user->name ?? $order->billing_name }}</div>
                                    <div class="text-sm text-gray-500">{{ $order->user->email ?? $order->billing_email }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $order->created_at->format('M d, Y g:i A') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                    LKR {{ number_format($order->total, 0) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        $statusConfig = [
                                            'pending' => ['bg' => 'bg-red-100', 'text' => 'text-red-800', 'icon' => '⏳'],
                                            'preparing' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-800', 'icon' => '🔄'],
                                            'ready' => ['bg' => 'bg-green-100', 'text' => 'text-green-800', 'icon' => '✅'],
                                            'completed' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-800', 'icon' => '🏁'],
                                            'cancelled' => ['bg' => 'bg-gray-100', 'text' => 'text-gray-800', 'icon' => '❌']
                                        ];
                                        $config = $statusConfig[$order->status] ?? ['bg' => 'bg-gray-100', 'text' => 'text-gray-800', 'icon' => '❓'];
                                    @endphp
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $config['bg'] }} {{ $config['text'] }}">
                                        <span class="mr-1">{{ $config['icon'] }}</span>
                                        {{ ucfirst($order->status) }}
                                    </span>
                                    @if($order->updated_by_employee)
                                        <div class="text-xs text-gray-500 mt-1">
                                            Updated by: {{ $order->updated_by_employee }}
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                    <a href="{{ route('admin.orders.show', $order) }}" class="text-blue-600 hover:text-blue-900">View</a>
                                    <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this order?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $orders->links() }}
                </div>
                @else
                <div class="text-center py-12">
                    <div class="text-6xl mb-4">📦</div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">No Orders Found</h3>
                    <p class="text-gray-600 mb-6">Orders will appear here once customers start placing them.</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        function filterOrders(status) {
            const url = new URL(window.location);
            if (status) {
                url.searchParams.set('status', status);
            } else {
                url.searchParams.delete('status');
            }
            window.location = url;
        }
    </script>
</x-admin-layout>