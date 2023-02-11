<template>
    <div class="flex flex-col md:flex-row md:justify-between mt-20 mx-2 md:mx-5 gap-2">
            
            <div class=" w-full md:w-3/5 rounded-lg bg-white pb-4">
                <!-- seat section -->
                    <div class="text-center  ">
                        <h5 class="text-xl  font-semibold text-white bg-green-500 py-2 ">Please Select Seat</h5>
                        <h4 class="text-gray-800 font-medium text-md md:text-lg  md:hidden">
                            Seat Number - <input class="text-green-500 font-semibold uppercase text-lg ml-10" disabled v-model="selected"/>
                        </h4>
                        
                    </div>
                   
                <!-- seat position  -->
                <div class="flex justify-between pt-5 md:pt-10 gap-1">
                    <div 
                     class="flex justify-between  gap-2 flex-wrap ml-2 w-full mx-2 ">
                            <div class="flex justify-center items-center bg-gray-400 w-full md:w-1/5 h-12 cursor-pointer" v-for="t in tickets" :key="t.id" @click="chooseSeat(t)">
                                <span v-if="t.status"><i class="fa-solid fa-lock text-light font-bold block"></i></span>
                                <span v-else class="text-gray-800 font-semibold text-lg tracking-wide">{{ t.seatNumber }}</span>
                            </div>
                            
                    </div>
                   
                </div>
                <!-- seat position end -->
            </div>
          
        <!-- booking summary  -->
            <div class="w-full md:w-2/5">
                <div class="border rounded-lg shadow-lg bg-white pb-6">
                    <div class="border py-4 text-center">
                        <h6 class="text-xl text-green-400 font-bold ">Booking Summary</h6>
                    </div>
                    <div class="flex flex-col px-4 py-2 space-y-4 ">
                        <div class=" hidden md:flex">
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
                                <p class=" fw-semibold">12/5/2023 </p>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="w-1/2  ">
                                <p class=" fw-light">Departure Time</p>
                            </div>
                            <div class="w-1/2 ">
                                <p class=" fw-semibold" >{{ selectedTicket.departureTime }}</p>
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
                    <div class="mt-5 flex justify-center items-center">
                   
                       <router-link   :to="{ name: 'app.checkout', params: { ticketId: selectedTicket.ticketId } }">
                        <button class="bg-green-500 text-white px-8 py-2 rounded-lg hover:bg-green-400 ">Procced to Checkout</button>
                       </router-link>
                       
                    </div>
                
                </div>
            </div>
        <!-- booking summary end -->
    </div>
</template>

<script setup>
import BookingSummary from '../../components/BookingSummary.vue'
import { onMounted } from "@vue/runtime-core";
import axiosClient from "../../axiosClient";
import { ref } from '@vue/runtime-core';
import { useRoute } from 'vue-router';


const route = useRoute();

const tickets = ref([]);
const selected = ref('empty');
const selectedTicket = ({
    ticketId: 'null',
    operatorName: null,
    fromWhere: null,
    toWhere: null,
    seatNumber: null,
    date: null,
    departureTime: null,
    arriveTime: null,
    price: null
});


const chooseSeat= (t) => {
    selected.value = t.seatNumber;

    //setting selected ticket 

    selectedTicket.ticketId = t.id;
    selectedTicket.operatorName = t.operatorName;
    selectedTicket.fromWhere = t.fromWhere;
    selectedTicket.toWhere = t.toWhere;
    selectedTicket.seatNumber = t.seatNumber
    selectedTicket.date = t.date
    selectedTicket.departureTime = t.departureTime
    selectedTicket.arriveTime = t.arriveTime
    selectedTicket.price = t.price

    
}



onMounted(() => {
    axiosClient.get(`tickets?ticketCode[eq]=${route.params.ticketCode}`).then((response) => {
        console.log(response.data.data);
        tickets.value = response.data.data;
    })
})
</script>

   
<style lang="stylus" scoped>

</style>
