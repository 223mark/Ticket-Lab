<template >
    
        <div class="flex  items-center p-2  border md:p-4 bg-white rounded mb-2 w-full md:justify-between " style="min-height:200px">
            <div class="space-y-1 md:space-y-4">
                <div class="">
                    <h5 class="font-bold text-md md:text-2xl text-blue-600 ">07:00 AM</h5>
                    <h5 class="font-semibold text-sm  text-indigo-600 md:hidden">Operator Name</h5>
                </div>
                <p class="py-1 font-light uppercase text-sm md:text-lg">Yangon - Mandalay </p> 
                <small class="block font-medium text-sm md:text-md ">Date : <span class="font-bold text-xs block md:inline md:text-md">2022/12/24</span></small>
                <small class="block font-medium text-sm md:text-md">Arrives : <span class="font-bold text-xs block md:inline md:text-md">Jan 1, 07:00AM</span> </small>
                <small class="block font-medium text-sm md:text-md  ">Duration : <span class="font-semibold text-xs block md:inline md:text-md">5 Hours</span> </small>
            </div>
            <div class="hidden md:inline-block ">
                <div class="h-28 ">
                    <img src="../../public/img/operators/operator.png" alt="" class="w-full h-full">
                </div>
                <h6 class=" font-semibold py-2 text-lg"> New Generation Express</h6>
                <div class="flex justify-center">
                    <button class="px-4 py-1 border border-indigo-400 rounded hover:bg-blue-400">Operators</button>
                </div>
            </div>
            <div class="space-y-2 md:space-y-4">
                <div class="md:py-2">
                    <h4 class=" font-bold text-green-500 my-2 text-sm md:text-lg">MMK 30,000</h4>
                    <h6 class="font-medium text-xs md:text-md ">1 seat * 30,000</h6>
                </div>
                <button class="px-2 py-2 bg-green-500 rounded hover:bg-green-400 text-white md:py-1"><span class="hidden md:inline">Select</span> <span>Seats</span></button>
        
            </div>
        </div>
       
       
        
    
</template>

<script setup>
import { onMounted } from "@vue/runtime-core";
import axiosClient from "../axiosClient";



onMounted(() => {
    axiosClient.get('/gb-tickets/?fromWhere[eq]=Mandalay').then((response) => {
        console.log(response.data.data);
    })
})

</script>