<header class="bg-white shadow-md">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <a href="{{ route('index') }}">
                <img src="/images/logo-remove.png" alt="Aura Logo" " class=" h-24 w-24">
            </a>
        </div>

        <nav class="hidden md:flex space-x-6">
            <a href="{{ route('index') }}" class="text-black hover:text-gray-900 font-semibold">Home</a>
            <a href="{{ route('shop') }}" class="text-black hover:text-gray-700 font-semibold">Shop</a>
        </nav>

        <div class="flex items-center space-x-8">
            <!-- Cart Icon -->
            <a href="{{ route('cart.view') }}">
                <img src="/images/cart.png" alt="Cart" class="h-6 w-6">
            </a>

            <a href="{{ route('profile.page') }}">
                <img src="/images/user.png" alt="Profile" class="h-6 w-6">
            </a>



        </div>
    </div>
</header>