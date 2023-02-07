<form class="px-8 pt-6 pb-8 mb-4  rounded" action="{{ route('profile#update') }}" enctype="multipart/form-data"
    method="POST">
    @csrf
    <div class=" flex flex-wrap justify-between gap-2  space-y-4">
        <div class="w-full md:w-2/5  ">

            <x-input-label labelName="Name" />
            <x-input-tag type="text" name="name" value="{{ $data->name }}" />
            <x-jet-input-error for="name" />


        </div>
        <div class="w-full md:w-2/5 ">
            <x-input-label labelName="Phone" />
            <x-input-tag type="number" name="phone" value="{{ $data->phone }}" />

        </div>
        <div class="w-full md:w-2/5 ">
            <x-input-label labelName="Email" />
            <x-input-tag type="email" name="email" value="{{ $data->email }}" />

        </div>
        <div class="w-full md:w-2/5 ">
            <x-input-label labelName="Profile Image" />
            <x-input-tag type="file" name="img" value="{{ $data->img }}" />

        </div>

        <div class="flex items-center justify-start w-full space-x-4 mt-2">
            <x-button name="Update" type="submit" />
            <a href="{{ route('profile#passwordChangePage') }}">
                <x-button name="Change Password" type="button" />

            </a>

        </div>

    </div>
</form>
