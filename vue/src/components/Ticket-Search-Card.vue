<template>
<div class=" space-y-4 px-4 py-6 mx-auto bg-white  shadow-lg rounded-lg w-4/5  ">
    <div class="w-full space-y-4">
        
      <div class="space-y-4">
        <label for="from" class="text-green-500  font-medium">Please Choose From Location</label>
        <select v-model="fromWhere"   id="from" class="w-full px-4 py-2 focus:border-indigo-500 ">
            <option :value=" l.location " v-for="l in location" :key="l.id">{{ l.location }}</option>
            
        </select>
      </div>
        <div class="space-y-4">
            <label for="to" class="text-green-500  font-medium">Please Choose To Location</label>
            <select v-model="toWhere" id="to" class="w-full">
                <option :value=" l.location " v-for="l in location" :key="l.id">{{ l.location }}</option>
            </select>
        </div>
       
   
    <div class="w-full ">
        <input type="date" v-model="date"  class="border w-full px-4 py-2" >
    </div>
   
    <div class="w-full flex justify-center">
        <router-link :to="{ name: 'app.tickets', params: { f: fromWhere, t: toWhere, d: date }}">
        <button class="px-8 py-1 rounded shadow text-white  bg-green-500 hover:bg-green-400">Search{{ date }}</button>
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


const location = ref([]);
const fromWhere = ref('Yangon');
const toWhere = ref('Mandalay');

const todayDate = new Date();

const date = computed(() => {
  return   todayDate.value.getFullYear()
})

// const Date = ref({
//     minDate: new Date('2/8/2023'),


// })



onMounted(() => {
    axiosClient.get('/locations').then((response) => {
        location.value = response.data.data
        console.log(location)
    });

    
})



</script>



<style  scoped>

</style>
