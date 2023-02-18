<x-main-guest-layout title="Login" formTitle="Login Your Acount">

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="flex flex-col mb-5">
            <label for="email" class="mb-1 text-xs tracking-wide text-gray-600">E-Mail Address:</label>
            <div class="relative">
                <div
                    class="
                    inline-flex
                    items-center
                    justify-center
                    absolute
                    left-0
                    top-0
                    h-full
                    w-10
                    text-gray-400
                  ">
                    <i class="fas fa-at text-blue-500"></i>
                </div>

                <input id="email" type="email" name="email"
                    class="
                    text-sm
                    placeholder-gray-500
                    pl-10
                    pr-4
                    rounded-2xl
                    border border-gray-400
                    w-full
                    py-2
                    focus:outline-none focus:border-blue-400
                  "
                    placeholder="Enter your email" />
            </div>
            <x-jet-input-error for="email" />

        </div>
        <div class="flex flex-col mb-5">
            <label for="password" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Password:</label>
            <div class="relative">
                <div
                    class="
                    inline-flex
                    items-center
                    justify-center
                    absolute
                    left-0
                    top-0
                    h-full
                    w-10
                    text-gray-400
                  ">
                    <span>
                        <i class="fas fa-lock text-blue-500"></i>
                    </span>
                </div>

                <input id="password" type="password" name="password"
                    class="
                    text-sm
                    placeholder-gray-500
                    pl-10
                    pr-4
                    rounded-2xl
                    border border-gray-400
                    w-full
                    py-2
                    focus:outline-none focus:border-blue-400
                  "
                    placeholder="Enter your password" />
            </div>
            <x-jet-input-error for="password" />

        </div>


        <div class="flex w-full">
            <button type="submit"
                class="
                  flex
                  mt-2
                  items-center
                  justify-center
                  focus:outline-none
                  text-white text-sm
                  sm:text-base
                  bg-blue-500
                  hover:bg-blue-600
                  rounded-2xl
                  py-2
                  w-full
                  transition
                  duration-150
                  ease-in
                ">
                <span class="mr-2 uppercase">Login</span>
                <span>
                    <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>
            </button>
        </div>
    </form>
    <div class="flex justify-center items-center mt-6">
        <a href="#" target="_blank"
            class="
            inline-flex
            items-center
            text-gray-700
            font-medium
            text-xs text-center
          ">
            <span class="ml-2">Forget Password?
                <a href="/login" class="text-xs ml-2 text-blue-500 font-semibold">Click here</a></span>
        </a>
    </div>

</x-main-guest-layout>
