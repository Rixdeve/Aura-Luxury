<div>
    <section class="bg-white py-4 antialiased md:py-4 dark:bg-gray-900">
        <div class="w-full max-w-screen-xl px-4 md:px-8 mx-auto">
            <nav class="mb-4 flex" aria-label="Breadcrumb"></nav>
            <h2 class="mb-4 text-xl font-semibold text-gray-900 sm:text-2xl md:mb-6 dark:text-white">My Profile</h2>
            <div class="py-4 md:py-8">
                <div class="mb-4 grid gap-4 sm:grid-cols-2 sm:gap-8 lg:gap-16">
                    <div class="space-y-4">
                        <div class="flex space-x-4">
                            <img class="h-16 w-16 rounded-lg"
                                src="https://cdn.iconscout.com/icon/free/png-256/free-user-icon-download-in-svg-png-gif-file-formats--profile-avatar-account-person-app-interface-pack-icons-1401302.png?f=webp"
                                alt="Profile" />
                            <div>
                                <span
                                    class="bg-primary-100 text-primary-800 dark:bg-primary-900 dark:text-primary-300 mb-2 inline-block rounded px-2.5 py-0.5 text-xs font-medium">
                                    Profile Details </span>
                                <h2
                                    class="flex items-center text-xl leading-none font-bold text-gray-900 sm:text-2xl dark:text-white">
                                    {{ $user->first_name }} {{ $user->last_name }}
                                </h2>
                            </div>
                        </div>
                        <dl class="">
                            <dt class="font-semibold text-gray-900 dark:text-white">Email Address</dt>
                            <dd class="text-gray-500 dark:text-gray-400">{{$user->email}}</dd>
                        </dl>
                    </div>
                    <div class="space-y-4">
                        <dl>
                            <dt class="font-semibold text-gray-900 dark:text-white">Phone Number</dt>
                            <dd class="text-gray-500 dark:text-gray-400">{{$user->phone}}</dd>
                        </dl>
                    </div>

                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <button
                            class="w-20 rounded-lg bg-red-600 px-4 py-2 text-center text-sm font-semibold text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-offset-gray-800"
                            wire:click="logout">Logout</button>
                    </form>
                </div>
                <div
                    class="rounded-lg border border-gray-200 bg-gray-50 p-4 md:p-8 dark:border-gray-700 dark:bg-gray-800">
                    <h3 class="mb-4 text-xl font-semibold text-gray-900 dark:text-white">Latest orders</h3>
                    @foreach ($orders as $order)
                    <div
                        class="grid grid-cols-1 sm:grid-cols-5 gap-4 border-b border-gray-200 pb-4 md:pb-5 dark:border-gray-700">
                        <dl class="col-span-2">
                            <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Order ID:</dt>
                            <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">
                                <a href="#" class="hover:underline">#{{ $order->id }}</a>
                            </dd>
                        </dl>

                        <dl class="w-1/2 sm:w-1/4 md:flex-1 lg:w-auto">
                            <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Date:</dt>
                            <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">
                                {{ $order->created_at->format('d.m.Y') }}
                            </dd>
                        </dl>

                        <dl class="w-1/2 sm:w-1/5 md:flex-1 lg:w-auto">
                            <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Price:</dt>
                            <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">
                                ${{ number_format($order->total_amount, 2) }}</dd>
                        </dl>

                        <dl class="w-1/2 sm:w-1/4 sm:flex-1 lg:w-auto">
                            <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Status:</dt>
                            <dd
                                class="me-2 mt-1.5 inline-flex shrink-0 items-center rounded bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">

                                {{ ucfirst($order->status) }}
                            </dd>
                        </dl>

                        <div class="w-full sm:flex sm:w-32 sm:items-center sm:justify-end sm:gap-4"></div>
                    </div>
                    @endforeach



                </div>
            </div>
    </section>

</div>