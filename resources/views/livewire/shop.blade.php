<div>
    <section class="py-12 px-4 max-w-6xl mx-auto">
        <h2 class="text-2xl md:text-3xl font-semibold text-center mb-8">Do it with Aura.</h2>
        <!-- Filters -->
        <div class="flex space-x-6 mb-8">
            <div class="w-1/4">
                <label for="category" class="block text-gray-700 font-medium">Category</label>
                <select wire:model.live="category" name="category"
                    class="w-full border border-gray-300 rounded-lg p-2 text-gray-700">
                    <option value="">All Categories</option>
                    <option value="Watch">Watch</option>
                    <option value="Perfume">Perfume</option>
                </select>
            </div>

            <div class="w-1/4">
                <label for="price" class="block text-gray-700 font-medium">Max Price</label>
                <input type="number" wire:model.live="price"
                    class="w-full border border-gray-300 rounded-lg p-2 text-gray-700" placeholder="Enter max price">

            </div>
        </div>

        <!-- Product Grid -->
        @if ($products->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
            <div
                class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img src="https://storage.googleapis.com/aura_images/{{ $product->img_url }}"
                        alt="{{ $product->product_name }}">
                </a>
                <div class="px-5 pb-5">
                    <a href="#">
                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                            {{ $product->product_name }}
                        </h5>
                    </a>
                    <div class="flex items-center mt-2.5 mb-5">

                        <span
                            class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded-sm dark:bg-blue-200 dark:text-blue-800 ms-3">{{ $product->brand }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span
                            class="text-3xl font-bold text-gray-900 dark:text-white">Rs.{{ number_format($product->price, 2) }}</span>
                        <a href="#"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                            to cart</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p class="text-center text-gray-500 text-lg mt-10">No products found matching your filters.</p>
        @endif
    </section>
</div>