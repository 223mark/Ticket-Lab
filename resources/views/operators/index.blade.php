<x-main-layout title="Operators">
    <div class="mx-2 mt-10 md:mt-10 md:mx-4 ">
        <div class="flex justify-between pb-2">

            <x-add-button btn_name="Add Operators"></x-add-button>

            <form action="#" method="GET" class="">
                <x-search-input></x-search-input>
            </form>
        </div>
        @include('partials._form_operator')


        <x-table-operators :data=$data />

    </div>
</x-main-layout>
