<tr class="hover:bg-gray-200">
    <td class="px-6 py-4 text-indigo-400 font-medium ">{{ $data->location }}</td>

    <td class="px-6 py-4">
        <div class="flex justify-end gap-4">
            <a href="{{ route('locations#destory', $data->id) }}">
                <x-table-field-option>delete</x-table-field-option>
            </a>

        </div>
    </td>
</tr>
