<template>
    <div class="min-h-screen flex flex-col items-center justify-center bg-gray-100">
        <div class="
              flex flex-col
              bg-white
              shadow-md
              px-4
              sm:px-6
              md:px-8
              lg:px-10
              py-8
              rounded-3xl
              w-50
              max-w-md
            ">
            <div class="font-medium self-center text-xl sm:text-3xl text-gray-800">
                Join us Now
            </div>
            <div class="mt-4 self-center text-xl sm:text-sm text-gray-800">
                Enter your credentials to get access account
            </div>
    
            <div class="mt-10">
                <router-view></router-view>
            </div>
        </div>
       
    </div>
</template>