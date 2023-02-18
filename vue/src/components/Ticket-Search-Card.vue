<template>
<div class="flex flex-col  space-y-4 px-4 py-2 mx-auto bg-white  shadow-lg rounded-lg w-4/5  ">
    <div class="w-full space-y-2">
        
      <div class="space-y-4">
        <label for="from" class="text-green-500  font-medium">Please Choose From Location</label>
        <select v-model="fromWhere"   id="from" class="w-full rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100 ">
            <option :value=" l.location " v-for="l in location" :key="l.id">{{ l.location }}</option>
            
        </select>
      </div>
     <div class="space-y-4">
            <label for="to" class="text-green-500  font-medium mb-4">Please Choose To Location</label>
            <select v-model="toWhere" id="to" class="w-full rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100">
                <option :value=" l.location " v-for="l in location" :key="l.id">{{ l.location }}</option>
            </select>
        </div>
       
   
        <div class="w-full space-y-4 ">
            <label for="date" class="text-green-500  font-medium ">Please Pick Date</label>
            <Datepicker v-model="selectedDate" position="center" id="date" :format="format" :min-date="new Date()" ></Datepicker>
            
        </div>
    
        <div class="w-full flex justify-center mt-2">
            <router-link :to="{ name: 'app.tickets', params: { f: fromWhere, t: toWhere, d: selectedDate }}">
            <button @click="searchTicket()" class="px-8 py-1 rounded shadow text-white  bg-green-500 hover:bg-green-400">Search</button>
        </router-link>
        
        </div>
    </div>
    
   
</div>
</template>
<script setup>
import { computed, reactive } from '@vue/runtime-core';
import { ref } from 'vue';
 import { Listbox, ListboxButton, ListboxLabel, ListboxOption, ListboxOptions } from '@headlessui/vue'
 import { CheckIcon, ChevronUpDownIcon } from '@heroicons/vue/20/solid'
import { onMounted } from '@vue/runtime-core'
import axiosClient from '../axiosClient';
import router from '../router';


import Datepicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'
//import { format } from 'date-fns';

const date = ref(new Date());
const format = (date) => {
   const day = date.getDate();
    const month = date.getMonth();
    const year = date.getFullYear();

    return `${day}/${month}/${year}`
    

}
const selectedDate = ref(new Date());



const location = ref([]);
const fromWhere = ref('Yangon');
const toWhere = ref('Mandalay');



onMounted(() => {
    axiosClient.get('/locations').then((response) => {
        location.value = response.data.data
      
    });

    
})



</script>



<style  scoped>

</style>
