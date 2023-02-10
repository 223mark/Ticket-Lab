<x-main-layout title="Location">
    <div class="mx-2 mt-10 md:mt-10 md:mx-4 ">

        <div class="flex justify-between pb-2">
            <x-add-button btn_name="Add Location"></x-add-button>

            <form action="{{ route('locations#filter') }}" method="POST">
                @csrf
                <x-search-input></x-search-input>
            </form>
        </div>


        @include('partials._form_location')


        {{-- data table --}}

        <x-table-locations :data=$locations></x-table-locations>

        <div class="mt-2">
            {{ $locations->links() }}
        </div>

    </div>
</x-main-layout>
