<x-main-layout title="Expired Tickets">

    {{-- flash message --}}
    @if (Session::has('deleteMessage'))
        <x-toast-message>delete</x-toast-message>
    @endif
    <div class="mb-2 flex justify-between">
        <a href="{{ route('orders#index') }}">
            <x-button name="Return" />
        </a>
        <a href="{{ route('orders#deleteAllexpired') }}">
            <x-button name="slot">Delete All</x-button>
        </a>
    </div>

    {{-- table --}}
    <div class="overflow-auto rounded-lg shadow">
        <table class="w-full   border-collapse bg-white text-left text-sm text-gray-500 border shadow-lg ">
            {{-- table header --}}
            <x-table-header>order</x-table-header>


            <tbody class="divide-y divide-gray-100 border-t border-gray-100" id="table-id">

                {{-- tabke-data --}}
                @forelse ($expiredOrders as $data)
                    @include('partials.data._expired_tickets')
                @empty
                    <tr class="hover:bg-gray-200">
                        <x-no-data-status item="expired orders" />
                    </tr>
                @endif

            </tbody>
        </table>
    </div>



    <div class="mt-2">
        {{ $expiredOrders->links() }}
    </div>
</x-main-layout>
