<template>
    
       <div class="dark:bg-dark">
        <!-- ticket hero section -->
        <div id="ticket-section" class="mt-10 relative md:mb-3 ">
            <!-- ticket search section -->
            <div
                class="flex  flex-col md:flex-row justify-around  absolute bottom-0 border-t-2 border-x-2 border-green-500 bg-white  pb-4 pt-6 px-4 space-y-2 rounded-t-lg m-auto right-0 left-0  max-w-2xl md:space-y-0 md:space-x-2  dark:bg-dark  ">
        
                <div class="w-full md:w-1/3  ">
                    <label for="from" class="block mb-4 text-green-500  font-medium dark:text-darkTheme">From Location</label>
                    <select v-model="fromWhere" id="from" class="w-full rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100 ">
                        <option :value="l.location" v-for="l in location" :key="l.id">{{ l.location }}</option>
                    </select>
                </div>
        
        
                <div class="w-full md:w-1/3 ">
                    <label for="from" class="block mb-4 text-green-500  font-medium dark:text-darkTheme">To Location</label>
                    <select v-model="toWhere" id="to" class="w-full rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100 ">
                        <option :value="l.location" v-for="l in location" :key="l.id">{{ l.location }}</option>
                    </select>
                </div>
        
                <div class="w-full md:w-1/3 ">
                    <label for="date" class="block mb-4 text-green-500  font-medium dark:text-darkTheme"> Date</label>
                    <Datepicker v-model.date="selectedDate" type="date" position="center" id="date" :format="format"
                        :min-date="new Date()">
                    </Datepicker>
                    <span class="text-red-500 font-semibold mt-4 pl-2 leading-4 text-xs" v-if="selectedDate == null">Please
                        choose a date</span>
                </div>
        
            </div>
            <!-- ticket searcch end -->
        </div>
        <!-- ticket hero end -->
        
        <div class="flex flex-col  md:flex-row mx-0 md:mx-8 " id="operator-date">
            <!-- ticket filtering -->
            <div class=" mb-4 md:w-1/6">
                <!-- operator and date time section -->
                <div class=" w-full flex flex-col gap-2">
                    <!-- departure time -->
                    <div class="border border-gray-500 bg-white mx-4 md:mx-2 dark:bg-gray-200">
                        <div class="pt-4 pb-2 w-full border-b border-gray-700 ">
                            <h1 class="text-lg font-semibold text-gray-500 text-center dark:text-darkIndigo">Departure Time</h1>
                        </div>
                        <div class=" p-4 flex flex-col ">
                            <div class="border-b-2 border-dashed border-gray-700 ">
                                <input class="mr-2" type="checkbox" v-model="allCheck" value="" id="all">
                                <label class="font-medium text-gray-800 text-md dark:text-darkIndigo" for="all">
                                    For ALL
                                </label>
                            </div>
                            <div class="mt-2" v-for="(time,index) in ticketTime" :key="index">
                                <input class="mr-2" v-model="departureTime" type="radio" :value="time" :id="time">
                                <label class="font-medium text-gray-800 text-md dark:text-darkIndigo" :for="time">
                                    {{ time }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- departure time end -->
                    <!-- operators -->
                    <div class="border border-gray-500 bg-white mx-4 md:mx-2 dark:bg-gray-200">
                        <div class="pt-4 pb-2 w-full border-b border-gray-700 ">
                            <h1 class="text-lg font-semibold text-gray-500 text-center dark:text-darkIndigo">Operators</h1>
                        </div>
        
                        <div class=" p-4 flex flex-col ">
                            <div class="" v-for="op in operator" :key="op.id">
                                <input class="mr-2" v-model="operatorId" type="radio" :value="op.id" :id=" op.operatorName">
                                <label class="font-medium text-gray-800 text-md dark:text-darkIndigo" :for="op.operatorName">
                                    {{ op.operatorName }}
                                </label>
        
                            </div>
        
        
                        </div>
                    </div>
                    <!-- operators end -->
                    <!-- ticket class -->
                    <div class="border border-gray-500 bg-white mx-4 md:mx-2 dark:bg-gray-200">
                        <div class="pt-4 pb-2 w-full border-b border-gray-700 ">
                            <h1 class="text-lg font-semibold text-gray-500 text-center dark:text-darkIndigo">Ticket Class</h1>
                        </div>
                        <div class=" p-4 flex flex-col ">
                            <div class="mt-2" v-for="(tClass,index) in ticketClassArr" :key="index">
                                <input class="mr-2" v-model="ticketClass" type="radio" :value="tClass" :id="tClass">
                                <label class="font-medium text-gray-800 text-md dark:text-darkIndigo" :for="tClass">
                                    {{ tClass }}
                                </label>
                            </div>
        
        
                        </div>
                    </div>
                    <!-- ticket class end -->
                </div>
        
            </div>
            <!-- tickets -->
            <div class="w-full   flex flex-wrap gap-2 md:w-5/6 ">
                <Ticket :tickets="tickets" :selectedDate="selectedDate"></Ticket>
            </div>
        </div>
       </div>
        
   
    
</template>

<script setup>

//component imports
import NoDataCard from '../../components/NoDataCard.vue'
import Ticket from '../../components/Ticket.vue'
import TicketSearch from '../../components/Ticket-Search-Card.vue'
// vue eco
import { useRoute } from 'vue-router';
import {ref} from 'vue'
import { onMounted } from '@vue/runtime-core';
import store from '../../store'
import axiosClient from '../../axiosClient';
//date component

import Datepicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'
//import { format } from 'date-fns';
import { watchEffect } from '@vue/runtime-core';
import { watch } from 'vue';

const date = ref(new Date());
const format = (date) => {
    const day = date.getDate();
    const month = date.getMonth();
    const year = date.getFullYear();

    return `${day}/${month}/${year}`


}

const route = useRoute();
const location = ref(null);
const operator = ref(null);
const operatorId = ref(null);
const departureTime = ref(null);
const ticketClass = ref(null);
const allCheck = ref(true)
const selectedDate = ref(route.params.d);

const fromWhere = ref(route.params.f);
const toWhere = ref(route.params.t);
const ticketTime = ['3:00 PM', '9:00 PM']
const ticketClassArr = ['Normal', 'VIP', 'VVIP']

//tickets 
const tickets = ref({});

//all tickets
watch(allCheck, () => {
    operatorId.value = null;
    departureTime.value = null;
    ticketClass.value = null;
    axiosClient.get(`/gb-tickets/?fromWhere[eq]=${fromWhere.value}&toWhere[eq]=${toWhere.value}&operatorId[eq]=${''}`).then(({ data }) => {
        tickets.value = data.data;
        console.log(tickets.value
        );
    });
})
//tickets searching with time
watch(departureTime, () => {
    allCheck.value = false;
    axiosClient.get(`/gb-tickets/?fromWhere[eq]=${fromWhere.value}&toWhere[eq]=${toWhere.value}&departureTime[eq]=${departureTime.value}`).then(({ data }) => {
        tickets.value = data.data;
        console.log(tickets.value
        );
    });
})
//tickets searching with ticket class
watch(ticketClass, () => {
    allCheck.value = false;
    axiosClient.get(`/gb-tickets/?fromWhere[eq]=${fromWhere.value}&toWhere[eq]=${toWhere.value}&ticketClass[eq]=${ticketClass.value.toLowerCase()}`).then(({ data }) => {
        tickets.value = data.data;
      
    });
})
//tickets searching with operator
watch(operatorId, () => {
    allCheck.value = false;
    axiosClient.get(`/gb-tickets/?fromWhere[eq]=${fromWhere.value}&toWhere[eq]=${toWhere.value}&operatorId[eq]=${operatorId.value}`).then(({ data }) => {
        tickets.value = data.data;
       
    }, operatorId.value);
})
//tickets searching
watchEffect(() => {

        axiosClient.get(`/gb-tickets/?fromWhere[eq]=${fromWhere.value}&toWhere[eq]=${toWhere.value}`).then(({ data }) => {

            tickets.value = data.data;
         console.log(tickets.value)
        }, fromWhere.value, toWhere.value);
       
        // console.log('watcheffect run', tickets.value)
})

onMounted(() => {
   
    //locations
    axiosClient.get('/locations').then(({data}) => {
        location.value = data.data;
        //console.log(location.value);
    })
    //operators
    axiosClient.get('/operators').then(({ data }) => {
        operator.value = data.data
        
    })
   
   
})
</script>

<style scoped>
#ticket-section {
    height: 50vh;
    background-image: url('../../../public/img/banner/innlaybanner.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: top 45% right 0;
    
}
</style>