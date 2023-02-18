<template>
    <!-- nav start -->
    
    <nav class="fixed top-0 p-4 w-full shadow-lg  z-50 bg-white flex justify-between">
        <!-- logo -->
        <div class="flex  items-center  ">
            <div class="">
                <span class="text-xl theme-color font-bold">Ticket </span>
                <span class="text-xl text-gray-900 font-bold">Lab</span>
            </div>
            <!-- menu item -->
        
        </div>
        <div class="lg:hidden">
            <button class="navbar-burger flex items-center text-green-600 p-3">
                <svg class="block h-6 w-6 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                   
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </button>
        </div>
        <div class="flex hidden md:block  justify-between">
            
            <div class=" px-8">
                <div class=" flex items-baseline space-x-4">
                    <router-link v-for="item in navigation" :key="item.name" :to="item.to" active-class=" theme-color"
                        :class="[this.$route.name === item.to.name ? '' : 'text-black hover:text-green-500  ', ' px-3  rounded-md text-lg font-semibold tracking-wide']">
                        {{ item.name }}
                    </router-link>
                </div>
            </div>
           
        </div>
    </nav>
    <!-- nav end -->
    <!-- mobile menu -->
    <div class="navbar-menu relative z-50 hidden">
        <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
        <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
            <div class="flex justify-between mb-8">
                <div class="flex  items-center  ">
                    <div class="">
                        <span class="text-xl theme-color font-bold">Ticket </span>
                        <span class="text-xl text-gray-900 font-bold">Lab</span>
                    </div>
                    <!-- menu item -->
                
                </div>
                <button class="navbar-close">
                    <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            <div class="flex flex-col space-y-6 ">
                <router-link v-for="item in navigation" :key="item.name" :to="item.to" active-class=" theme-color"
                    :class="[this.$route.name === item.to.name ? '' : 'text-black hover:text-green-500  ', ' px-3  rounded-md text-lg font-semibold tracking-wide']">
                    {{ item.name }}
                </router-link>
            </div>
           
        </nav>
    </div>
    <!-- mobile menu end -->
</template>
<script setup>

const navigation = [
    { name: 'Home', to: { name: 'app.home' } },
    { name: 'Opeartors', to: { name: 'app.operators' } },
    { name: 'About Us', to: { name: 'app.about-us' } }
    

];

// const hambagerBtn = document.getElementById('btn-menu');
// const nav = document.getElementById('menu');

// const toggleMenu=() =>{
//     hambagerBtn.classList.toggle('open');
//     nav.classList.toggle('flex');
//     nav.classList.toggle('hidden')
// }
</script>