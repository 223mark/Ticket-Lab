<template>
    <!-- nav start -->
    
    <nav class="fixed top-0 p-4 w-full shadow-lg  z-50 bg-white flex justify-between dark:bg-dark">
        <!-- logo -->
        <div class="flex  items-center  ">
            <div class="">
                <span class="text-2xl text-theme font-bold dark:text-darkTheme">Ticket </span>
                <span class="text-2xl text-gray-900 font-bold dark:text-darkTheme">Lab</span>
            
            </div>
            
        </div>
        <div class="md:hidden flex justify-center items-center">
            <div class="pr-4">
                <!-- shopping bag icon -->
                        <h4 class="text-xl font-semibold text-green-500 cursor-pointer" v-if="localStorageCheck">
                         <router-link :to="{ name: 'app.orderHistory' }">
                             <i class="fa-solid fa-bag-shopping"></i>
                         </router-link>
                        </h4>          
                <!-- shopping bag icon end -->
            </div>
            <div class="">
                    <button class="font-medium text-xl text-green-500 cursor-pointer dark:text-darkTheme" v-if="isDark"  @click="toggleDark()">
                         <i class="fa-solid fa-sun"></i>
                    </button>
                    <button class="font-medium text-xl text-green-500 cursor-pointer dark:text-darkTheme" v-else  @click="toggleDark()">
                        <i class="fa-solid fa-moon"></i>
                     </button>
                </div>
            <button class="navbar-burger flex items-center text-green-600 dark:text-darkTheme p-3">
                <svg class="block h-6 w-6 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                   
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </button>
        </div>
        <div class="flex  hidden md:block  justify-between">
            <div class=" flex items-baseline space-x-4">
                 <!-- nav items -->
                <router-link v-for="item in navigation" :key="item.name" :to="item.to" active-class=" text-theme"
                        :class="[this.$route.name === item.to.name ? '' : 'text-black hover:text-green-500  ', ' px-3  rounded-md text-lg font-semibold tracking-wide dark:text-darkTheme']">
                        {{ item.name }}
                </router-link>
                <!-- nav items end -->
                <!-- shopping bag icon -->
                    <h4 class="text-xl font-semibold text-indigo-500 cursor-pointer" >
                     <router-link :to="{name: 'app.orderHistory'}">
                         <i class="fa-solid fa-bag-shopping"></i>
                     </router-link>
                    </h4>
                    
                <!-- shopping bag icon end -->
                <!-- darkmood toggle  -->
                     <button class="font-medium text-2xl text-theme cursor-pointer dark:text-darkTheme" v-if="isDark"    @click="toggleDark()">
                         <i class="fa-solid fa-sun"></i>
                      </button>
                    <button class="font-medium text-2xl text-theme cursor-pointer dark:text-darkTheme" v-else  @click="toggleDark()">
                        <i class="fa-solid fa-moon"></i>
                     </button>
                <!-- darkmood toggle end -->
                
            </div>
           
           
        </div>
    </nav>
    <!-- nav end -->
    <!-- mobile menu -->
    <div class="navbar-menu relative z-50 hidden">
        <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
        <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto dark:bg-dark">
            <div class="flex justify-between mb-8">
                <div class="flex  items-center  ">
                    <div class="">
                        <span class="text-xl text-theme font-bold dark:text-darkTheme">Ticket </span>
                        <span class="text-xl text-gray-900 font-bold dark:text-darkTheme">Lab</span>
                        
                    </div>
                    <!-- menu item -->
                
                </div>
                <div class="">     
                    <button class="navbar-close ">
                        <svg class="h-6 w-6 text-gray-400 dark:text-darkTheme cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                        
                    </button>
                </div>
                
            </div>
            <div class="flex flex-col space-y-6 ">
                <router-link v-for="item in navigation" :key="item.name" :to="item.to" active-class=" text-theme"
                    :class="[this.$route.name === item.to.name ? '' : 'text-black hover:text-green-500  ', ' px-3  rounded-md text-lg font-semibold tracking-wide dark:text-darkTheme']">
                    {{ item.name }}
                </router-link>
            </div>
           
        </nav>
    </div>
    <!-- mobile menu end -->
</template>
<script setup>
import { computed } from '@vue/runtime-core';
import { watchEffect } from '@vue/runtime-core';
import { onMounted } from '@vue/runtime-core';
import { useDark, useToggle } from '@vueuse/core'
import { ref } from 'vue';
import store from '../store';

const isDark = useDark();
//simple bolean switcher
const toggleDark = useToggle(isDark);
const navigation = [
    { name: 'Home', to: { name: 'app.home' } },
    { name: 'Opeartors', to: { name: 'app.operators' } },
    { name: 'About Us', to: { name: 'app.about-us' } }
    

];

const localStorageCheck = computed(()=>  store.state.iconStatus );

onMounted(() => {
   
    store.dispatch('getLocalStorageData');
    //console.log(localStorageCheck.value);
    
})

</script>