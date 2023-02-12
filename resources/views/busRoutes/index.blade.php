<x-main-layout title="Routes">
    <div class="mx-2 mt-10 md:mt-10 md:mx-4 ">
        <div class="flex justify-between pb-2">
            {{-- add model btn --}}
            <x-add-button btn_name="Add Routes" id="addBtn"></x-add-button>

            <form action="" method="">

                <x-search-input :searchText=$searchText></x-search-input>
            </form>
        </div>
        {{-- route add form --}}
        @include('partials._form_bus_routes')

        {{-- flash message --}}
        @if (Session::has('addMessage'))
            <x-toast-message>add</x-toast-message>
        @endif

        {{-- flash message --}}
        @if (Session::has('updateMessage'))
            <x-toast-message>update</x-toast-message>
        @endif
        @if (Session::has('deleteMessage'))
            <x-toast-message>delete</x-toast-message>
        @endif
        @if (Session::has('unvalidMessage'))
            <x-toast-message>unvaild</x-toast-message>
        @endif


        {{-- route table --}}

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


    </div>
</x-main-layout>
