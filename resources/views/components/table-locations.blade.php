@props(['data'])
<table class="w-full  border-collapse bg-white text-left text-sm text-gray-500 border shadow-lg ">
    {{-- table header --}}
    <x-table-header>location</x-table-header>

    <tbody class="divide-y divide-gray-100 border-t border-gray-100">

        @forelse ($data as $data)
            @include('partials.data._locations_data')
        @empty
            <tr class="hover:bg-gray-200">
                <x-no-data-status item="Location" />
            </tr>

        @endif
    </tbody>
</table>
