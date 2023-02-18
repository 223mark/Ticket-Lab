<tr class="hover:bg-gray-200">

    <td class="px-6 py-4 whitespace-nowrap">
        <span class="text-indigo-600">{{ $data->from_where }}</span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <span class="text-indigo-600">{{ $data->to_where }}</span>
    </td>

    <td class="px-6 py-4 whitespace-nowrap">

        {{ $data->class }}

    </td>
    <td class="px-6 py-4 whitespace-nowrap">

        {{ $data->departure_time }}

    </td>
    <td class="px-6 py-4 whitespace-nowrap">

        {{ $data->arrive_time }}

    </td>
    <td class="px-6 py-4 whitespace-nowrap text-blue-700 font-semibold cursor-pointer underline hover:text-blue-600">
        <a href="{{ route('tickets#create', $data->id) }}">Export Tickets</a>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex justify-end gap-4">
            <a x-data="{ tooltip: 'Delete' }" href="{{ route('busRoutes#destory', $data->id) }}">
                <x-table-field-option>delete</x-table-field-option>
            </a>

            <a x-data="{ tooltip: 'Edite' }" href="{{ route('busRoutes#edit', $data->id) }}">
                <x-table-field-option>edit</x-table-field-option>
            </a>
        </div>
    </td>
</tr>
