<x-main-layout title="Dashboard">

    {{-- dashboard card --}}
    <div class="flex flex-col md:flex-row justify-between gap-2 px-4 mb-4">
        {{-- today order --}}
        <x-dashboard-card :data=$todayOrderCount>Today Orders</x-dashboard-card>

        {{-- total operator --}}
        <x-dashboard-card :data=$operatorCount>Operator Count</x-dashboard-card>

        {{-- total order --}}
        <x-dashboard-card :data=$allOrdersCount>Total Orders</x-dashboard-card>


    </div>
    {{-- dashboard card end --}}
    {{-- latest order --}}
    <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
        <div class="mb-4 flex items-center justify-between">
            <div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Latest Orders</h3>
                <span class="text-base font-normal text-gray-500">This is a list of latest
                    orders</span>
            </div>
            <div class="flex-shrink-0">
                <a href="{{ route('orders#index') }}"
                    class="text-sm font-medium text-cyan-600 hover:bg-gray-100 rounded-lg p-2">View
                    all</a>
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
                                @forelse ($order as $order)
                                    <tr class="hover:bg-gray-200">
                                        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                            Order from
                                            <span
                                                class="font-semibold text-indigo-400">{{ $order->customer_name }}</span>
                                        </td>
                                        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
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
    {{-- latest order end --}}

</x-main-layout>
