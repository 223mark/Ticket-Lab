@props(['busRoutes'])
<table class="w-full  border-collapse bg-white text-left text-sm text-gray-500 border shadow-lg ">
    {{-- table header --}}
    <x-table-header>route</x-table-header>


    <tbody class="divide-y divide-gray-100 border-t border-gray-100">

        @forelse ($busRoutes as $data)
            @include('partials.data._bus_routes')
        @empty
            <tr class="hover:bg-gray-200">
                <x-no-data-status item="Routes" />
            </tr>

        @endif

    </tbody>

</table>
<div class="my-4 md:my-6">
    {{ $busRoutes->links() }}
</div>
