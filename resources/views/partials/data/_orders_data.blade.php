<tr class="hover:bg-gray-200">

    {{-- <td class="px-6 py-4">{{ $data->from_where }}</td> --}}

    <td class="flex gap-3 px-6 py-4 font-normal text-gray-900">
        <div class="relative h-10 w-10">
            <img class="h-full w-full rounded-lg object-cover object-center"
                src="{{ $data->img ? asset('img/OperatorImage/' . $data->img) : asset('img/codelab.png') }}"
                alt="" />
            <span class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
        </div>
        <div class="text-sm">
            <div class="font-medium text-gray-700">{{ $data->ticket_id }}</div>
            <div class="text-red-400 font-semibold">{{ $data->email }}</div>
        </div>
    </td>
    <td class="px-6 py-4">
        <span class="text-indigo-600">{{ $data->customer_name }}</span>
    </td>
    <td class="px-6 py-4">
        {{ $data->customer_email }}
    </td>
    <td class="px-6 py-4">
        <span class="text-indigo-600">{{ $data->customer_nrc_number }}</span>
    </td>
    <td class="px-6 py-4">

        {{ $data->payment_method }}

    </td>
    <td class="px-6 py-4">

        {{ $data->departure_date }}

    </td>

    <td class="px-6 py-4">
        <div class="flex justify-end gap-4">
            <a x-data="{ tooltip: 'Delete' }" href="">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-6 w-6 text-red-500" x-tooltip="tooltip">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>
            </a>


        </div>
    </td>
</tr>
