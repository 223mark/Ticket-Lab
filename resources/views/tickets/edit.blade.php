<x-main-layout title="Tickets/ Edit">
    <div class="sm:flex items-center shadow-md mt-5 md:mt-10 ">

        <div class="md:px-10 sm:px-5">
            <h1 class="text-gray-800 font-bold text-lg pl-4 md:pl-0 md:text-2xl my-2">Edit Tickets</h1>


            <form class="px-8 pt-6 pb-8 mb-4  rounded" action="{{ route('tickets#store') }}" enctype="multipart/form-data"
                method="POST">
                @csrf
                <div class=" flex flex-wrap justify-between gap-2 ">

                    <div class="w-full md:w-2/5 ">

                        <x-input-label labelName="Date" />
                        <x-input-tag type="date" name="price" value="{{ $data->date }}" />

                    </div>
                    <div class="w-full md:w-2/5 ">
                        <x-input-label labelName="Status" />
                        <x-input-tag type="text" name="status" value="{{ $data->status }}" />

                    </div>
                    <div class="w-full md:w-2/5 ">
                        <x-input-label labelName="Seat Number" />
                        <x-input-tag type="text" name="status" value="{{ $data->seat_number }}" />

                    </div>
                    <div class="flex items-center justify-start space-x-4 w-full mt-2 md:mt-4">

                        <x-button name="Add" type="submit" />
                        <a href="{{ route('tickets#index') }}">
                            <x-button name="Cancel" type="button" />
                        </a>

                        <a href="{{ route('tickets#destory', $data->id) }}">
                            <x-button name="Delete" type="button" />
                        </a>

                    </div>


                </div>
            </form>

        </div>



    </div>


</x-main-layout>
