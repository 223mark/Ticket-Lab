<x-main-layout title="Operator/Deatil">

    <div class="md:px-10 sm:px-5    shadow-md border">
        <h1 class="text-indigo-800 mt-3 mb-2 underline font-bold text-lg pl-4 md:pl-0 md:text-2xl ">Operator Detail</h1>

        <div class="flex flex-col md:flex-row">
            <div class="w-full md:w-1/3 flex justify-center items-center">
                <div class="w-full  ">
                    <img class="h-full w-full rounded-lg object-cover object-center"
                        src="{{ $operator->img ? asset('img/OperatorImage/' . $operator->img) : asset('img/codelab.png') }}"
                        alt="oparator" />

                </div>
            </div>
            <div class="w-full md:w-2/3">
                <form class="px-8 pt-6 pb-8 mb-4  rounded" action="{{ route('operators#update', $operator->id) }}"
                    enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class=" flex flex-wrap justify-between gap-2 ">
                        <div class="w-full md:w-2/5 ">

                            <x-input-label labelName="Operator Name" />
                            <x-input-tag type="text" disabled value="{{ $operator->operator_name }}" />

                        </div>

                        <div class="w-full md:w-2/5 ">

                            <x-input-label labelName="Email" />
                            <x-input-tag type="email" disabled value="{{ $operator->email }}" />


                        </div>

                        <div class="w-full md:w-2/5 ">

                            <x-input-label labelName="Phone1" />
                            <x-input-tag type="number" disabled value="{{ $operator->phone1 }}" />

                        </div>
                        <div class="w-full md:w-2/5 ">

                            <x-input-label labelName="Phone2" />
                            <x-input-tag type="number" disabled value="{{ $operator->phone2 }}" />

                        </div>


                        <div class=" w-full ">

                            <x-input-label labelName="Description" />
                            <textarea name="description" disabled cols="30" rows="8"
                                class="w-full px-4 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:border focus:border-indigo-700"> {{ $operator->description }}
                            </textarea>

                        </div>
                        <div class="w-full">
                            <span class="text-slate-700 font-medium text-sm tracking-wide text-md pr-2">
                                want to edit this operator ?
                            </span>
                            <a href="{{ route('operators#edit', $operator->id) }}">
                                <span class="text-blue-500 font-semibold  cursor-pointer text-sm ">click here</span>
                            </a>
                        </div>
                        <div class="mt-2 flex items-center justify-start w-full">

                            <a href="{{ route('operators#index') }}">
                                <x-button name="Return" type="button" />
                            </a>
                        </div>

                    </div>
                </form>
            </div>

        </div>

    </div>


</x-main-layout>
