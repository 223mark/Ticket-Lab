@props(['tickets'])
<table class="w-full  border-collapse bg-white text-left text-sm text-gray-500 border shadow-lg ">
    <thead class="bg-gray-50">
        <tr>
            {{-- <th scope="col" class="px-6 py-4 font-medium text-gray-900">From </th> --}}
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Related Operator</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Tickets</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Phone1</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Phone2 </th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Address </th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
        @if (count($tickets) == 0)
            <tr class="hover:bg-gray-200">
                <x-no-data-status item="Tickets" />
            </tr>
        @endif
        @foreach ($tickets as $data)
            @include('partials.data._tickets_data')
        @endforeach

    </tbody>

</table>
<div class="my-4 md:my-6">
    {{ $tickets->links() }}
</div>
