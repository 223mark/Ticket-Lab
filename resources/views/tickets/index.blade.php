<x-main-layout title="Tickets">
    <x-toast-message>Added Success fully</x-toast-message>
    <div class="mx-2 mt-10 md:mt-10 md:mx-4 ">
        <div class="flex justify-between pb-2">

            <a href="{{ route('busRoutes#index') }}">
                <x-button name="Add Tickets" />
            </a>

            <form action="#" method="GET" class="">
                <x-filter-dropdown :data="$operators"></x-filter-dropdown>
            </form>
        </div>



        <table class="w-full  border-collapse bg-white text-left text-sm text-gray-500 border shadow-lg ">
            {{-- table header --}}

            <x-table-header>ticket</x-table-header>

            <tbody class="divide-y divide-gray-100 border-t border-gray-100" id="dataList">

                @forelse ($ticketCode as $data)
                    <tr class="hover:bg-gray-200">

                        <td class="px-6 py-4 text-red-500 font-bold">{{ $data->ticket_code }}</td>
                        <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                            <div class="relative h-10 w-10">
                                <img class="h-full w-full rounded-lg object-cover object-center"
                                    src="{{ $data->operatorImage ? asset('img/OperatorImage/' . $data->operatorImage) : asset('img/codelab.png') }}"
                                    alt="" />
                                <span
                                    class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                            </div>
                            <div class="text-sm">
                                <div class="font-medium text-gray-700">{{ $data->operatorName }}</div>
                                <div class="font-light text-gray-500">{{ $data->email }}</div>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            <span class="text-indigo-500  font-semibold text-md">{{ $data->from_where }}-
                                {{ $data->to_where }}</span>

                        </td>

                        <td class="px-6 py-4">
                            <a href="{{ route('tickets#show', $data->ticket_code) }}">
                                <span class="text-blue-500 underline font-bold text-md">See Tickets</span>
                            </a>

                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-end gap-4">
                                <a x-data="{ tooltip: 'Delete' }" href="{{ route('operators#destory', $data->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-6 w-6" x-tooltip="tooltip">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </a>
                            </div>
                        </td>


                    </tr>
                @empty
                    <x-no-data-status item="ticket codes" />

                @endif


            </tbody>

        </table>
        <div class="my-4 md:my-6">
            {{ $ticketCode->links() }}
        </div>

    </div>




</x-main-layout>
<script>
    $(document).ready(function() {
        // $.ajax({
        //     type: 'get',
        //     url: 'http://127.0.0.1:8000/location',
        //     dataType: 'json',
        //     success: function(response) {
        //         console.log(response);
        //     }
        // })
        $('#sortingByOperator').change(function() {
            $result = $('#sortingByOperator').val();
            $.ajax({
                type: 'get',
                url: 'http://127.0.0.1:8000/ajax/operators/filter',
                data: {
                    'result': $result
                },
                dataType: 'json',
                success: function(response) {
                    let data = response.data.data;
                    $tbData = '';
                    if (data.length != 0) {
                        for ($i = 0; $i < response.data.data.length; $i++) {
                            $tbData += `
                         <tr class="hover:bg-gray-200">

                        <td class="px-6 py-4 text-red-500 font-bold">${data[$i].ticket_code}</td>
                        <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                            <div class="relative h-10 w-10">
                                <img src="{{ asset('img/OperatorImage/${data[$i].operatorImage}') }}" class="h-full w-full rounded-lg object-cover object-center" >
                                
                                  
                                <span
                                    class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                            </div>
                            <div class="text-sm">
                                <div class="font-medium text-gray-700">${data[$i].operatorName}</div>
                                <div class="font-light text-gray-500">${data[$i].email}</div>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            <span class="text-indigo-500  font-semibold text-md">${data[$i].from_where}-
                               ${data[$i].to_where}</span>

                        </td>
                        <td class="px-6 py-4">
                            <span class="text-green-500  font-semibold text-md">${data[$i].date}
                            </span>

                        </td>
                        <td class="px-6 py-4">
                            <a href="#">
                                <span class="text-blue-500 underline font-bold text-md">See Tickets</span>
                            </a>

                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-end gap-4">
                                <a x-data="{ tooltip: 'Delete' }" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-6 w-6" x-tooltip="tooltip">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </a>
                            </div>
                        </td>


                    </tr>

                        `
                        }

                        $('#dataList').html($tbData)

                    } else {
                        $tbData =
                            `
                        <tr class="hover:bg-gray-200">
                           <td class="px-6 py-4 text-center" colspan="7">
                               
                                    <span class="font-semibold text-red-500 ">
                                        There is related data !

                                    </span>
                                    <a href="{{ route('tickets#index') }}" class="font-bold text-blue-500 underline">
                                         Wanna Go Back ?
                                    </a>
                            </td>
                        </tr>

                        `
                        $('#dataList').html($tbData)
                    }




                }


            })

        })
    })
</script>
