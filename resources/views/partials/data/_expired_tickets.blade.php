<tr class="hover:bg-gray-200 whitespace-nowrap">
    <td class="px-6 py-4 text-blue-600 font-medium cursor-pointer">
        <a href="{{ route('orders#ticketDetail', $data->ticket_id) }}">
            #{{ $data->ticket_id }}
        </a>
    </td>

    <td class="px-6 py-4 whitespace-nowrap">
        <span class="text-indigo-600">{{ $data->customer_name }}</span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        {{ $data->customer_email }}
    </td>
    <th class="flex gap-3 px-6 py-4 font-normal text-gray-900 whitespace-nowrap">
        <div class="relative h-10 w-10">
            <img class="h-full w-full rounded-lg object-cover object-center"
                src="{{ $data->img ? asset('img/OperatorImage/' . $data->img) : asset('img/codelab.png') }}"
                alt="" />
            <span class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
        </div>
        <div class="text-sm">
            <div class="font-medium text-gray-700">{{ $data->operator_name }}</div>
            <div class="text-gray-400">{{ $data->email }}</div>
        </div>
    </th>

    <td class="px-6 py-4 whitespace-nowrap">
        <a href="/orders/index?tag={{ $data->payment_method }}">{{ $data->payment_method }}</a>

    </td>
    <td class="px-6 py-4 text-blue-500 font-semibold underline cursor-pointer whitespace-nowrap">
        <a href="/orders/index?tag={{ $data->departure_date }}">{{ $data->departure_date }}</a>


    </td>

    <td class="px-6 py-4 whitespace-nowrap">
        <a href="{{ route('orders#destory', $data->orderId) }}">
            <x-table-field-option>delete</x-table-field-option>
        </a>
    </td>

</tr>
