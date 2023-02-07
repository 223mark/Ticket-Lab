@props(['data'])
<table class="w-full  border-collapse bg-white text-left text-sm text-gray-500 border shadow-lg ">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Operator </th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Tickets</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Phone1</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Phone2</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Description</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-100 border-t border-gray-100" id="table-id">
        @if (count($data) == 0)
            <tr class="hover:bg-gray-200">
                <x-no-data-status item="Operator" />
            </tr>
        @endif
        @foreach ($data as $data)
            @include('partials.data._operators_data')
        @endforeach

    </tbody>
</table>
