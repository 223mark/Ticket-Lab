<x-main-layout title="SetOrders/Expired">
    <a href="{{ route('orders#index') }}">
        <x-button name="Back" />
    </a>
    <div class="my-4 ">
        <h1 class="text-xl font-medium text-blue-600 tracking-normal">Setting Tickets To Define Expire</h1>
        <p class="text-md font-normal text-slate-500 pt-4">Are you sure you want to set expired status to the tickets
            with this date
            <span class="text-blue-500 font-bold">{{ $date }}</span>
        </p>
    </div>

    <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
        <div class="mb-4 flex items-center justify-between">
            <div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Latest Orders</h3>
                <span class="text-base font-normal text-gray-500">This is a list of latest
                    orders</span>
            </div>
            <div class="flex-shrink-0">
                <a href="{{ route('orders#setOrdersExpired', $date) }}"
                    class="text-sm font-medium text-red-600 border border-red-500 bg-white hover:bg-red-500 hover:text-white rounded-lg p-2">
                    Set All Expire
                </a>
            </div>
        </div>
        <div class="flex flex-col mt-8">
            <div class="overflow-x-auto rounded-lg">
                <div class="align-middle inline-block min-w-full">
                    <div class="shadow overflow-hidden sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Order Id
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        NRC Number
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Price
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @forelse ($data as $order)
                                    <tr class="hover:bg-gray-200">
                                        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                            Order from
                                            <span
                                                class="font-semibold text-indigo-400">{{ $order->customer_name }}</span>
                                        </td>
                                        <td class="p-4 whitespace-nowrap text-sm font-bold text-red-500">
                                            {{ $order->departure_date }}
                                        </td>
                                        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                            {{ $order->customer_nrc_number }}
                                        </td>
                                        <td class="p-4 whitespace-nowrap text-sm font-semibold text-green-500">
                                            {{ $order->price }}
                                        </td>
                                    </tr>
                                @empty
                                    <x-no-data-status item="new orders " />

                                @endif


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-main-layout>
