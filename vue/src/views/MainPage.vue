<template>
    <!-- hero section start -->
      <section class="flex flex-col mt-10 md:flex-row md:items-center md:justify-around" id="main-hero">
                <div class="px-5 sm:text-center md:w-1/2 ">
                    <h2 class="text-lg font-semibold leading-8 text-white">Online Ticket Website</h2>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-indigo-700 sm:text-4xl">Easily get your ticket
                    </p>
                    <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-gray-400">Lorem ipsum dolor sit amet consect
                        adipisicing elit. Possimus magnam voluptatum cupiditate veritatis in accusamus quisquam.</p>
                    <div class="flex justify-around mt-10">
                        <a href="#" class="px-4 py-2 bg-green-500 text-black">Operators</a>
                        <a href="#" class="px-4 py-2 bg-indigo-500 text-black">Tickets</a>
                    </div>
                </div>
                <div class="flex justify-center  mt-4    md:justify-end md:w-1/2  ">
                    <TicketSearchCard />
                </div>
     </section> 
    <!-- hero end -->  
    <!-- features section start  -->
    <Feacture class=""/>
    <!-- features section end -->
    <!-- newsletter banner start -->
    <section id="newsletter" class="mt-2  ">
      <div class="mx-auto max-w-lg flex items-center justify-center  ">
        <input type="text" class="w-3/4 px-4 py-1 rounded-lg shadow-lg border text-gray-700 placeholder-indigo-300 focus:text-blue-500 focus:bg-blue-100">
        <button class="px-4 py-1 bg-green-500 text-white w-1/4">Get</button>
      </div>
    </section>
    <!-- newsletter banner end -->
    <!-- frequent questions start -->
    <section id="frequent-question">
        <div class="sm:flex items-center shadow-md">
            <div class="px-5 md:px-10 ">
                <h1 class="text-gray-800 font-bold text-2xl my-2">l</h1>
                <p class="text-gray-700 mb-2 md:mb-6">It is a long established fact that a reader will be distracted by the
                    readable content of a page when looking at its layout. The point of using Lorem Ipsum is that....</p>
                <div class="flex justify-between mb-2">
                    <span class="font-thin text-sm">May 20th 2020</span>
                    <span class="sm:block hidden mb-2 text-gray-800 font-bold">Read more</span>
                </div>
            </div>
            <div>
                <img class="bg-cover"
                    src="../../public/img/questions.png"
                    alt="" />
            </div>
        </div>
    </section>
    <!-- frequent questions end -->

    
</template>

<script setup>
import Feacture from './Feactures.vue'
import TicketSearchCard from '../components/Ticket-Search-Card.vue'



</script>

<style scoped>
#newsletter{
    height: 30vh;
    background-image: url('../../public/img/banner/news_banner.png');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: top 20% right 0;
}
</style>
