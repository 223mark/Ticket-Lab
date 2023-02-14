<template>
    <div class="flex flex-col md:flex-row mt-20 m-4 md:mx-8 "> 
        <!-- customer info -->
        <div class="w-full md:w-2/3 px-4 py-6 mb-4 bg-white shadow-lg rounded">
            <div class="mb-2">
                <a href="#">
                    <span class="text-indigo-600  font-semibold transition-color hover:text-indigo-500">Back{{ customerNrc }}</span>
                </a>
            </div>
            <h2 class="text-xl font-semibold mb-4 ">Customer Information</h2>
            <div class="space-y-2 mb-4">
                <label for="name" class="text-md text-green-500 font-medium ">Name</label>
                <input type="text" v-model="customerName"  id="name" class="w-full px-4 py-2 rounded focus:border-indigo-700 placeholder-gray-600 border-2 rounded border-gray-500 font-semibold" placeholder="Please Enter Your Name">
            </div>   
            <div class="space-y-2 mb-4">
                <label for="email" class="text-md text-green-500 font-medium ">Email</label>
                <input type="email" v-model="customerEmail" id="email"
                    class="w-full px-4 py-2 rounded focus:border-indigo-700 placeholder-gray-600 border-2 rounded border-gray-500 font-semibold"
                    placeholder="Please Enter Your Email">
            </div>
            <div class=" space-y-4 mb-4">
                <label for="name" class="text-md text-green-500 font-medium ">NRC Number</label>
                <div class="flex flex-col space-y-2 md:space-y-0 md:flex-row md:gap-2">
                    <div class=" md:w-1/4">
                        <select  id="" v-model="nrcType" class="w-full px-4 py-2 border-2 rounded border-gray-500">
                            <option :value="n" v-for="(n,index) in nrc.nrcType" :key="index" >{{ n }}</option>
                        </select>
                    </div>
                    <div class=" md:w-1/4">
                        <select name="payment" v-model="nrcTownship" id="payment" class="w-full px-4  py-2 border-2 rounded border-gray-500">
                            <option :value="n" v-for="(n,index) in nrc.nrcTownship" :key="index">{{ n }}</option>
                        </select>
                    </div>
                    <div class=" md:w-1/4">
                        <select name="nrcCtz" v-model="nrcCtz" class=" px-4 py-2 w-full border-2 rounded border-gray-500">
                            <option value="(Naing)">Naing</option>
                            <option value="(Eait)">Eait</option>
                        </select>
                    </div>
                    <div class=" md:w-1/4">
                        <input type="number" name="nrcNo" v-model="nrcNo" id="" class="px-4 py-2 w-full border-2 rounded border-gray-500" placeholder="******" minlength="8" maxlength="8">
                    </div>
                </div>
            
            </div>
            <div class="space-y-4">
                <label for="payment" class="text-md text-green-500 font-medium ">Please Choose Payment</label>
                <select name="payment" v-model="paymentMethod" id="payment" class="w-full px-4  py-2 border-2 rounded border-gray-500">
                    <option :value="p" v-for="(p,index) in payment" :key="index">{{ p }}</option>
                </select>
              
            </div>
            <div class="mt-8">
               
                    <button class="px-8 py-1 text-white font-medium bg-green-500 w-full" @click="addOrder" >Order</button>
                
            </div>
            
        </div>
        <!-- ticket detail -->
        <div class="w-full md:w-1/3 md:ml-4">
          
            <BookingSummary :selectedTicket="selectedTicket" :ticketDetail="true"/>
        </div>
    </div>
</template>
<script setup>
import BookingSummary from '../../components/BookingSummary.vue'
import { computed, ref } from 'vue';
import { onMounted } from '@vue/runtime-core';
import axiosClient from '../../axiosClient';
import { useRoute } from 'vue-router';
import { watchEffect } from '@vue/runtime-core';
import store from '../../store';

const route = useRoute();
const nrc = {
    nrcTownship: ['KhaPhaNa', 'KaTaNa', 'KaMaYwut'],
    nrcType: ['1/', '2/', '3/', '4/', '5/', '6/', '7/', '8/', '9/', '10/', '11/', '12/', '13/', '14/'],
}
const payment = ['Kpay', 'CBPay', 'WavePay', 'KBZ Banking', 'CB Banking'];

const nrcType = ref(null);
const nrcTownship = ref(null);
const nrcCtz = ref(null);
const nrcNo = ref(null);
const customerName = ref(null);
const customerEmail = ref(null);
const paymentMethod = ref(null);
const selectedTicket = ref({});

const customerNrc = computed(() => {
    return `${nrcType.value}${nrcTownship.value}${nrcCtz.value}${nrcNo.value}`;

});


const addOrder = () => {
    console.log(customerName.value, customerNrc.value, paymentMethod.value);
}
async function getRelatedTicket() {
    await axiosClient.get(`/tickets/?ticketId[eq]=${route.params.ticketId}`).then(({ data }) => {
        selectedTicket.value = data.data[0];
        console.log(selectedTicket.value, 'sle');
    }).catch((error) => {
        console.log(error)
    })
}

onMounted(() => {
    getRelatedTicket();
})



</script>
