<template>
        <!-- nav start -->
        <nav class="fixed top-0 p-4 w-full shadow-lg  z-50 bg-white ">
            <!-- flex container -->
            <div class="flex  justify-between">
                <!-- logo -->
                <div class="flex  items-center  ">
                    <div class="">
                        <span class="text-2xl text-green-500 font-bold">Ticket </span> <span class="text-2xl text-black">Lab</span>
                    </div>
                    <!-- menu item -->
                    <div class="hidden md:block px-8">
                        <div class=" flex items-baseline space-x-4">
                            <router-link v-for="item in navigation" :key="item.name" :to="item.to" active-class=" text-green-500"
                                :class="[this.$route.name === item.to.name ? '' : 'text-black hover:text-green-500  ', ' px-3  rounded-md text-lg font-semibold']">
                                {{ item.name }}
                            </router-link>
                        </div>
                    </div>
                   
                    
                </div>
               <div class="">
                <!-- button -->
                <a href="#"
                    class="hidden md:block  px-6 py-1 border border-gray-700 text-black font-sm  rounded-lg hover:bg-green-500 hover:text-white hover:border-green-500 focus:outline-none">Login</a>
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
        <div class=" space-y-8">
            <router-view></router-view>
        </div>
        
        <!-- footer start -->
        <footer id="footer"  style="padding:50px 80px">
            <div class="flex flex-col md:flex-row md:justify-between ">
                <div class="">
                    <div class="pb-2">
                        <span class="text-2xl font-semibold text-green-500">Ticket </span> <span class="text-2xl font-semibold text-black-500">Lab</span>
                        <h4 class="text-white py-2 text-md">Buy Ticket At Your Home</h4>
                    </div>
                    <div class="my-2 text-white text-xl">
                        <span>Phone </span>
                        <span class="">
                            +95 99000000
                        </span>
                    </div>
                </div>
                <div class="">
                    <div class="pb-4">
                        <h5 class="text-xl font-semibold text-white">Information</h5>
                    </div>
                    <div class="text-md text-white space-y-5">
                        <p>Find/Print Your Ticket</p>
                        <p>How to open MPU Ecommerce</p>
                        <p>How to buy using transfer</p>
                    </div>
                </div>
                <div class="">
                    <div class="pb-4">
                        <h5 class="text-xl font-semibold text-white">About Us</h5>
                    </div>
                    <div class="text-md text-white space-y-5">
                        <p>Legal Information</p>
                        <p>Our Terms and Conditions</p>
                            <p>Privacy Policy</p>
                    </div>
                </div>
            </div>
        </footer>
        
        <!-- footer end -->
   
</template>
<script setup>

const navigation = [
    { name: 'Trip', to: { name: 'Home' } },
    { name: 'Opeartors', to: { name: 'Operators' } },
    { name: 'Blog', to: { name: 'Blog' } },
    { name: 'Services', to: { name: 'Services' } }
    // { name: 'Money', to: { name: 'Money'} },

];

</script>

<style>
#footer {
    min-height: 30vh;
    background-image: url('../../public/img/banner/footerbanner.png');
    background-repeat: no-repeat;
    background-position: top 10% right 0;
    background-size: cover;

}
</style>