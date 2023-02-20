<x-main-layout title="Operators">
    <div class="mx-2 mt-10 md:mt-10 md:mx-4 ">
        <div class="flex flex-col-reverse md:flex-row md:justify-between items-center ">

            <x-add-button btn_name="Add Operators"></x-add-button>

            {{-- search  --}}
            <form action="">
                <x-search-input :searchText=$searchText />
            </form>
        </div>

        {{-- add form --}}
        @include('partials._form_operator')

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

        {{-- table --}}

        <div class="overflow-auto rounded-lg shadow">
            <table class="w-full  border-collapse bg-white text-left text-sm text-gray-500 border shadow-lg ">
                {{-- table header --}}
                <x-table-header>operator</x-table-header>


                <tbody class="divide-y divide-gray-100 border-t border-gray-100" id="table-id">

                    {{-- tabke-data --}}
                    @forelse ($operators as $data)
                        @include('partials.data._operators_data')
                    @empty
                        <tr class="hover:bg-gray-200">
                            <x-no-data-status item="Operator" />
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>



        <div class="mt-2" id="paginator-id">
            {{ $operators->links() }}
        </div>

    </div>
</x-main-layout>
