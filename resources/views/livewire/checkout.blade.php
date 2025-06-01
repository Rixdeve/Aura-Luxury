<div class="bg-white sm:px-8 px-4 py-6">
    <div class="max-w-screen-xl max-md:max-w-xl mx-auto">
        <div class="flex items-start mb-16">

            <div class="w-full">

                <div class="mt-2 mr-4">
                    <h6 class="text-xl font-semibold text-slate-900">Checkout</h6>
                </div>
            </div>

        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-y-12 gap-x-8 lg:gap-x-12">
            <div class="lg:col-span-2">
                @if (session()->has('error'))
                <div class="text-red-600 mb-4">{{ session('error') }}</div>
                @endif
                <form wire:submit.prevent="placeOrder">
                    @csrf
                    <div>
                        <h2 class="text-xl text-slate-900 font-semibold mb-6">Delivery Details</h2>
                        <div class="grid lg:grid-cols-2 gap-y-6 gap-x-4">
                            <div>
                                <label class="text-sm text-slate-900 font-medium block mb-2">First Name</label>
                                <input type="text" wire:model="firstName" placeholder="Enter First Name" required
                                    class="px-4 py-2.5 bg-white border border-gray-400 text-slate-900 w-full text-sm rounded-md focus:outline-blue-600" />
                                @error('firstName') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                            </div>
                            <div>
                                <label class="text-sm text-slate-900 font-medium block mb-2">Last Name</label>
                                <input type="text" wire:model="lastName" required placeholder="Enter Last Name"
                                    class="px-4 py-2.5 bg-white border border-gray-400 text-slate-900 w-full text-sm rounded-md focus:outline-blue-600" />
                                @error('lastName') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                            </div>
                            <div>
                                <label class="text-sm text-slate-900 font-medium block mb-2">Email</label>
                                <input type="email" wire:model="email" required placeholder="Enter Email"
                                    class="px-4 py-2.5 bg-white border border-gray-400 text-slate-900 w-full text-sm rounded-md focus:outline-blue-600" />
                                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                            </div>
                            <div>
                                <label class="text-sm text-slate-900 font-medium block mb-2">Phone No.</label>
                                <input type="number" wire:model="phone" placeholder="Enter Phone No."
                                    class="px-4 py-2.5 bg-white border border-gray-400 text-slate-900 w-full text-sm rounded-md focus:outline-blue-600" />
                                @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                            </div>
                            <div>
                                <label class="text-sm text-slate-900 font-medium block mb-2">Address Line</label>
                                <input type="text" wire:model="shipping_address" placeholder="Enter Address Line"
                                    class="px-4 py-2.5 bg-white border border-gray-400 text-slate-900 w-full text-sm rounded-md focus:outline-blue-600" />
                                @error('shipping_address') <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror

                            </div>
                            <div>
                                <label class="text-sm text-slate-900 font-medium block mb-2">City</label>
                                <input type="text" wire:model="city" placeholder="Enter City"
                                    class="px-4 py-2.5 bg-white border border-gray-400 text-slate-900 w-full text-sm rounded-md focus:outline-blue-600" />
                                @error('city') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                            </div>
                            <div>
                                <label class="text-sm text-slate-900 font-medium block mb-2">Zip Code</label>
                                <input type="text" wire:model="zip" placeholder="Enter Zip Code"
                                    class="px-4 py-2.5 bg-white border border-gray-400 text-slate-900 w-full text-sm rounded-md focus:outline-blue-600" />
                                @error('zip') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                            </div>
                        </div>
                    </div>

                    <div class="mt-12">
                        <h2 class="text-xl text-slate-900 font-semibold mb-6">Payment</h2>
                        <div class="grid gap-4 lg:grid-cols-2">
                            <div class="bg-gray-100 p-4 rounded-md border border-gray-300 max-w-sm">
                                <div>
                                    <div class="flex items-center">
                                        <input type="radio" wire:model="payment_method" name="method" value="card"
                                            class="w-5 h-5 cursor-pointer" id="card" checked />
                                        <label for="card" class="ml-4 flex gap-2 cursor-pointer">
                                            <img src="https://readymadeui.com/images/visa.webp" class="w-12"
                                                alt="card1" />
                                            <img src="https://readymadeui.com/images/american-express.webp" class="w-12"
                                                alt="card2" />
                                            <img src="https://readymadeui.com/images/master.webp" class="w-12"
                                                alt="card3" />
                                        </label>
                                    </div>
                                </div>
                                <p class="mt-4 text-sm text-slate-500 font-medium">Pay with your debit or credit card
                                </p>
                            </div>
                        </div>
                    </div>

            </div>

            <div class="relative">
                <h2 class="text-xl text-slate-900 font-semibold mb-6">Order Summary</h2>
                <ul class="text-slate-500 font-medium space-y-4">
                    <li class="flex flex-wrap gap-4 text-sm">Subtotal <span
                            class="ml-auto font-semibold text-slate-900">{{ number_format($total, 2) }}</span></li>
                    <li class="flex flex-wrap gap-4 text-sm">Discount <span
                            class="ml-auto font-semibold text-slate-900">$0.00</span></li>
                    <li class="flex flex-wrap gap-4 text-sm">Shipping <span
                            class="ml-auto font-semibold text-slate-900">Free</span></li>
                    <li class="flex flex-wrap gap-4 text-sm">Tax <span
                            class="ml-auto font-semibold text-slate-900">Rs00.00</span></li>
                    <hr class="border-slate-300" />
                    <li class="flex flex-wrap gap-4 text-[15px] font-semibold text-slate-900">Total <span
                            class="ml-auto">{{ number_format($total, 2) }}</span></li>
                </ul>
                <div class="space-y-4 mt-8">
                    <button wire:click="placeOrder" type="button" class="rounded-md px-4 py-2.5 w-full text-sm font-medium tracking-wide bg-blue-600
                        hover:bg-blue-700 text-white cursor-pointer">Complete
                        Purchase</button>
                    </form>

                    <button type="button"
                        class="rounded-md px-4 py-2.5 w-full text-sm font-medium tracking-wide bg-gray-100 hover:bg-gray-200 border border-gray-300 text-slate-900 cursor-pointer">Continue
                        Shopping</button>
                </div>
            </div>
        </div>
    </div>
    @if($showPaymentPopup)
    <div class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
        <div class="max-w-xl w-full bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="bg-gradient-to-r from-purple-500 to-indigo-600 p-6">
                <h2 class="text-xl font-semibold text-white">Complete Your Payment</h2>
                <p class="text-sm text-slate-100 mt-2">Fast, secure payment processing</p>
            </div>

            <div class="p-6">


                <form>
                    <div class="mb-4">
                        <label class="block text-slate-900 text-sm font-medium mb-2" for="cardName">
                            Cardholder Name
                        </label>
                        <input type="text" id="cardName"
                            class="px-4 py-2.5 bg-white border border-gray-400 text-slate-900 w-full text-sm rounded-md focus:outline-indigo-600"
                            placeholder="Kaveesha Perera" required />
                    </div>
                    <div class="mb-4">
                        <label class="block text-slate-900 text-sm font-medium mb-2" for="cardNumber">
                            Card Number
                        </label>
                        <div class="relative">
                            <input type="number" id="cardNumber"
                                class="px-4 py-2.5 bg-white border border-gray-400 text-slate-900 w-full text-sm rounded-md focus:outline-indigo-600"
                                placeholder="1234 5678 9012 3456" required />
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div>
                            <label class="block text-slate-900 text-sm font-medium mb-2" for="expDate">
                                Expiry Date
                            </label>
                            <input type="text" id="expDate"
                                class="px-4 py-2.5 bg-white border border-gray-400 text-slate-900 w-full text-sm rounded-md focus:outline-indigo-600"
                                placeholder="MM/YY" required />
                        </div>
                        <div>
                            <label class="block text-slate-900 text-sm font-medium mb-2" for="cvv">
                                CVV
                            </label>
                            <input type="text" id="cvv"
                                class="px-4 py-2.5 bg-white border border-gray-400 text-slate-900 w-full text-sm rounded-md focus:outline-indigo-600"
                                placeholder="123" required />
                        </div>
                    </div>



                    <div class="flex flex-col space-y-4">
                        <button wire:click="confirmPayment" type="button"
                            class="cursor-pointer w-full py-2.5 px-4 rounded-md flex items-center justify-center bg-indigo-600 hover:bg-indigo-700 text-sm text-white font-medium transition-colors">
                            Pay Now
                        </button>
                        <button wire:click="cancelPayment" type="button"
                            class="cursor-pointer w-full py-2.5 px-4 rounded-md flex items-center justify-center bg-indigo-600 hover:bg-indigo-700 text-sm text-white font-medium transition-colors">
                            Cancel Payment
                        </button>
                        <div class="flex items-center justify-center text-slate-500 text-sm">
                            <span>Secure payment powered by Stripe</span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="flex justify-center gap-2 mt-4">
        <img src="https://readymadeui.com/images/visa.webp" class="w-12" alt="card1" />
        <img src="https://readymadeui.com/images/american-express.webp" class="w-12" alt="card2" />
        <img src="https://readymadeui.com/images/master.webp" class="w-12" alt="card3" />
    </div>
    @endif
</div>