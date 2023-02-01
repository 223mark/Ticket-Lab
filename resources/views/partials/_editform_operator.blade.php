<form class="px-8 pt-6 pb-8 mb-4  rounded" action="{{ route('operators#update', $data->id) }}"
    enctype="multipart/form-data" method="POST">
    @csrf
    <div class=" flex flex-wrap justify-between gap-2 ">
        <div class="w-full md:w-2/5 ">

            <x-input-label labelName="Operator Name" />
            <x-input-tag type="text" name="operatorName" value="{{ old('operatorName') }}" />

        </div>
        <div class="w-full md:w-2/5 ">

            <x-input-label labelName="Phone1" />
            <x-input-tag type="number" name="phoneOne" value="{{ old('phoneOne') }}" />

        </div>
        <div class="w-full md:w-2/5 ">

            <x-input-label labelName="Phone2" />
            <x-input-tag type="number" name="phoneTwo" value="{{ old('phoneTwo') }}" />

        </div>
        <div class="w-full md:w-2/5 ">

            <x-input-label labelName="Email" />
            <x-input-tag type="email" name="email" value="{{ $data->email }}" />

        </div>
        <div class="w-full md:w-2/5 ">

            <x-input-label labelName="Operator Image" />
            <x-input-tag type="file" name="img" value="{{ $data->img }}" />

        </div>
        <div class=" w-full ">

            <x-input-label labelName="Description" />
            <textarea name="address" id="" cols="30" rows="5"
                class="w-full px-4 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:border focus:border-indigo-700"> {{ $data->address }}
            </textarea>
        </div>
        <div class="flex items-center justify-start w-full">
            <button
                class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm"
                type="submit">Update</button>
            <a href="{{ route('operators#index') }}"
                class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 text-gray-600  hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm ">
                Cancel
            </a>
        </div>

    </div>
</form>
