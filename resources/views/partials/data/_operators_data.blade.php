<tr class="hover:bg-gray-200">
    <th class="flex gap-3 px-6 py-4 whitespace-nowrap font-normal text-gray-900">
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
        <a href="{{ route('operators#ticketCode', $data->id) }}">
            <span class="font-bold text-blue-500 underline">
                Tickets Codes
            </span></a>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">{{ $data->phone1 }}</td>
    <td class="px-6 py-4 whitespace-nowrap">{{ $data->phone2 }}</td>
    <td class="px-6 py-4 whitespace-nowrap">{{ Str::substr($data->description, 0, 40) }}

    </td>
    <td class="px-4  py-4 whitespace-nowrap">
        <div class="flex gap-4">

            <a href="{{ route('operators#deatil', $data->id) }}">
                <x-table-field-option>detail</x-table-field-option>
            </a>
            <a href="{{ route('operators#edit', $data->id) }}">
                <x-table-field-option>edit</x-table-field-option>
            </a>
            <a href="{{ route('operators#destory', $data->id) }}">
                <x-table-field-option>delete</x-table-field-option>

            </a>
        </div>
    </td>
</tr>
