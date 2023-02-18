<form class="px-4 md:px-0 py-8 pt-6  mb-4  rounded" action="{{ route('profile#passwordUpdate') }}" method="POST">
    @csrf
    <div class=" flex flex-wrap justify-between gap-2 ">

        {{-- flash message --}}
        @if (Session::has('updateMessage'))
            <x-toast-message>update</x-toast-message>
        @endif


        <div class="w-full md:w-2/5 ">
            <x-input-label labelName="Current Password" />
            <x-input-tag type="password" name="currentPassword" placeholder="Enter Current Password" />
            <x-jet-input-error for="currentPassword" />
            {{-- carditional unmatch message --}}
            @if (Session::has('PswnotMatch'))
                <small class="text-red-500 mt-2 font-medium tracking-wide">{{ Session::get('PswnotMatch') }}</small>
            @endif

        </div>

        <div class="w-full md:w-2/5 ">
            <x-input-label labelName="New Password" />
            <x-input-tag type="password" name="newPassword" placeholder="Enter New Password" />
            <x-jet-input-error for="newPassword" />



        </div>


        <div class="flex items-center justify-start w-full space-x-4 mt-5 md:mt-10">

            <x-button name="Update" type="submit" />

            <a href="{{ route('profile#index') }}">
                <x-button name="Profile" type="button" />
            </a>

        </div>

    </div>
</form>
