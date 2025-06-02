<div class="overflow-x-auto pl-72">
    <h2 class="text-lg font-bold mt-4 mb-4">Orders</h2>

    <table class="min-w-full bg-white">
        <thead class="bg-gray-100 whitespace-nowrap">
            <tr>
                <th class="p-4 text-left text-[13px] font-semibold text-slate-900">
                    Name
                </th>
                <th class="p-4 text-left text-[13px] font-semibold text-slate-900">
                    Email
                </th>
                <th class="p-4 text-left text-[13px] font-semibold text-slate-900">
                    Phone
                </th>
                <th class="p-4 text-left text-[13px] font-semibold text-slate-900">
                    Role
                </th>
                <th class="p-4 text-left text-[13px] font-semibold text-slate-900">
                    Joined At
                </th>

            </tr>
        </thead>

        <tbody class="whitespace-nowrap">
            @foreach ($users as $user)
            <tr class="hover:bg-gray-50">
                <td class="p-4 text-[15px] text-slate-900 font-medium">
                    {{$user->name}}
                </td>
                <td class="p-4 text-[15px] text-slate-600 font-medium">
                    {{$user->email}}
                </td>
                <td class="p-4 text-[15px] text-slate-600 font-medium">
                    {{$user->phone}}
                </td>
                <td class="p-4 text-[15px] text-slate-600 font-medium">
                    @if ($user->role === 'admin')
                    <span class="text-green-600 font-semibold">Admin</span>
                    @else
                    <span class="text-gray-600 font-semibold">User</span>
                    @endif
                </td>
                <td class="p-4 text-[15px] text-slate-600 font-medium">
                    {{ $user->created_at->format('Y-m-d') }}
                </td>

            </tr>

            @endforeach
        </tbody>
    </table>
</div>