<div class="overflow-x-auto ">
    <form class="max-w-md mx-auto mb-7 ">
        <label for="default-search"
            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search" id="default-search"
                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Search Mockups, Logos..." required />
            <button type="submit"
                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
    </form>


    <table class="min-w-full bg-white">
        <thead class="bg-gray-100 whitespace-nowrap">
            <tr>
                <th class="p-4 text-left text-[13px] font-semibold text-slate-900">Order Number</th>
                <th class="p-4 text-left text-[13px] font-semibold text-slate-900">Date</th>
                <th class="p-4 text-left text-[13px] font-semibold text-slate-900">Email</th>
                <th class="p-4 text-left text-[13px] font-semibold text-slate-900">Phone</th>
                <th class="p-4 text-left text-[13px] font-semibold text-slate-900">Address</th>
                <th class="p-4 text-left text-[13px] font-semibold text-slate-900">Payment Method</th>
                <th class="p-4 text-left text-[13px] font-semibold text-slate-900">Status</th>
                <th class="p-4 text-left text-[13px] font-semibold text-slate-900">View Products</th>
            </tr>
        </thead>

        <tbody class="whitespace-nowrap">
            @foreach ($orders as $order)

            <tr class="hover:bg-gray-50">
                <td class="p-4 text-[15px] font-medium text-slate-900">{{ $order->_id }}</td>
                <td class="p-4 text-[15px] font-medium text-slate-600">{{ $order->created_at->format('Y-m-d') }}</td>
                <td class="p-4 text-[15px] font-medium text-slate-600">{{ $order->email }}</td>
                <td class="p-4 text-[15px] font-medium text-slate-600">{{ $order->phone }}</td>
                <td class="p-4 text-[15px] font-medium text-slate-600">{{ $order->shipping_address }},
                    {{ $order->city }}, {{ $order->zip }}
                </td>

                <td class="p-4 text-[15px] font-medium text-slate-600">{{ $order->payment_method }}</td>
                <td>
                    <select wire:change="updateStatus('{{ $order->_id }}', $event.target.value)">
                        <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="paid" {{ $order->status === 'paid' ? 'selected' : '' }}>Paid</option>
                        <option value="failed" {{ $order->status === 'failed' ? 'selected' : '' }}>Failed</option>
                        <option value="delivered" {{ $order->status === 'delivered' ? 'selected' : '' }}>Delivered
                        </option>
                        <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled
                        </option>
                        <option value="refunded" {{ $order->status === 'refunded' ? 'selected' : '' }}>Refunded</option>
                        <option value="returned" {{ $order->status === 'returned' ? 'selected' : '' }}>Returned</option>
                    </select>
                </td>

                <td class="p-4 text-[15px] font-medium text-slate-600"></td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>