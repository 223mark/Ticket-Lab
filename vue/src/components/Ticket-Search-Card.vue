<template>
<div class=" space-y-4 px-4 py-6 mx-auto bg-white  shadow-lg rounded-lg w-4/5  ">
    <div class="w-full space-y-4">
        <!-- <ul v-for="l in fromWhere" :key="l.id">
            <li>{{ l.location }}</li>
           
        </ul>  -->
      <div class="space-y-4">
        <label for="from" class="text-green-500  font-medium">From Where</label>
        <select v-model="fromWhere"   id="from" class="w-full px-4 py-2 focus:border-indigo-500 ">
            <option value="">Please choose Location</option>
            <option :value=" l.location " v-for="l in location" :key="l.id">{{ l.location }}</option>
            
        </select>
      </div>
        <div class="space-y-4">
            <label for="to" class="text-green-500  font-medium">To Where</label>
            <select v-model="toWhere" id="to" class="w-full">
                <option value="">Please choose Location</option>
                <option :value=" l.location " v-for="l in location" :key="l.id">{{ l.location }}</option>
            </select>
        </div>
        <!-- <Listbox as="div" v-model="selected">
            <ListboxLabel class="block text-md font-medium text-gray-700 pb-1">From Where</ListboxLabel>
            <div class="relative mt-1">
                <ListboxButton
                    class="relative w-full cursor-default rounded-md border border-gray-300 bg-white py-2 pl-3 pr-10 text-left shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm">
                    <span class="flex items-center">
                        <span class="ml-3 block truncate">{{ selected.l }}</span>
                    </span>
                    <span class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2">
                        <ChevronUpDownIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                    </span>
                </ListboxButton>

                <transition leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100"
                    leave-to-class="opacity-0">
                    <ListboxOptions
                        class="absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
                        <input type="text"
                            class="w-full py-2 px-4 border-b-2 placeholder-indigo-600 focus:outline-none focus:border-indigo-500"
                            placeholder="Search Location">
                        <ListboxOption as="template" v-for="l in fromWhere" :key="l.id" 
                            v-slot="{ active, selected }">
                            <li
                                :class="[active ? 'text-white bg-green-600' : 'text-gray-900', 'relative cursor-default select-none py-2 pl-3 pr-9']">
                                <div class="flex items-center">
                                    <img :src="person.avatar" alt="" class="h-6 w-6 flex-shrink-0 rounded-full" />
                                    <span
                                        :class="[selected ? 'font-semibold' : 'font-normal', 'ml-3 block truncate']">{{ l.location }}
                                    </span>
                                </div>

                                <span v-if="selected"
                                    :class="[active ? 'text-white' : 'text-green-600', 'absolute inset-y-0 right-0 flex items-center pr-4']">
                                    <CheckIcon class="h-5 w-5" aria-hidden="true" />
                                </span>
                            </li>
                        </ListboxOption>
                    </ListboxOptions>
                </transition>
            </div>
        </Listbox>  -->
    </div>
    <div class="w-full ">
        <input type="date" v-model="date"  class="border w-full px-4 py-2">
    </div>
    <div class="w-full flex justify-center">
        <button class="px-8 py-1 rounded shadow text-white  bg-green-500 hover:bg-green-400" @click="searchTicket">Search</button>
    </div>
    <div class="w-full space-y-4 ">
       
        <!-- <Listbox as="div" v-model="selected">
            <ListboxLabel class="block text-md font-medium text-gray-700 pb-1">To Where</ListboxLabel>
            <div class="relative mt-1">
                <ListboxButton
                    class="relative w-full cursor-default rounded-md border border-gray-300 bg-white py-2 pl-3 pr-10 text-left shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm">
                    <span class="flex items-center">
                        <img :src="selected.avatar" alt="" class="h-6 w-6 flex-shrink-0 rounded-full" />
                        <span class="ml-3 block truncate">{{ selected.name }}</span>
                    </span>
                    <span class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2">
                        <ChevronUpDownIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                    </span>
                </ListboxButton>

                <transition leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100"
                    leave-to-class="opacity-0">
                    <ListboxOptions
                        class="absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
                        <input type="text"
                            class="w-full py-2 px-4 border-b-2 shadow-lg placeholder-indigo-600 focus:outline-none focus:border-indigo-500"
                            placeholder="Search Location">
                        <ListboxOption as="template" v-for="person in people" :key="person.id" :value="person"
                            v-slot="{ active, selected }">
                            <li
                                :class="[active ? 'text-white bg-green-600' : 'text-gray-900', 'relative cursor-default select-none py-2 pl-3 pr-9']">
                                <div class="flex items-center">
                                    <img :src="person.avatar" alt="" class="h-6 w-6 flex-shrink-0 rounded-full" />
                                    <span
                                        :class="[selected ? 'font-semibold' : 'font-normal', 'ml-3 block truncate']">{{
                                            person.name
                                        }}</span>
                                </div>

                                <span v-if="selected"
                                    :class="[active ? 'text-white' : 'text-green-600', 'absolute inset-y-0 right-0 flex items-center pr-4']">
                                    <CheckIcon class="h-5 w-5" aria-hidden="true" />
                                </span>
                            </li>
                        </ListboxOption>
                    </ListboxOptions>
                </transition>
            </div>
        </Listbox> -->
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
const location = ref([]);
const date = ref(null);
const fromWhere = ref(null);
const toWhere = ref(null);

// const computedLocation = computed(() => {

//     return
// })
// const Date = ref({
//     minDate: new Date('2/8/2023'),


// })

const searchTicket = () => {
    axiosClient.get(`gb-tickets/?fromWhere[eq]=${fromWhere.value}&toWhere[eq]=${toWhere.value}`).then((response) => {
        console.log(response.data.data);
    })
}

onMounted(() => {
    axiosClient.get('/locations').then((response) => {
        location.value = response.data.data
        console.log(location)
    });
})



</script>



<style  scoped>

</style>
