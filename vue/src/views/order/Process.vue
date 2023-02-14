<template>
    <div class="flex flex-col md:flex-row md:justify-between mt-20 mx-2 md:mx-5 gap-2">
            
            <div class=" w-full md:w-3/5 rounded-lg bg-white pb-4">
                <!-- seat section -->
                    <div class="text-center  ">
                        <h5 class="text-xl  font-semibold text-white bg-green-500 py-2 ">Please Select Seat</h5>
                       <div class="flex justify-center items-center py-2">
                        <h4 class=" w-1/2 text-gray-800  font-medium text-md md:text-lg ">
                            Seat Number -
                        </h4>
                        <input class="w-1/2 text-green-500 font-semibold uppercase text-lg ml-10" disabled v-model="selected" />
                       </div>
                        
                    </div>
                   
                <!-- seat position  -->
                <div class="flex justify-between pt-2 md:pt-4 gap-1">
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
               <BookingSummary :selectedTicket="selectedTicket"/> 
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
import { reactive } from '@vue/runtime-core';


const route = useRoute();

const tickets = ref([]);
const selected = ref('empty');

//selectedTicket for user showing
const selectedTicket = reactive({
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

    selectedTicket.ticketId = t.ticketId;
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
    axiosClient.get(`tickets?ticketCode[eq]=${route.params.ticketCode}`).then(({data}) => {
        //console.log(response.data.data);
        tickets.value = data.data;
    })
    console.log(selectedTicket);
})
</script>

   
<style lang="stylus" scoped>

</style>
