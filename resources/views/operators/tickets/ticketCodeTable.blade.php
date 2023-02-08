<x-main-layout title="Operators/TicketCode">
    <div class="mx-2 mt-10 md:mt-10 md:mx-4 ">
        <div class="flex justify-between pb-2">

            <a href="{{ route('operators#index') }}">
                <x-button name="Back" />
            </a>

            <form action="#" method="GET" class="">
                <select name="date" id="">
                    <option value="">Choose Date</option>
                </select>
            </form>
        </div>


        <table class="w-full  border-collapse bg-white text-left text-sm text-gray-500 border shadow-lg ">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">TicketCode </th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900"> Related Operator </th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Routes</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Date</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Tickets</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                @if (count($ticketCode) == 0)
                    <x-no-data-status item="ticket codes" />
                @endif
                @foreach ($ticketCode as $data)
                    <tr class="hover:bg-gray-200">

                        <td class="px-6 py-4 text-red-500 font-bold">{{ $data->ticket_code }}</td>
                        <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                            <div class="relative h-10 w-10">
                                <img class="h-full w-full rounded-lg object-cover object-center"
                                    src="{{ $data->img ? asset('img/OperatorImage/' . $data->operator_img) : asset('img/codelab.png') }}"
                                    alt="" />
                                <span
                                    class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                            </div>
                            <div class="text-sm">
                                <div class="font-medium text-gray-700">{{ $data->operatorName }}</div>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            <span class="text-indigo-500  font-semibold text-md">{{ $data->from }}-
                                {{ $data->to }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-green-500  font-semibold text-md"> {{ $data->date }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('tickets#show', $data->ticket_code) }}">
                                <span class="text-blue-500 underline font-bold text-md">Tickets</span>
                            </a>

                        </td>

                    </tr>
                @endforeach


            </tbody>

        </table>
        <div class="my-4 md:my-6">
            {{ $ticketCode->links() }}
        </div>

    </div>
</x-main-layout>
