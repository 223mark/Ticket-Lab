<x-main-layout title="Order/Index">


    <div class="flex flex-col justify-between px-2 mb-2 md:flex-row">
        <div class="flex pr-2 mb-2 md:mb-0 ">

            <x-filter-dropdown :data=$operators></x-filter-dropdown>


        </div>
        <div class="flex justify-between">
            <a href="/orders/index" class="mr-2">
                <x-button name="reset search"></x-button>
            </a>
            <a href="{{ route('orders#expiredTickets') }}">
                <button
                    class="px-3 py-1 border border-red-500 text-red-500 bg-white hover:text-white hover:bg-red-500 rounded">expired
                    tickets</button>
            </a>


        </div>
    </div>
    {{-- confirm modal --}}
    @include('partials.confirm_delete')

    {{-- flash message --}}
    @if (Session::has('deleteMessage'))
        <x-toast-message>delete</x-toast-message>
    @endif
    @if (Session::has('setExpired'))
        <x-toast-message>update</x-toast-message>
    @endif


    {{-- table --}}
    <div class="overflow-auto rounded-lg shadow">
        <table class="w-full   border-collapse bg-white text-left text-sm text-gray-500 border shadow-lg ">
            {{-- table header --}}
            <x-table-header>order</x-table-header>


            <tbody class="divide-y divide-gray-100 border-t border-gray-100" id="table-id">

                {{-- tabke-data --}}
                @forelse ($orders as $data)
                    @include('partials.data._orders_data')
                @empty
                    <tr class="hover:bg-gray-200">
                        <x-no-data-status item="Order" />
                    </tr>
                @endif

            </tbody>
        </table>
    </div>



    <div class="mt-2">
        {{ $orders->links() }}
    </div>
</x-main-layout>
{{-- jquery --}}
<script>
    $(document).ready(function() {
        //sortingByOperator
        $('#sortingByOperator').change(function() {
            $result = $('#sortingByOperator').val();

            $.ajax({
                type: 'get',
                url: 'http://127.0.0.1:8000/orders/operators/filter',
                data: {
                    'result': $result
                },
                dataType: 'json',
                success: function(response) {
                    let data = response.data;

                    let responseData = '';


                    for ($i = 0; $i < data.length; $i++) {

                        if (data[$i].img == null) {
                            responseData += `
                        <tr class="hover:bg-gray-200 whitespace-nowrap">
                            <td class="px-6 py-4 text-blue-600 font-medium cursor-pointer">
                                <a href="{{ route('orders#ticketDetail', $data->ticket_id) }}">
                                    # ${data[$i].ticket_id}
                                </a>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-indigo-600">${data[$i].customer_name}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                               ${data[$i].customer_email}
                            </td>
                            <th class="flex gap-3 px-6 py-4 font-normal text-gray-900 whitespace-nowrap">
                                <div class="relative h-10 w-10">
                                    <img class="h-full w-full rounded-lg object-cover object-center"
                                        src="{{ asset('img/codelab.png') }}"
                                        alt="" />
                                    <span class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                                </div>
                                <div class="text-sm">
                                    <div class="font-medium text-gray-700">${data[$i].operator_name}</div>
                                    <div class="text-gray-400">${data[$i].email}</div>
                                </div>
                            </th>
                           
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="/orders/index?tag=${data[$i].payment_method}">${data[$i].payment_method}</a>

                            </td>
                            <td class="px-6 py-4 text-blue-500 font-semibold underline cursor-pointer whitespace-nowrap">
                                <a href="/orders/index?tag=${data[$i].departure_date}">${data[$i].departure_date}</a>


                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                 <a href="{{ route('orders#setOrdersExpredPg', $data->departure_date) }}">
                                    <span class="text-red-500 font-medium text-md cursor-pointer hover:underline">
                                        set expired
                                    </span>
                                 </a>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div id="button">
                                    <span class="text-green-500 font-medium text-md cursor-pointer hover:underline"
                                        onclick="modalHandler(true)">cancel
                                        order</span>
                                </div>
                            </td>
                        </tr>
                            `
                        } else if (data[$i].img != null) {
                            responseData += `
                        <tr class="hover:bg-gray-200 whitespace-nowrap">
                            <td class="px-6 py-4 text-blue-600 font-medium cursor-pointer">
                                <a href="{{ route('orders#ticketDetail', $data->ticket_id) }}">
                                    #${data[$i].ticket_id}
                                </a>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-indigo-600">${data[$i].customer_name}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                               ${data[$i].customer_email}
                            </td>
                            <th class="flex gap-3 px-6 py-4 font-normal text-gray-900 whitespace-nowrap">
                                <div class="relative h-10 w-10">
                                    <img class="h-full w-full rounded-lg object-cover object-center"
                                        src="{{ asset('img/OperatorImage/${data[$i].img}') }}"
                                        alt="" />
                                    <span class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                                </div>
                                <div class="text-sm">
                                    <div class="font-medium text-gray-700">${data[$i].operator_name}</div>
                                    <div class="text-gray-400">${data[$i].email}</div>
                                </div>
                            </th>
                           
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="/orders/index?tag=${data[$i].payment_method}">${data[$i].payment_method}</a>

                            </td>
                            <td class="px-6 py-4 text-blue-500 font-semibold underline cursor-pointer whitespace-nowrap">
                                <a href="/orders/index?tag=${data[$i].departure_date}">${data[$i].departure_date}</a>


                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('orders#setOrdersExpredPg', $data->departure_date) }}">
                                    <span class="text-red-500 font-medium text-md cursor-pointer hover:underline">
                                        set expired
                                    </span>
                                 </a>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                 <div id="button">
                                    <span class="text-green-500 font-medium text-md cursor-pointer hover:underline"
                                        onclick="modalHandler(true)">cancel
                                        order</span>
                                </div>
                            </td>
                        </tr>

                            `
                        }



                        $('#table-id').html(responseData);
                        console.log(data, 'd');
                    }



                }


            })

        })

        //get related id
        // $getRelatedId = function($id) {
        //     $('#modalInput').val($id);
        //     console.log($id);
        // }

    })
</script>
