<x-main-layout title="Orders/Ticket/Detail">
    <div class="mb-2 ml-2">
        <a href="{{ route('orders#index') }}">
            <x-button name="Back" />
        </a>
    </div>
    <table class="w-full  border-collapse bg-white text-left text-sm text-gray-500 border shadow-lg ">

        {{-- table header  --}}
        <x-table-header>alltickets</x-table-header>


        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
            <tr class="hover:bg-gray-200">

                <td class="px-6 py-4">{{ $ticket->seat_number }}</td>

                <td class="px-6 py-4">
                    {{ $ticket->from_where }}
                </td>
                <td class="px-6 py-4">
                    {{ $ticket->to_where }}
                </td>
                <td class="px-6 py-4">

                    {{ $ticket->price }}

                </td>
                <td class="px-6 py-4">

                    {{ $ticket->class }}

                </td>
                <td class="px-6 py-4">

                    {{ $ticket->departure_time }}

                </td>

            </tr>

        </tbody>

    </table>
</x-main-layout>
