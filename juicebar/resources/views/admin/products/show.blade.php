<x-admin-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl text-gray-800 leading-tight">
                    Product Details
                </h2>
                <p class="text-gray-600 mt-1">🧃 {{ $product->name }}</p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('admin.products.edit', $product) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors duration-200 flex items-center space-x-2 shadow-lg">
                    <span>✏️</span>
                    <span>Edit</span>
                </a>
                <a href="{{ route('admin.products.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors duration-200 flex items-center space-x-2 shadow-lg">
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
                    <!-- Image Section -->
                    <div class="md:w-1/3 bg-gray-50 p-8">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-64 object-cover rounded-lg shadow-md">
                        @else
                            <div class="w-full h-64 bg-gradient-to-br {{ $product->bg_color ?? 'from-gray-200 to-gray-300' }} rounded-lg flex items-center justify-center">
                                <span class="text-6xl">{{ $product->emoji ?? '🧃' }}</span>
                            </div>
                        @endif
                        <div class="mt-4 text-center">
                            <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 text-sm rounded-full">
                                {{ $product->image ? 'Custom Image' : 'Default Display' }}
                            </span>
                        </div>
                    </div>

                    <!-- Details Section -->
                    <div class="md:w-2/3 p-8">
                        <div class="space-y-6">
                            <!-- Name and Status -->
                            <div>
                                <h3 class="text-2xl font-bold text-gray-900">{{ $product->name }}</h3>
                                <div class="mt-2">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $product->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $product->is_active ? '✅ Available' : '❌ Unavailable' }}
                                    </span>
                                </div>
                            </div>

                            <!-- Category and Price -->
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <label class="text-sm font-medium text-gray-500">Category</label>
                                    <div class="mt-1">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                            {{ $product->category }}
                                        </span>
                                    </div>
                                </div>
                                <div>
                                    <label class="text-sm font-medium text-gray-500">Price</label>
                                    <div class="mt-1 text-2xl font-bold text-green-600">
                                        ${{ number_format($product->price, 2) }}
                                    </div>
                                </div>
                            </div>

                            <!-- Description -->
                            <div>
                                <label class="text-sm font-medium text-gray-500">Description</label>
                                <div class="mt-2 text-gray-900 leading-relaxed">
                                    {{ $product->description }}
                                </div>
                            </div>

                            <!-- Timestamps -->
                            <div class="grid grid-cols-2 gap-6 pt-6 border-t border-gray-200">
                                <div>
                                    <label class="text-sm font-medium text-gray-500">Created</label>
                                    <div class="mt-1 text-sm text-gray-900">
                                        {{ $product->created_at->format('M d, Y \a\t g:i A') }}
                                    </div>
                                </div>
                                <div>
                                    <label class="text-sm font-medium text-gray-500">Last Updated</label>
                                    <div class="mt-1 text-sm text-gray-900">
                                        {{ $product->updated_at->format('M d, Y \a\t g:i A') }}
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
                    <a href="{{ route('admin.products.edit', $product) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-semibold">
                        Edit Product
                    </a>
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this product? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-semibold">
                            Delete Product
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>