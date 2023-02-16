<template>
   
        <div
        
         class="flex flex-col bg-white shadow-md  px-4  sm:px-6 md:px-8  lg:px-10  pb-4 rounded-3xl  max-w-md border-2 border-gray-200 max-w-md ">
            <div class="flex justify-end">
                <span class="px-4 border-2 border-gray-600">close</span>
            </div>
            <div class="font-medium self-center text-xl md:text-2xl text-green-500">
                Login
            </div>
            <div class="mt-4 self-center text-xl text-sm text-indigo-400 md:text-lg">
                Enter your credentials to get access account
            </div>
    
            <div class="mt-5">
                <!-- <LoginCard/> -->
                <RegisterCard/>
            </div>
            <div class="flex justify-center items-center mt-6">
                <div class=" inline-flex items-center text-gray-700 font-medium text-xs text-center ">
                    <span class="ml-2">Don't have an account?
            
                        <span class="text-xs ml-2 text-blue-500 font-semibold">Register here</span>
            
                    </span>
                </div>
            </div>
        </div>
    
    
   
   
</template>
<script setup>
//components 

import LoginCard from './Login.vue'
import RegisterCard from './Register.vue'
import { ref } from 'vue';
const authStatus =ref(false)


const toggleAuth = () => {
     authStatus.value = !authStatus.value
}
</script>