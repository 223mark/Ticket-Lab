<x-main-layout title="Operators Edit">
    <div class="sm:flex items-center shadow-md mt-5 md:mt-10 ">
        <div>
            <img class="bg-cover"
                src="{{ $data->img ? asset('img/OperatorImage/' . $data->img) : asset('img/codelab.png') }}"
                alt="operator image" />
        </div>
        <div class="md:px-10 sm:px-5">
            <h1 class="text-gray-800 font-bold text-lg pl-4 md:pl-0 md:text-2xl my-2">Edit Operator</h1>

            @include('partials._editform_operator')
        </div>

    </div>
</x-main-layout>
