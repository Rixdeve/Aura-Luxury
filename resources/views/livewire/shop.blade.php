<div>
    <section class="py-8 px-4 max-w-screen mx-auto bg-white">
        <h2 class="text-2xl md:text-3xl font-semibold text-center mb-8">Do it with Aura.</h2>
        <div class="flex flex-col lg:flex-row gap-8">
            <div class="w-full lg:w-1/4">
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-4 text-gray-700">Filters</h3>
                    <div class="space-y-6">
                        <div>
                            <label for="category" class="block text-gray-700 font-medium mt-4">Category</label>
                            <select wire:model.live="category" name="category"
                                class="w-full border border-gray-300 rounded-lg p-2 text-gray-700">
                                <option value="">All Categories</option>
                                <option value="Watch">Watch</option>
                                <option value="Perfume">Perfume</option>
                            </select>
                            <label for="brand" class="block text-gray-700 font-medium mt-4 mb-4">Brand</label>
                            <select wire:model.live="brand" name="brand"
                                class="w-full border border-gray-300 rounded-lg p-2 text-gray-700">
                                <option value="">All Brands</option>
                                <option value="ROLEX">Rolex</option>
                                <option value="CHANNEL">Channel</option>
                                <option value="HUBLOT">Hublot</option>
                                <option value="DUCATI">Ducati</option>
                                <option value="TAG HEUER">Tag Heuer</option>
                                <option value="CITIZEN">Citizen</option>
                                <option value="SEIKO">Seiko</option>
                                <option value="DIOR">Dior</option>
                                <option value="GUERLAIN">Guerlain</option>
                                <option value="CREED">Creed</option>
                                <option value="AMOUAGE">Amouage</option>
                            </select>
                            <label for="types" class="block text-gray-700 font-medium mt-4 mb-4">Gender</label>
                            <select wire:model.live="types" name="types"
                                class="w-full border border-gray-300 rounded-lg p-2 text-gray-700">
                                <option value="">All Genders</option>
                                <option value="Unisex">Unisex</option>
                                <option value="Female">Female</option>
                                <option value="Male">Male</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-3/4">
                @if ($products->count())
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6">
                    @foreach ($products as $product)
                    <div
                        class="flex flex-col rounded-sm overflow-hidden shadow-md hover:scale-[1.01] transition-all relative">
                        <a href="{{ route('product.view', $product->_id) }}" class="block">
                            <div class="w-full h-52 overflow-hidden bg-white">
                                <img src="https://storage.googleapis.com/aura_images/{{ $product->img_url }}"
                                    alt="{{ $product->product_name }}" class="w-full h-full object-cover">
                            </div>

                            <div class="p-4">
                                <h5 class="text-sm sm:text-base font-semibold text-slate-900 line-clamp-2">
                                    {{ $product->product_name }}
                                </h5>
                                <div class="mt-2 flex items-center flex-wrap gap-2">
                                    <h6 class="text-sm sm:text-base font-semibold text-slate-900">
                                        Rs.{{ number_format($product->price, 2) }}
                                    </h6>
                                </div>
                            </div>
                        </a>
                        <div class="min-h-[50px] p-4 !pt-0">
                            <button wire:click="addToCart('{{ $product->_id }}')"
                                class="text-sm px-2 py-2 font-medium w-full bg-purple-600 hover:bg-purple-700 text-white rounded-sm">
                                Add to cart
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-center text-gray-500 text-lg mt-10">No products found matching your filters.</p>
                @endif
            </div>
        </div>
    </section>
</div>