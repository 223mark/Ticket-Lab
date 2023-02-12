<x-main-layout title="Location">
    <div class="mx-2 mt-10 md:mt-10 md:mx-4 ">

        <div class="flex justify-between pb-2">
            <x-add-button btn_name="Add Location"></x-add-button>



            <form action="">
                <x-search-input :searchText=$searchText></x-search-input>
            </form>

        </div>


        {{-- add form --}}
        @include('partials._form_location')

        {{-- flash message --}}
        @if (Session::has('addMessage'))
            <x-toast-message>add</x-toast-message>
        @endif

        @if (Session::has('deleteMessage'))
            <x-toast-message>delete</x-toast-message>
        @endif

        {{--  table --}}

        <table class="w-full  border-collapse bg-white text-left text-sm text-gray-500 border shadow-lg ">
            {{-- table header --}}
            <x-table-header>location</x-table-header>

            <tbody class="divide-y divide-gray-100 border-t border-gray-100">

                @forelse ($locations as $data)
                    @include('partials.data._locations_data')
                @empty
                    <tr class="hover:bg-gray-200">
                        <x-no-data-status item="Location" />
                    </tr>

                @endif
            </tbody>
        </table>

        <div class="mt-2">
            {{ $locations->links() }}
        </div>

    </div>
</x-main-layout>
