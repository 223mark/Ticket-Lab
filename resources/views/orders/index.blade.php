<x-main-layout title="Order/Index">


    <div class="flex justify-between mb-2">
        <div class="">

            {{-- {{ $currentUrl }} --}}
            {{-- <form action="" method="POST">
                @csrf
                <x-per-page></x-per-page>
            </form> --}}
            <x-filter-dropdown :data=$operators></x-filter-dropdown>
        </div>
        <div class="">
            <a href="/orders/index">
                <x-button name="reset"></x-button>
            </a>
        </div>
    </div>
    {{-- table --}}
    <div class="overflow-auto rounded-lg shadow">
        <table class="w-full   border-collapse bg-white text-left text-sm text-gray-500 border shadow-lg ">
            {{-- table header --}}
            <x-table-header>order</x-table-header>


            <tbody class="divide-y divide-gray-100 border-t border-gray-100" id="table-id">

                {{-- tabke-data --}}
                @forelse ($orders as $data)
                    @include('partials.data._orders_data')
                @empty
                    <tr class="hover:bg-gray-200">
                        <x-no-data-status item="Order" />
                    </tr>
                @endif

            </tbody>
        </table>
    </div>



    <div class="mt-2">
        {{ $orders->links() }}
    </div>
</x-main-layout>
