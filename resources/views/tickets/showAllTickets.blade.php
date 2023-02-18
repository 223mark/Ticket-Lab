<x-main-layout title="Tickets">
    <div class="flex justify-between px-4 mb-2">

        <a href="{{ route('tickets#index') }}">
            <x-button name="Back" />
        </a>


    </div>

    <div class="overflow-auto rounded-lg shadow">
        <table class="w-full  border-collapse bg-white text-left text-sm text-gray-500 border shadow-lg ">

            {{-- table header  --}}
            <x-table-header>alltickets</x-table-header>


            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                @foreach ($tickets as $data)
                    <tr class="hover:bg-gray-200">

                        <td class="px-6 py-4 whitespace-nowrap">{{ $data->seat_number }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if ($data->status == null)
                                <x-button name="null" />
                            @endif
                            {{ $data->status }}

                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $data->from_where }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $data->to_where }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">

                            {{ $data->price }}

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">

                            {{ $data->class }}

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">

                            {{ $data->departure_time }}

                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
    </div>
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
