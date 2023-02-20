<x-main-layout title="Tickets">

    <div class="mx-2 mt-10 md:mt-10 md:mx-4 ">
        <div class="flex justify-between pb-2">

            <a href="{{ route('busRoutes#index') }}">
                <x-button name="Add Tickets" />
            </a>

            <form action="#" method="GET" class="">
                <x-filter-dropdown :data="$operators"></x-filter-dropdown>
            </form>
        </div>

        {{-- flash message --}}
        @if (Session::has('addMessage'))
            <x-toast-message>add</x-toast-message>
        @endif

        @if (Session::has('deleteMessage'))
            <x-toast-message>delete</x-toast-message>
        @endif

        {{-- table --}}
        <div class="overflow-auto rounded-lg shadow">
            <table class="w-full  border-collapse bg-white text-left text-sm text-gray-500 border shadow-lg ">

                {{-- table header --}}
                <x-table-header>ticket</x-table-header>

                <tbody class="divide-y divide-gray-100 border-t border-gray-100" id="dataList">

                    @forelse ($ticketCode as $data)
                        <tr class="hover:bg-gray-200">

                            <td class="px-6 py-4 text-red-500 font-bold whitespace-nowrap">{{ $data->ticket_code }}</td>
                            <th class="flex gap-3 px-6 py-4 font-normal text-gray-900 whitespace-nowrap">
                                <div class="relative h-10 w-10">
                                    <img class="h-full w-full rounded-lg object-cover object-center" id="imgAttr"
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
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-indigo-500  font-semibold text-md">{{ $data->from_where }}-
                                    {{ $data->to_where }}</span>

                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('tickets#show', $data->ticket_code) }}">
                                    <span class="text-blue-500 underline font-bold text-md">See Tickets</span>
                                </a>

                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-end gap-4">
                                    <a href="{{ route('tickets#destory', $data->ticket_code) }}">
                                        <x-table-field-option>delete</x-table-field-option>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <x-no-data-status item="ticket codes" />

                    @endif


                </tbody>

            </table>
        </div>
        <div class="my-4 md:my-6">
            {{ $ticketCode->links() }}
        </div>

    </div>




</x-main-layout>
<script>
    $(document).ready(function() {

        $('#sortingByOperator').change(function() {
            $result = $('#sortingByOperator').val();
            console.log($result);
            $.ajax({
                type: 'get',
                url: 'http://127.0.0.1:8000/tickets/operators/filter',
                data: {
                    'result': $result
                },
                dataType: 'json',
                success: function(response) {
                    let data = response.data;

                    let responseData = '';

                    console.log(data, 'data is');
                    for ($i = 0; $i < data.length; $i++) {

                        if (data[$i].img != null) {
                            responseData += `
                      <tr class="hover:bg-gray-200">
                            <td class="px-6 py-4 text-red-500 font-bold whitespace-nowrap">${data[$i].ticket_code}</td>
                            <th class="flex gap-3 px-6 py-4 font-normal text-gray-900 whitespace-nowrap">
                                <div class="relative h-10 w-10">
                                   <img class="h-full w-full rounded-lg object-cover object-center" id="imgAttr"
                                        src="{{ asset('img/OperatorImage/${data[$i].img}') }}"
                                        alt="" />
                                    <span
                                        class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                                </div>
                                <div class="text-sm">
                                    <div class="font-medium text-gray-700">${data[$i].operator_name}</div>
                                    <div class="font-light text-gray-500">${data[$i].email}</div>
                                </div>
                            </th>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-indigo-500  font-semibold text-md">${data[$i].from_where}-
                                    ${data[$i].to_where}</span>

                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('tickets#show', $data->ticket_code) }}">
                                    <span class="text-blue-500 underline font-bold text-md">See Tickets</span>
                                </a>

                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-end gap-4">
                                    <a href="{{ route('tickets#destory', $data->ticket_code) }}">
                                        <x-table-field-option>delete</x-table-field-option>
                                    </a>
                                </div>
                            </td>
                     </tr>

                        `
                        } else if (data[$i].img == null) {
                            responseData += `
                      <tr class="hover:bg-gray-200">
                            <td class="px-6 py-4 text-red-500 font-bold whitespace-nowrap">${data[$i].ticket_code}</td>
                            <th class="flex gap-3 px-6 py-4 font-normal text-gray-900 whitespace-nowrap">
                                <div class="relative h-10 w-10">
                                   <img class="h-full w-full rounded-lg object-cover object-center" id="imgAttr"
                                        src="{{ asset('img/codelab.png') }}"
                                        alt="" />
                                    <span
                                        class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                                </div>
                                <div class="text-sm">
                                    <div class="font-medium text-gray-700">${data[$i].operator_name}</div>
                                    <div class="font-light text-gray-500">${data[$i].email}</div>
                                </div>
                            </th>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-indigo-500  font-semibold text-md">${data[$i].from_where}-
                                    ${data[$i].to_where}</span>

                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('tickets#show', $data->ticket_code) }}">
                                    <span class="text-blue-500 underline font-bold text-md">See Tickets</span>
                                </a>

                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-end gap-4">
                                    <a href="{{ route('tickets#destory', $data->ticket_code) }}">
                                        <x-table-field-option>delete</x-table-field-option>
                                    </a>
                                </div>
                            </td>
                     </tr>

                        `
                        }

                    }
                    $('#dataList').html(responseData);

                }


            })

        })
    })
</script>
