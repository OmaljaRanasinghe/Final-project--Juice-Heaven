<x-admin-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl text-gray-800 leading-tight">
                    Edit Fruit
                </h2>
                <p class="text-gray-600 mt-1">🍊 Update "{{ $fruit->name }}"</p>
            </div>
            <div>
                <a href="{{ route('admin.fruits.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors duration-200 flex items-center space-x-2 shadow-lg">
                    <span>←</span>
                    <span>Back to Fruits</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-8">
                <form action="{{ route('admin.fruits.update', $fruit) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Fruit Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $fruit->name) }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Emoji -->
                        <div>
                            <label for="emoji" class="block text-sm font-medium text-gray-700 mb-2">Emoji</label>
                            <input type="text" name="emoji" id="emoji" value="{{ old('emoji', $fruit->emoji) }}" placeholder="🍊" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                            @error('emoji')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Color -->
                        <div>
                            <label for="color" class="block text-sm font-medium text-gray-700 mb-2">Color</label>
                            <input type="text" name="color" id="color" value="{{ old('color', $fruit->color) }}" placeholder="Orange" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                            @error('color')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Price per Serving -->
                        <div>
                            <label for="price_per_serving" class="block text-sm font-medium text-gray-700 mb-2">Price per Serving ($)</label>
                            <input type="number" name="price_per_serving" id="price_per_serving" value="{{ old('price_per_serving', $fruit->price_per_serving) }}" step="0.01" min="0" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                            @error('price_per_serving')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Stock Level -->
                        <div>
                            <label for="stock_level" class="block text-sm font-medium text-gray-700 mb-2">Stock Level</label>
                            <input type="number" name="stock_level" id="stock_level" value="{{ old('stock_level', $fruit->stock_level) }}" min="0" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                            @error('stock_level')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Availability -->
                        <div class="flex items-center">
                            <input type="checkbox" name="is_available" id="is_available" value="1" {{ old('is_available', $fruit->is_available) ? 'checked' : '' }} class="h-5 w-5 text-green-600 border-gray-300 rounded focus:ring-green-500">
                            <label for="is_available" class="ml-3 text-sm font-medium text-gray-700">Available for Use</label>
                        </div>

                        <!-- Description -->
                        <div class="md:col-span-2">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                            <textarea name="description" id="description" rows="3" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500" required>{{ old('description', $fruit->description) }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nutritional Benefits -->
                        <div class="md:col-span-2">
                            <label for="nutritional_benefits" class="block text-sm font-medium text-gray-700 mb-2">Nutritional Benefits (comma-separated)</label>
                            <textarea name="nutritional_benefits" id="nutritional_benefits" rows="2" placeholder="Vitamin C, Fiber, Antioxidants" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500">{{ old('nutritional_benefits', is_array($fruit->nutritional_benefits) ? implode(', ', $fruit->nutritional_benefits) : '') }}</textarea>
                            @error('nutritional_benefits')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end space-x-4">
                        <a href="{{ route('admin.fruits.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-6 py-2 rounded-lg font-semibold">
                            Cancel
                        </a>
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg font-semibold">
                            Update Fruit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>