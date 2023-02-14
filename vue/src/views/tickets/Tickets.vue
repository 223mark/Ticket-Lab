<template>
    
        <!-- trip section -->
        <div  id="trip-section" class="mt-10 relative ">
            <div class="flex justify-around  absolute bottom-0 border-t-2 border-x-2 border-green-500 bg-white  pb-4 pt-6 rounded-t-lg m-auto right-0 left-0  w-4/6    ">
                <div class="">
                   <div class="w-full  bg-white">
                    <label for="from" class="block mb-4 text-green-500  font-medium">Please Choose <span class="font-semibold">From</span> Location</label>
                    <select v-model="fromWhere" id="from" class="w-full px-4">
                        <option :value="l.location" v-for="l in location" :key="l.id">{{ l.location }}</option>
                    </select>
                   </div>
                </div>
                <div class="">
                    <div class="w-full bg-white">
                        <label for="from" class="block mb-4 text-green-500  font-medium">Please Choose <span class="font-semibold">To</span> Location</label>
                        <select v-model="toWhere" id="to" class="w-full px-4">
                        <option :value="l.location" v-for="l in location" :key="l.id">{{ l.location }}</option>
                        </select>
                    </div>
                </div>
                <div class="">
                   <div class="w-full bg-white">
                    <label for="date" class="block mb-4 text-green-500  font-medium"> Please Pick Date</label>
                    <Datepicker v-model="selectedDate" position="center" id="date" :format="format" :min-date="new Date()" >
                    </Datepicker>
                    {{ selectedDate }}
                   </div>
                </div>
            </div>
        </div>
        
        <section class="flex flex-col  md:flex-row mx-0 md:mx-8" id="operator-date">

            <div class=" mb-4 w-1/6">
                <!-- operator and date time section -->
            
                <div class=" w-full">
                    <div class="border bg-white mx-4 md:mx-2 ">
                        <div class="pt-4 pb-2 w-full border-b border-gray-700 ">
                            <h1 class="text-xl font-semibold text-gray-500 text-center">Departure Time</h1>
                        </div>
                        <div class=" p-4 flex flex-col ">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Any Time
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Day Bus
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Night Bus
                                </label>
                            </div>
            
                        </div>
                    </div>
                </div>
            
            </div>
            <div class="w-5/6 ">
                <Ticket class="mx-4" :tickets="tickets" :selectedDate="selectedDate" ></Ticket>
               
            </div>
        </section>
        <!-- operator and date time section end-->
        <section>
            
        </section>
   
    
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

const date = ref(new Date());
const format = (date) => {
    const day = date.getDate();
    const month = date.getMonth();
    const year = date.getFullYear();

    return `${day}/${month}/${year}`


}

const route = useRoute();
const location = ref(null);
const selectedDate = ref(route.params.d);
const fromWhere = ref(route.params.f);
const toWhere = ref(route.params.t);
//tickets 
const tickets = ref({});




//tickets searching
watchEffect( () => {
    axiosClient.get(`/gb-tickets/?fromWhere[eq]=${fromWhere.value}&toWhere[eq]=${toWhere.value}`).then(({ data }) => {

        tickets.value = data.data;
        console.log(tickets.value
        );

    }, fromWhere.value , toWhere.value);
    //console.log('watchEffect run',)
})
onMounted(() => {
   
    //locations
    axiosClient.get('/locations').then(({data}) => {
        location.value = data.data;
        //console.log(location.value);
    })
   
})
</script>

<style scoped>
#trip-section {
    height: 50vh;
    background-image: url('../../../public/img/banner/innlaybanner.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: top 45% right 0;
    
}
</style>