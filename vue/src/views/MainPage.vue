<template >
   <div class="dark:bg-dark">
    <!-- hero section start -->
    <div
        class="flex flex-col mt-20 md:mt-14 h-smHeroImage md:h-mdHeroImage md:flex-row md:items-center md:justify-around "
        id="main-hero">
        <!-- left section -->
        <div class="px-5 hidden sm:text-center md:block md:w-1/2 ">
            <h2 class="text-lg font-semibold leading-8 text-white">Online Ticket Website</h2>
            <p class="mt-2 text-3xl font-bold tracking-tight text-green-700 sm:text-4xl">Easily get your ticket
            </p>
            <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-slate-400">The Leading Bus Ticket System Of Myanmar. The
                Fair
                Price with Comfy. Find the best ticket for your trip.</p>
            <div class="flex justify-around mt-10">
                <span class="px-4 py-2 bg-transparent border rounded-lg text-white font-medium ">
                    <sapn class="text-red-500 font-semibold">100+</sapn>operators
                </span>
                <span
                    class="px-4 py-2 bg-transparent border rounded-lg text-white font-medium flex items-center justify-center ">
                    <i class="fa-regular fa-circle-check text-xl text-green-500 mr-1"></i>secure payment
                </span>
    
            </div>
        </div>
    
        <!-- leftsection end -->
        <!-- right section -->
        <div class="flex justify-center items-center  mt-5    md:justify-end md:w-1/2  ">
            <!-- ticket search cart -->
            <TicketSearchCard />
        </div>
        <!-- right section end -->
    </div>
    <!-- hero end -->
    <!-- features section start  -->
    <Feacture />
    <!-- features section end -->
    <!-- popular route  -->
    <PopularRoute />
    <!-- popular route end -->
   </div>
    

    
</template>

<script setup>
import Feacture from './Feactures.vue'
import TicketSearchCard from '../components/Ticket-Search-Card.vue'
import PopularRoute from './PopularRoutes.vue'



</script>

<style scoped>

</style>
