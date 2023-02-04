@props(['busRoutes'])
<table class="w-full  border-collapse bg-white text-left text-sm text-gray-500 border shadow-lg ">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">From</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">To </th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Price</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Class </th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Departure Time </th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Export Ticket</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
        @if (count($busRoutes) == 0)
            <tr class="hover:bg-gray-200">
                <x-no-data-status item="Routes" />
            </tr>
        @endif
        @foreach ($busRoutes as $data)
            @include('partials.data._tickets_data')
        @endforeach

    </tbody>

</table>
<div class="my-4 md:my-6">
    {{ $busRoutes->links() }}
</div>
