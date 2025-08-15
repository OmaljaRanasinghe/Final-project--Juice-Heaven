<x-admin-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl text-gray-800 leading-tight">
                    Fruit Details
                </h2>
                <p class="text-gray-600 mt-1">🍊 {{ $fruit->name }}</p>
                <div class="mt-2 p-2 bg-blue-50 border border-blue-200 rounded-lg">
                    <p class="text-xs text-blue-800">
                        Available for customer custom juice creation
                    </p>
                </div>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('admin.fruits.edit', $fruit) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors duration-200 flex items-center space-x-2 shadow-lg">
                    <span>✏️</span>
                    <span>Edit</span>
                </a>
                <a href="{{ route('admin.fruits.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors duration-200 flex items-center space-x-2 shadow-lg">
                    <span>←</span>
                    <span>Back</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="md:flex">
                    <!-- Fruit Visual -->
                    <div class="md:w-1/3 bg-gradient-to-br from-orange-50 to-yellow-50 p-8 text-center">
                        <div class="text-8xl mb-4">{{ $fruit->emoji }}</div>
                        <div class="text-xl font-bold text-gray-800">{{ $fruit->name }}</div>
                        <div class="text-sm text-gray-600 mt-2">{{ $fruit->color }}</div>
                    </div>

                    <!-- Details Section -->
                    <div class="md:w-2/3 p-8">
                        <div class="space-y-6">
                            <!-- Basic Info -->
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <label class="text-sm font-medium text-gray-500">Price per Serving</label>
                                    <div class="text-2xl font-bold text-green-600">
                                        ${{ number_format($fruit->price_per_serving, 2) }}
                                    </div>
                                </div>
                                <div>
                                    <label class="text-sm font-medium text-gray-500">Stock Level</label>
                                    <div class="mt-1">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $fruit->stock_level > 20 ? 'bg-green-100 text-green-800' : ($fruit->stock_level > 5 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                            {{ $fruit->stock_level }} units
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Status -->
                            <div>
                                <label class="text-sm font-medium text-gray-500">Availability</label>
                                <div class="mt-2">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $fruit->is_available ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $fruit->is_available ? '✅ Available' : '❌ Unavailable' }}
                                    </span>
                                </div>
                            </div>

                            <!-- Description -->
                            <div>
                                <label class="text-sm font-medium text-gray-500">Description</label>
                                <div class="mt-2 text-gray-900 leading-relaxed">
                                    {{ $fruit->description }}
                                </div>
                            </div>

                            <!-- Nutritional Benefits -->
                            @if($fruit->nutritional_benefits && count($fruit->nutritional_benefits) > 0)
                            <div>
                                <label class="text-sm font-medium text-gray-500">Nutritional Benefits</label>
                                <div class="mt-2 flex flex-wrap gap-2">
                                    @foreach($fruit->nutritional_benefits as $benefit)
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                        {{ trim($benefit) }}
                                    </span>
                                    @endforeach
                                </div>
                            </div>
                            @endif

                            <!-- Timestamps -->
                            <div class="grid grid-cols-2 gap-6 pt-6 border-t border-gray-200">
                                <div>
                                    <label class="text-sm font-medium text-gray-500">Added</label>
                                    <div class="mt-1 text-sm text-gray-900">
                                        {{ $fruit->created_at->format('M d, Y \a\t g:i A') }}
                                    </div>
                                </div>
                                <div>
                                    <label class="text-sm font-medium text-gray-500">Last Updated</label>
                                    <div class="mt-1 text-sm text-gray-900">
                                        {{ $fruit->updated_at->format('M d, Y \a\t g:i A') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="mt-6 bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                <h4 class="text-lg font-semibold text-gray-800 mb-4">Quick Actions</h4>
                <div class="flex space-x-4">
                    <a href="{{ route('admin.fruits.edit', $fruit) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-semibold">
                        Edit Fruit
                    </a>
                    <form action="{{ route('admin.fruits.destroy', $fruit) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this fruit? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-semibold">
                            Delete Fruit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>