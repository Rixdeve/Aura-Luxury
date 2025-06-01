<div class="overflow-x-auto pl-72">
    <h2 class="text-lg font-bold mt-4 mb-4">Orders</h2>


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

                <td class="p-4 text-[15px] font-medium text-slate-600"><a href="{{ route('order.view', $order->id) }}"
                        class="text-purple-600 hover:underline font-semibold">
                        View Details
                    </a></td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>