@extends('layouts.admin')

@section('title', 'Add Product')

@section('content')
<div class="max-w-6xl mx-auto mt-8 overflow-x-auto pl-72">
    <h2 class="text-3xl font-semibold text-center mb-8">Add a New Product</h2>

    <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="product_name" class="block text-sm font-medium text-gray-700">Product Name</label>
            <input type="text" name="product_name" id="product_name"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                value="{{ old('product_name') }}" required />
            @error('product_name')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="3"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>{{ old('description') }}</textarea>
            @error('description')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
            <input type="number" name="price" id="price"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                value="{{ old('price') }}" required />
            @error('price')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>


        <div class="mb-4">
            <label for="types" class="block text-sm font-medium text-gray-700">Type</label>
            <select name="types" id="types"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
                <option value="Male" {{ old('types') == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ old('types') == 'Female' ? 'selected' : '' }}>Female</option>
                <option value="Unisex" {{ old('types') == 'Unisex' ? 'selected' : '' }}>Unisex</option>
            </select>
            @error('types')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="availability" class="block text-sm font-medium text-gray-700">Availability</label>
            <select name="availability" id="availability"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
                <option value="In Stock" {{ old('availability') == 'In Stock' ? 'selected' : '' }}>In Stock</option>
                <option value="Out of Stock" {{ old('availability') == 'Out of Stock' ? 'selected' : '' }}>Out of Stock
                </option>
            </select>
            @error('availability')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="qty" class="block text-sm font-medium text-gray-700">Quantity</label>
            <input type="number" name="qty" id="qty"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                value="{{ old('qty') }}" required />
            @error('qty')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="brand" class="block text-sm font-medium text-gray-700">Brand</label>
            <input type="text" name="brand" id="brand"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                value="{{ old('brand') }}" />
            @error('brand')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="watch_color" class="block text-sm font-medium text-gray-700">Watch Color</label>
            <input type="text" name="watch_color" id="watch_color"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                value="{{ old('watch_color') }}" />
            @error('watch_color')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="img_url" class="block text-sm font-medium text-gray-700">Image</label>
            <input type="file" name="img_url" id="img_url"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
            @error('img_url')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
            <select name="category" id="category"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
                <option value="Watch" {{ old('category') == 'Watch' ? 'selected' : '' }}>Watch</option>
                <option value="Perfume" {{ old('category') == 'Perfume' ? 'selected' : '' }}>Perfume</option>
            </select>
            @error('category')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex items-center justify-end mt-6">
            <button type="submit" class="px-6 py-3 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-700">
                Add Product
            </button>
        </div>
    </form>
</div>
@endsection