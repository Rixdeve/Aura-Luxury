<div class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-wrap -mx-4">
            <div class=" w-full md:w-1/2 px-4 mb-8">
                <img src="{{ $tempUrl }}" alt="{{ $product->product_name }}"
                    class="rounded-lg shadow-md mb-4 w-full h-full object-contain" id="mainImage">
            </div>

            <!-- Product Details -->
            <div class="w-1/2 md:w-1/2 h-1/2 px-4">
                <h2 class="text-3xl font-bold mb-2">{{ $product->product_name }}</h2>
                <p class="text-gray-600 mb-4">{{ $product->brand }}</p>
                <div class="mb-4">
                    <span class="text-2xl font-bold mr-2">Rs.{{ number_format($product->price, 2) }}</span>
                    @if ($product->discounted_price && $product->discounted_price < $product->price)
                        <span class="text-sm text-gray-400 line-through ml-2">
                            Rs.{{ number_format($product->discounted_price, 2) }}
                        </span>
                        @endif
                </div>
                <p class="text-gray-700 mb-6">{{ $product->description }}</p>

                <div class="mb-6">
                    <p class="text-gray-600 mb-4">Gender: {{ $product->types }}</p>
                    @if ($product->watch_color)
                    <p class="text-gray-600 mb-4">Watch Color: {{ $product->watch_color }}</p>
                    @endif
                </div>

                <div class="mb-6">
                    <label for="quantity" class="block text-sm font-medium text-gray-700 mb-1">Quantity:</label>
                    <input type=" number" id="quantity" name="quantity" min="1" value="1" max="5"
                        class="w-12 text-center rounded-md border-gray-300  shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <!-- <h1>{{ $product->id }}</h1> -->
                <div class="flex space-x-4 mb-6">
                    <button wire:click="addToCart('{{ $product->id }}')" class="bg-indigo-600 flex gap-2 items-center text-white px-6 py-2 rounded-md hover:bg-indigo-700
           focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75
               m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84
               M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0
               .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0
               .75.75 0 0 1 1.5 0Z" />
                        </svg>
                        Add to Cart
                    </button>



                </div>


            </div>
        </div>
    </div>
</div>