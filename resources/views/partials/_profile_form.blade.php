<form class="px-8 pt-6 pb-8 mb-4  rounded" action="" enctype="multipart/form-data" method="POST">
    @csrf
    <div class=" flex flex-wrap justify-between gap-2 ">
        <div class="w-full md:w-2/5 ">
            <label class="block mb-2 text-md font-semibold text-indigo-500" for="Name">
                Name
            </label>
            <input
                class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:border focus:border-indigo-700"
                id="Name" type="text"name="name" value="" />
        </div>
        <div class="w-full md:w-2/5 ">
            <label class="block mb-2 text-md font-semibold text-indigo-500" for="phone">
                Phone
            </label>
            <input
                class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:border focus:border-indigo-700"
                id="phone" type="number" name="phone" value="" />
        </div>
        <div class="w-full md:w-2/5 ">
            <label class="block mb-2 text-md font-semibold text-indigo-500" for="email">
                Email
            </label>
            <input
                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:border focus:border-indigo-700"
                id="email" type="email" name="email" value="" />
        </div>
        <div class="w-full md:w-2/5 ">
            <label class="block mb-2 text-md font-semibold text-indigo-500" for="img">
                Image
            </label>
            <input
                class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:border focus:border-indigo-700"
                id="img" type="file" name="img" />
        </div>

        <div class="flex items-center justify-start w-full space-x-4 mt-2">
            <button
                class="  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700   hover:bg-indigo-600 bg-indigo-700 rounded text-white px-6 py-2 text-sm"
                type="submit">Update Profile</button>
            <a href="{{ route('profile#passwordChangePage') }}">
                <button
                    class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-700   hover:bg-green-600 bg-green-700 rounded text-white px-6 py-2 text-sm"
                    type="button">Change Password</button>
            </a>

        </div>

    </div>
</form>
