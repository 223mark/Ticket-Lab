<x-main-layout title="Tickets">
    <div class="mx-2 mt-10 md:mt-10 md:mx-4 ">
        <div class="flex justify-between pb-2">
            <x-add-button btn_name="Add Tickets" id="addBtn"></x-add-button>

            <form action="#" method="GET" class="">
                <x-search-input></x-search-input>
            </form>
        </div>

        @include('partials._form_ticket')


        <x-table-tickets :tickets=$data />

    </div>
</x-main-layout>
