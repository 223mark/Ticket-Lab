<x-main-layout title="Routes">
    <div class="mx-2 mt-10 md:mt-10 md:mx-4 ">
        <div class="flex justify-between pb-2">
            <x-add-button btn_name="Add Routes" id="addBtn"></x-add-button>

            <form action="" method="GET">
                <x-search-input></x-search-input>
            </form>
        </div>
        {{-- route add --}}
        @include('partials._form_bus_routes')

        {{-- route table --}}
        <x-table-bus-routes :busRoutes=$busRoutes />

    </div>
</x-main-layout>
