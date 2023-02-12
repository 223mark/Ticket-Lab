<x-main-layout title="Tickets">
    <div class="flex justify-between px-4 mb-2">

        <a href="{{ route('tickets#index') }}">
            <x-button name="Back" />
        </a>
        <select>
            <option value="">Ticket Status</option>
            <option value="">Yes</option>
            <option value="">No</option>
        </select>

    </div>

    <table class="w-full  border-collapse bg-white text-left text-sm text-gray-500 border shadow-lg ">

        {{-- table header  --}}
        <x-table-header>alltickets</x-table-header>


        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
            @foreach ($tickets as $data)
                <tr class="hover:bg-gray-200">

                    <td class="px-6 py-4">{{ $data->seat_number }}</td>
                    <td class="px-6 py-4">
                        @if ($data->status == null)
                            <x-button name="null" />
                        @endif
                        {{ $data->status }}

                    </td>

                    <td class="px-6 py-4">
                        {{ $data->from_where }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $data->to_where }}
                    </td>
                    <td class="px-6 py-4">

                        {{ $data->price }}

                    </td>
                    <td class="px-6 py-4">

                        {{ $data->class }}

                    </td>
                    <td class="px-6 py-4">

                        {{ $data->departure_time }}

                    </td>
                    {{-- <td class="px-6 py-4 text-blue-500 font-semibold cursor-pointer underline hover:text-blue-600">
                        <a href="{{ route('tickets#create', $data->id) }}">Export Tickets</a>
                    </td> --}}
                    <td class="px-6 py-4">
                        <div class="flex justify-end gap-4">
                            <a x-data="{ tooltip: 'Delete' }" href="{{ route('operators#destory', $data->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="h-6 w-6" x-tooltip="tooltip">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </a>

                            <a x-data="{ tooltip: 'Edite' }" href="{{ route('tickets#edit', $data->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="h-6 w-6" x-tooltip="tooltip">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                </svg>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>

    </table>
    <div class="my-4 md:my-6">
        {{ $tickets->links() }}
    </div>

</x-main-layout>
<script>
    $(document).ready(function() {
        $.ajax({
            type: 'get',
            url: '',
            dataType: 'json',
            success: function(response) {
                console.log(response);
            }
        })
    })
</script>
