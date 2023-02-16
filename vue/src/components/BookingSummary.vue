<template>
    <div class="border rounded-lg shadow-lg bg-white pb-6">
       
        <div class="border py-4 text-center">
            <h6 class="text-xl text-green-400 font-bold " v-if="ticketDetail">Ticket Detail</h6>
            <h6 class="text-xl text-green-400 font-bold " v-else>Booking Summary</h6>
        </div>
        <div class="flex flex-col px-4 py-2 space-y-4 ">
            <div class="flex">
                <div class="w-1/2  ">
                    <p class="text-md ">Seat Number</p>
                </div>
                <div class="w-1/2 ">
                    <p class=" font-bold text-md text-green-500">{{ selectedTicket.seatNumber }}</p>
                </div>
            </div>
            <div class="flex">
                <div class="w-1/2  ">
                    <p class="text-md ">Bus Operator</p>
                </div>
                <div class="w-1/2 ">
                    <p class=" fw-semibold">{{ selectedTicket.operatorName }}</p>
                </div>
            </div>
            <div class="flex">
                <div class="w-1/2  ">
                    <p class=" fw-light">Route</p>
                </div>
                <div class="w-1/2 ">
                    <p class=" fw-semibold">{{ selectedTicket.fromWhere }} - {{ selectedTicket.toWhere }} </p>
                </div>
            </div>
            <div class="flex">
                <div class="w-1/2  ">
                    <p class=" fw-light">Date</p>
                </div>
                <div class="w-1/2 ">
                    <p class=" fw-semibold">{{ route.params.date }}</p>
                </div>
            </div>
            <div class="flex">
                <div class="w-1/2  ">
                    <p class=" fw-light">Departure Time</p>
                </div>
                <div class="w-1/2 ">
                    <p class=" fw-semibold">{{ selectedTicket.departureTime }}</p>
                </div>
            </div>
            <div class="flex">
                <div class="w-1/2  ">
                    <p class=" fw-light">Arrive Time</p>
                </div>
                <div class="w-1/2 ">
                    <p class=" fw-semibold">{{ selectedTicket.arriveTime }}</p>
                </div>
            </div>
            <div class="flex">
                <div class="w-1/2  ">
                    <p class=" font-semibold">Ticket Total</p>
                </div>
                <div class="">
                    <p class="font-bold text-green-500">* 1</p>
                </div>
            </div>
            <div class="flex">
                <div class="w-1/2  ">
                    <p class=" font-semibold">Subtotal</p>
                </div>
                <div class="">
                    <p class="font-bold text-green-500">{{ selectedTicket.price }}</p>
                </div>
            </div>
    
        </div>
        <div class="mt-5 flex justify-center items-center"  v-if="selectedTicket.ticketId != null">

            <router-link :to="{ name: 'app.checkout', params: { ticketId: selectedTicket.ticketId, date: route.params.date } }" v-if="!ticketDetail" >
                <button class="bg-green-500 text-white px-8 py-2 rounded-lg hover:bg-green-400 ">Procced to
                    Checkout</button>
            </router-link>
    
        </div>
    
    </div>
    

</template>
<script setup>
import { onMounted } from '@vue/runtime-core';
import store from '../store';
import { useRoute } from 'vue-router';

const route = useRoute();


const { selectedTicket, ticketDetail } = defineProps({
    selectedTicket: Object,
    ticketDetail: Boolean
});

onMounted(() => {
    console.log(ticketDetail, 'de'),
        console.log(selectedTicket.ticketId,'se')
})




</script>