@props(['data'])
<table class="w-full  border-collapse bg-white text-left text-sm text-gray-500 border shadow-lg ">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Location </th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
        @if (count($data) == 0)
            <tr class="hover:bg-gray-200">
                <x-no-data-status item="Location" />
            </tr>
        @endif
        @foreach ($data as $data)
            @include('partials.data._locations_data')
        @endforeach
    </tbody>
</table>
