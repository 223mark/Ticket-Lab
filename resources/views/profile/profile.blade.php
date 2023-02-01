<x-main-layout title="Admin/Profile">
    <div class="flex items-center shadow-md mt-5 md:mt-10 bg-gray-100 flex-col md:flex-row ">
        <div class="w-full md:w-1/3">
            {{-- <img class="bg-cover"
                src="{{ $data->img ? asset('img/OperatorImage/' . $data->img) : asset('img/codelab.png') }}"
                alt="operator image" /> --}}
            <img class="bg-cover w-full" src="{{ asset('img/codelab.png') }}" alt="">
        </div>
        <div class="md:px-10 sm:px-5 w-full md:w-2/3">
            <h1 class="text-gray-800 font-bold text-lg pl-4 md:pl-0 md:text-2xl my-2">Profile Information</h1>

            @include('partials._profile_form')
        </div>

    </div>
</x-main-layout>
