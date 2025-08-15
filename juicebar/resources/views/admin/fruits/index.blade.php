<x-admin-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <img src="{{ asset('logo/logo.png') }}" alt="JuiceBar Logo" class="h-10 w-10 mr-3 rounded-lg shadow-sm">
                <div>
                    <h2 class="font-bold text-3xl text-gray-800 leading-tight">
                        Fruit Management
                    </h2>
                    <p class="text-gray-600 mt-1">🍊 Manage available fruits for custom juice creation</p>
                    <div class="mt-2 p-3 bg-blue-50 border border-blue-200 rounded-lg">
                        <p class="text-sm text-blue-800">
                            ℹ️ <strong>Note:</strong> Fruits added here will appear in the "Create Custom Juice" section for customers to build their own juice blends.
                        </p>
                    </div>
                </div>
            </div>
            <div>
                <a href="{{ route('admin.fruits.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors duration-200 flex items-center space-x-2 shadow-lg">
                    <span>➕</span>
                    <span>Add New Fruit</span>
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

            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800">All Fruits</h3>
                </div>

                @if($fruits->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fruit</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price/Serving</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($fruits as $fruit)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="text-3xl mr-3">{{ $fruit->emoji }}</div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">{{ $fruit->name }}</div>
                                            <div class="text-sm text-gray-500">{{ Str::limit($fruit->description, 50) }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                    ${{ number_format($fruit->price_per_serving, 2) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $fruit->stock_level > 20 ? 'bg-green-100 text-green-800' : ($fruit->stock_level > 5 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                        {{ $fruit->stock_level }} units
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $fruit->is_available ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $fruit->is_available ? 'Available' : 'Unavailable' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                    <a href="{{ route('admin.fruits.show', $fruit) }}" class="text-blue-600 hover:text-blue-900">View</a>
                                    <a href="{{ route('admin.fruits.edit', $fruit) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form action="{{ route('admin.fruits.destroy', $fruit) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this fruit?')">
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
                    {{ $fruits->links() }}
                </div>
                @else
                <div class="text-center py-12">
                    <div class="text-6xl mb-4">🍊</div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">No Fruits Found</h3>
                    <p class="text-gray-600 mb-6">Start by adding fruits to your inventory.</p>
                    <a href="{{ route('admin.fruits.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold">
                        Add First Fruit
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-admin-layout>