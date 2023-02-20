<template >
        <NoDataCard v-if="tickets.length == 0" class="w-full"></NoDataCard>
        <div  v-else
        class="flex  mx-2 items-center p-2  border border-gray-700 md:p-4 bg-gray-300 rounded mb-2 w-full md:justify-between " style="min-height:200px;max-height: 250px;"
        v-for="t in tickets" :key="t.id"
        >
          <!-- ticket deatil section -->
            <div class="space-y-1 md:space-y-4 w-2/4">
                <div class="">
                    <h5 class="font-bold text-md md:text-2xl text-blue-600 ">{{ t.departureTime }} Standard </h5>
                    <h5 class="font-semibold text-sm  text-indigo-600 md:hidden">{{ t.operatorName }}</h5>
                </div>
                <p class="py-1 font-light uppercase text-sm md:text-lg">{{ t.fromWhere }} - {{ t.toWhere }} </p> 
                <small class="block font-medium text-sm md:text-md ">Date : <span class="font-bold text-xs block md:inline md:text-md">{{ selectedDate }}</span></small>
                <small class="block font-medium text-sm md:text-md"> Ticket  : <span
                        class="font-bold text-orange-500 uppercase text-xs block md:inline md:text-md">{{ t.class }}</span> </small>
                <small class="block font-medium text-sm md:text-md">Arrives : <span class="font-bold text-xs block md:inline md:text-md">{{ t.arriveTime }}</span> </small>
            </div>
            <!-- ticket detail section end -->
            <!-- middle section -->
            <div class="hidden md:inline-block w-1/4 ">
                <div class="h-28 bg-white ">
                     <img class="rounded-t-lg w-full h-full " v-if="t.operatorImg == 'http://localhost:8000/img/OperatorImage/'"  src="../../public/img/brand/codelab.png" alt=""> 
                       
                     <img class="rounded-t-lg w-full h-full " v-else  :src="t.operatorImg" alt=""> 
                </div>
                <h6 class=" font-semibold py-2 text-lg text-center"> {{ t.operatorName }}</h6>
                <div class="flex justify-center">
                    <router-link :to="{ name: 'app.operators.detail', params: { operator: t.operatorId }}">
                        <button class="px-4 py-1 border border-indigo-400 rounded hover:bg-blue-400">Operator</button>
                    </router-link>
                </div>
            </div>
            <!-- middle section end -->
            <!-- seat section  -->
            <div class="space-y-2 ml-2 md:space-y-4 md:w-1/4 flex flex-col items-center justify-start">
                <div class="md:py-2">
                    <h4 class=" font-bold text-green-500 my-2 text-sm md:text-lg"><span class="text-gray-600 mr-2">Price :</span> {{ t.price }}</h4>
                    <h6 class="font-medium text-xs md:text-md ">1 seat * {{ t.price }}</h6>
                </div>
                <router-link v-if="selectedDate" :to="{ name: 'app.seats', params: {ticketCode : t.ticketCode, date: selectedDate} }">
                    <button  class="px-2 py-2 bg-green-500 rounded hover:bg-green-400 text-white  md:py-1"><span
                            class="hidden md:inline">Select</span> <span>Seats</span></button>
                </router-link>
        
            </div>
            <!-- seat section end -->
        </div>
</template>

<script setup>
//component imports
import NoDataCard from '../components/NoDataCard.vue'

import store from '../store';
const { tickets, selectedDate } = defineProps({
    tickets: Object,
    selectedDate: Date
})


</script>