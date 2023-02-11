<template >
    
        <div class="flex  items-center p-2  border-2 border-gray-700 md:p-4 bg-gray-300 rounded mb-2 w-full md:justify-between " style="min-height:200px"
        v-for="t in tickets" :key="t.id"
        >
            <div class="space-y-1 md:space-y-4 w-2/4">
                <div class="">
                    <h5 class="font-bold text-md md:text-2xl text-blue-600 ">{{ t.departureTime }} </h5>
                    <h5 class="font-semibold text-sm  text-indigo-600 md:hidden">{{ t.operatorName }}</h5>
                </div>
                <p class="py-1 font-light uppercase text-sm md:text-lg">{{ t.fromWhere }} - {{ t.toWhere }} </p> 
                <small class="block font-medium text-sm md:text-md ">Date : <span class="font-bold text-xs block md:inline md:text-md">{{ date }}</span></small>
                <small class="block font-medium text-sm md:text-md">Departure Time : <span
                        class="font-bold text-xs block md:inline md:text-md">{{ t.departureTime }}</span> </small>
                <small class="block font-medium text-sm md:text-md">Arrives : <span class="font-bold text-xs block md:inline md:text-md">{{ t.arriveTime }}</span> </small>
            </div>
            <div class="hidden md:inline-block w-1/4 ">
                <div class="h-28 bg-white ">
                    <img src="../../public/img/operators/operator.png" alt="" class="w-full h-full">
                </div>
                <h6 class=" font-semibold py-2 text-lg text-center"> {{ t.operatorName }}</h6>
                <div class="flex justify-center">
                    <button class="px-4 py-1 border border-indigo-400 rounded hover:bg-blue-400">Operator</button>
                </div>
            </div>
            <div class="space-y-2 md:space-y-4 w-1/4 flex flex-col items-center justify-start">
                <div class="md:py-2">
                    <h4 class=" font-bold text-green-500 my-2 text-sm md:text-lg"><span class="text-gray-600 mr-2">Price :</span> {{ t.price }}</h4>
                    <h6 class="font-medium text-xs md:text-md ">1 seat * {{ t.price }}</h6>
                </div>
                <router-link :to="{ name: 'app.seats', params: {ticketCode : t.ticketCode} }">
                    <button class="px-2 py-2 bg-green-500 rounded hover:bg-green-400 text-white md:py-1"><span
                            class="hidden md:inline">Select</span> <span>Seats</span></button>
                </router-link>
        
            </div>
        </div>
       
       
        
    
</template>

<script setup>
import { onMounted, watch, watchEffect } from "@vue/runtime-core";
import axiosClient from "../axiosClient";
import { useRoute } from "vue-router";
import { computed } from "@vue/reactivity";
import { ref } from "vue";

const route = useRoute();

const tickets = ref([]);
const operator = ref(null);
const date = computed(() => {
    return route.params.d; 
})

//operator search
watchEffect(operator, () => {
   console.log('watch effect run', operator)
});


onMounted(() => {
    axiosClient.get(`/gb-tickets/?fromWhere[eq]=${route.params.f}&toWhere[eq]=${route.params.t}`).then((response) => {
        console.log(response.data.data);
        tickets.value = response.data.data;
    })
})

</script>