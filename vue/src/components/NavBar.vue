<template>
    <!-- nav start -->
    <nav class="fixed top-0 p-4 w-full shadow-lg  z-50 bg-white ">
        <!-- flex container -->
        <div class="flex  justify-between">
            <!-- logo -->
            <div class="flex  items-center  ">
                <div class="">
                    <span class="text-2xl text-green-500 font-bold">Ticket </span> <span
                        class="text-2xl text-gray-900 font-bold">Lab</span>
                </div>
                <!-- menu item -->
                <div class="hidden md:block px-8">
                    <div class=" flex items-baseline space-x-4">
                        <router-link v-for="item in navigation" :key="item.name" :to="item.to"
                            active-class=" text-green-500"
                            :class="[this.$route.name === item.to.name ? '' : 'text-black hover:text-green-500  ', ' px-3  rounded-md text-lg font-semibold']">
                            {{ item.name }}
                        </router-link>
                    </div>
                </div>
            </div>
            <div class="">
                <!-- button -->
                <router-link to="/login"
                    class="hidden md:block  px-6 py-1 border border-gray-700 text-black font-sm  rounded-lg hover:bg-green-500 hover:text-white hover:border-green-500 focus:outline-none">Login
                </router-link>
            </div>
            <!-- hambuger icon -->
            <button id="btn-menu" class=" block hamburger md:hidden focus:outline-none">
                <span class="hamburger-top"></span>
                <span class="hamburger-middle"></span>
                <span class="hamburger-bottom"></span>
            </button>
        </div>
        <!-- mobile menu -->
        <div class="md:hidden">
            <div id="menu"
                class="absolute  flex-col items-center self-end hidden  py-8 mt-10 space-y-6 font-bold bg-white sm:w-auto self-center left-6 right-6 drop-shadow-md">
                <router-link v-for="item in navigation" :key="item.name" :to="item.to" active-class=" text-green-500"
                    :class="[this.$route.name === item.to.name ? '' : 'text-black hover:text-green-500  ', ' px-3  rounded-md text-lg font-semibold']">
                    {{ item.name }}
                </router-link>
            </div>
        </div>
    </nav>
    <!-- nav end -->
</template>
<script setup>

const navigation = [
    { name: 'Home', to: { name: 'app.home' } },
    { name: 'Opeartors', to: { name: 'app.operators' } },
    { name: 'Blog', to: { name: 'app.blog' } },
    { name: 'About Us', to: { name: 'app.about-us' } }
    // { name: 'Money', to: { name: 'Money'} },

];
</script>