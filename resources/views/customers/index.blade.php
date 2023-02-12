<x-main-layout title="Customer/Index">


    <table class="w-full  border-collapse bg-white text-left text-sm text-gray-500 border shadow-lg ">
        {{-- table header --}}
        <x-table-header>customer</x-table-header>


        <tbody class="divide-y divide-gray-100 border-t border-gray-100" id="table-id">

            {{-- tabke-data --}}
            @forelse ($customers as $data)
                {{-- @include('partials.data._operators_data') --}}
            @empty
                <tr class="hover:bg-gray-200">
                    <x-no-data-status item="Customer" />
                </tr>
            @endif

        </tbody>
    </table>



    <div class="mt-2" id="paginator-id">
        {{ $customers->links() }}
    </div>

</x-main-layout>
