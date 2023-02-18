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

{{-- jquery --}}
<script>
    $(document).ready(function() {
        $('#searchBtn').click(function() {
            $searchItem = $('.searchItems').val()
            $('#paginator-id').addClass('hidden');
            $.ajax({
                type: 'get',
                url: 'http://127.0.0.1:8000/operators/filter',
                data: {
                    'searchItem': $searchItem
                },
                dataType: 'json',
                success: function(response) {
                    console.log(response);

                    console.log(response.data.length, 'length');
                    let data = response.data;
                    $data = '';
                    if (data.length != 0) {
                        for ($i = 0; $i < data.length; $i++) {

                            $data += ` 
                        <tr class="hover:bg-gray-200">
                            <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                                <div class="relative h-10 w-10">
                                    
                                    <span class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                                </div>
                                <div class="text-sm">
                                    <div class="font-medium text-gray-700">${data[$i].operator_name}</div>
                                    <div class="text-gray-400">${data[$i].email}</div>
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                <a href="">
                                    <span class="font-bold text-blue-500 underline">
                                        Tickets Codes
                                    </span></a>
                            </td>
                            <td class="px-6 py-4">${data[$i].phone1}</td>
                            <td class="px-6 py-4">${data[$i].phone2}</td>
                            <td class="px-6 py-4">${data[$i].description}</td>
                            <td class="px-6 py-4">
                                <div class="flex justify-end gap-4">
                                    <a x-data="{ tooltip: 'Delete' }" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" class="h-6 w-6" x-tooltip="tooltip">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </a>
                                    <a x-data="{ tooltip: 'Edite' }" href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" class="h-6 w-6" x-tooltip="tooltip">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        `
                        }

                        $('#table-id').html($data);

                    } else {
                        $data =
                            `
                        <tr class="hover:bg-gray-200">
                           <td class="px-6 py-4 text-center" colspan="7">
                               
                                    <span class="font-semibold text-red-500 ">
                                        There is related date with searchtext !

                                    </span>
                                    <a href="{{ route('operators#index') }}" class="font-bold text-blue-500 underline">
                                         Go Back
                                    </a>
                            </td>
                        </tr>

                        `
                        $('#table-id').html($data);
                    }

                }
            })


        })

    })
</script>
