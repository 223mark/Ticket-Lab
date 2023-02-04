<form class="px-4 md:px-0 py-8 pt-6  mb-4  rounded" action="" enctype="multipart/form-data" method="POST">
    @csrf
    <div class=" flex flex-wrap justify-between gap-2 ">

        <div class="w-full md:w-2/5 ">
            <x-input-label labelName="Current Password" />
            <x-input-tag type="password" name="currentPassword" />

        </div>
        <div class="w-full md:w-2/5 ">
            <x-input-label labelName="New Password" />
            <x-input-tag type="password" name="newPassword" />

        </div>


        <div class="flex items-center justify-start w-full space-x-4 mt-5 md:mt-10">
            <button
                class="  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700   hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm"
                type="submit">Change</button>
            <a href="{{ route('profile#index') }}">
                <button
                    class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 text-gray-600  hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm "
                    type="button">Back</button>
            </a>

        </div>

    </div>
</form>
