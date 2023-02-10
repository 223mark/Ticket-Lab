@props(['data'])
<table class="w-full  border-collapse bg-white text-left text-sm text-gray-500 border shadow-lg ">
    {{-- table header --}}
    <x-table-header>operator</x-table-header>


    <tbody class="divide-y divide-gray-100 border-t border-gray-100" id="table-id">

        {{-- tabke-data --}}
        @forelse ($data as $data)
            @include('partials.data._operators_data')
        @empty
            <tr class="hover:bg-gray-200">
                <x-no-data-status item="Operator" />
            </tr>
        @endif

    </tbody>
</table>
