<x-main-layout title="Operator/Edit">

    <div class="md:px-10 sm:px-5    shadow-md border">
        <h1 class="text-gray-800 font-bold text-lg pl-4 md:pl-0 md:text-2xl my-2">Edit Operator</h1>


        <form class="px-8 pt-6 pb-8 mb-4  rounded" action="{{ route('operators#update', $operator->id) }}"
            enctype="multipart/form-data" method="POST">
            @csrf
            <div class=" flex flex-wrap justify-between gap-2 ">
                <div class="w-full md:w-2/5 ">

                    <x-input-label labelName="Operator Name" />
                    <x-input-tag type="text" name="operatorName" value="{{ $operator->operator_name }}" />
                    <x-jet-input-error for="operatorName" />


                </div>
                <div class="w-full md:w-2/5 ">

                    <x-input-label labelName="Phone1" />
                    <x-input-tag type="number" name="phoneOne" value="{{ $operator->phone1 }}" />
                    <x-jet-input-error for="phoneOne" />


                </div>
                <div class="w-full md:w-2/5 ">

                    <x-input-label labelName="Phone2" />
                    <x-input-tag type="number" name="phoneTwo" value="{{ $operator->phone2 }}" />
                    <x-jet-input-error for="phoneTwo" />


                </div>
                <div class="w-full md:w-2/5 ">

                    <x-input-label labelName="Email" />
                    <x-input-tag type="email" name="email" value="{{ $operator->email }}" />
                    <x-jet-input-error for="email" />


                </div>
                <div class="w-full md:w-2/5 ">

                    <x-input-label labelName="Operator Image" />
                    <x-input-tag type="file" name="img" value="{{ $operator->img }}" />

                </div>
                <div class=" w-full ">

                    <x-input-label labelName="Description" />
                    <textarea name="description" id="" cols="30" rows="5"
                        class="w-full px-4 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:border focus:border-indigo-700"> {{ $operator->description }}
            </textarea>
                </div>
                <div class="flex items-center justify-start w-full">

                    <x-button name="Update" type="submit" />

                    <a href="{{ route('operators#index') }}">
                        <x-button name="Cancel" type="button" />
                    </a>
                </div>

            </div>
        </form>
    </div>


</x-main-layout>
