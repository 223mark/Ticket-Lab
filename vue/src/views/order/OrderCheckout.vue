<template>
    <div class="flex flex-col md:flex-row mt-20 m-4 md:mx-8 "> 
        <!-- customer info -->
        <div class="w-full md:w-2/3 px-4 py-6 mb-4 bg-white shadow-lg rounded">
            <div class="mb-2" @click="$router.back()">
                
                <span class="text-indigo-600 text-lg  font-semibold transition-color hover:text-indigo-500">Back</span>
                
            </div>
            <h2 class="text-xl font-semibold mb-4 ">Customer Information</h2>
            <!-- customer form -->
            <form @submit.prevent="addOrder">
                <div class="space-y-2 mb-4">
                    <label for="name" class="text-md text-green-500 font-medium ">Name</label>
                    <input type="text" v-model="formData.customerName" id="name"
                        class="w-full px-4 py-2 rounded focus:border-indigo-700 placeholder-gray-600 border-2 rounded border-gray-500 font-semibold"
                        placeholder="Please Enter Your Name">
                    <span class="text-red-500 font-medium mt-4 text-sm" v-for="error in v$.customerName.$errors" :key="error.$uid">{{ error.$message }}</span>
                </div>
                
                <div class="space-y-2 mb-4">
                    <label for="email" class="text-md text-green-500 font-medium ">Email</label>
                    <input type="email" v-model="formData.customerEmail" id="email"
                        class="w-full px-4 py-2 rounded focus:border-indigo-700 placeholder-gray-600 border-2 rounded border-gray-500 font-semibold"
                        placeholder="Please Enter Your Email">
                    <span class="text-red-500 font-medium mt-4 text-sm" v-for="error in v$.customerEmail.$errors" :key="error.$uid">
                    {{ error.$message }}
                    </span>
                </div>
                
                <div class=" space-y-4 mb-4">
                    <label for="name" class="text-md text-green-500 font-medium ">NRC Number</label>
                    <div class="flex flex-col space-y-2 md:space-y-0 md:flex-row md:gap-2">
                        <div class=" md:w-1/4">
                            <select id="" v-model="formData.nrcType" class="w-full px-4 py-2 border-2 rounded border-gray-500">
                                <option :value="n" v-for="(n,index) in nrc.nrcType" :key="index">{{ n }}</option>
                            </select>
                            <span class="text-red-500 font-medium mt-4 text-sm" v-for="error in v$.nrcType.$errors" :key="error.$uid">
                                {{ error.$message }}
                            </span>
                        </div>
                        <div class=" md:w-1/4">
                            <select name="payment" v-model="formData.nrcTownship" id="payment"
                                class="w-full px-4  py-2 border-2 rounded border-gray-500">
                                <option :value="n" v-for="(n,index) in nrc.nrcTownship" :key="index">{{ n }}</option>
                            </select>
                            <span class="text-red-500 font-medium mt-4 text-sm" v-for="error in v$.nrcTownship.$errors" :key="error.$uid">
                                {{ error.$message }}
                            </span>
                        </div>
                        <div class=" md:w-1/4">
                            <select name="nrcCtz" v-model="formData.nrcCtz" class=" px-4 py-2 w-full border-2 rounded border-gray-500">
                                <option value="(Naing)">Naing</option>
                                <option value="(Eait)">Eait</option>
                            </select>
                            <span class="text-red-500 font-medium mt-4 text-sm" v-for="error in v$.nrcCtz.$errors" :key="error.$uid">
                                {{ error.$message }}
                            </span>
                        </div>
                        <div class=" md:w-1/4">
                            <input type="number"  v-model="formData.nrcNo" id=""
                                class="px-4 py-2 w-full border-2 rounded border-gray-500" placeholder="******">
                                <span class="text-red-500 font-medium mt-4 text-sm" v-for="error in v$.nrcNo.$errors" :key="error.$uid">
                                    {{ error.$message }}
                                </span>
                        </div>
                    </div>
                
                </div>
                <div class="space-y-4">
                    <label for="payment" class="text-md text-green-500 font-medium ">Please Choose Payment</label>
                    <select name="payment" v-model="formData.paymentMethod" id="payment"
                        class="w-full px-4  py-2 border-2 rounded border-gray-500">
                        <option :value="p" v-for="(p,index) in payment" :key="index">{{ p }}</option>
                    </select>
                    <span class="text-red-500 font-medium mt-4 text-sm" v-for="error in v$.paymentMethod.$errors" :key="error.$uid">{{
                    error.$message }}</span>
                
                </div>
                <div class="mt-8">
                
                    <button class="px-8 py-1 text-white font-medium bg-green-500 w-full" type="submit">Order</button>
                
                </div>
            </form>
            <!-- customer form end -->
            
        </div>
        <!-- ticket detail -->
        <div class="w-full md:w-1/3 md:ml-4">
          
            <BookingSummary :selectedTicket="selectedTicket" :ticketDetail="true"/>
        </div>
    </div>
</template>
<script setup>
import BookingSummary from '../../components/BookingSummary.vue'

import moment from 'moment'
import { computed, ref } from 'vue';
import { onMounted } from '@vue/runtime-core';
import axiosClient from '../../axiosClient';
import { useRoute } from 'vue-router';
import { watchEffect } from '@vue/runtime-core';
import { reactive } from '@vue/runtime-core';
// import useVuelidate from '@vuelidate/core'
// import { required } from 'vuelidate/validators'
import useVuelidate from '@vuelidate/core'
import {required, email, maxLength, minLength} from '@vuelidate/validators'

const route = useRoute();
//start customer nrc section
const nrc = {
    nrcTownship: ['KhaPhaNa', 'KaTaNa', 'KaMaYwut'],
    nrcType: ['1/', '2/', '3/', '4/', '5/', '6/', '7/', '8/', '9/', '10/', '11/', '12/', '13/', '14/'],
}
const payment = ['Kpay', 'CBPay', 'WavePay', 'KBZ Banking', 'CB Banking'];

const nrcType = ref(null);
const nrcTownship = ref(null);
const nrcCtz = ref(null);
const nrcNo = ref(null);
//end customer nrc section

const selectedTicket = ref({});
const operatorId = ref(null);
//for validation
const formData = reactive({
     customerName : "",
     customerEmail : "",
     paymentMethod: "",
     nrcType : "",
     nrcTownship : "",
     nrcCtz : "",
     nrcNo : ""
})
//validation rule
const rules = {
    customerName: {required, minLength: minLength(6)},
    customerEmail: {required, email},
    paymentMethod: { required },
    nrcType: { required },
    nrcTownship: { required },
    nrcCtz: { required },
    nrcNo: { required, minLength: minLength(6) , maxLength: maxLength(6)}
}
//init vuelidate component
const v$ = useVuelidate(rules, formData);


const customerNrc = computed(() => {
    return `${formData.nrcType}${formData.nrcTownship}${formData.nrcCtz}${formData.nrcNo}`;
});
//adding order
const addOrder = async () => {
    const result = await v$.value.$validate();
    
    if (result) {
        const customerData = ref({
            name: formData.customerName,
            email: formData.customerEmail,
            paymentMethod: formData.paymentMethod,
            ticketId: route.params.ticketId,
            customerNrc: customerNrc.value,
            departureDate: moment(route.params.date).format('DD/MM/YYYY'),
            operatorId: operatorId.value,
        });

        axiosClient.post('/orders', customerData.value).then(({ data }) => {
            console.log(data, 'return')
        }).catch((error) => {
            console.log(error)
        });
        }
    //alert(result)
   
       
    //  })
    console.log(customerData.value)

    
   
}
async function getRelatedTicket() {
    await axiosClient.get(`/tickets/?ticketId[eq]=${route.params.ticketId}`).then(({ data }) => {
        selectedTicket.value = data.data[0];
        operatorId.value = data.data[0].operatorId;
        console.log(selectedTicket.value, 'sle');
    }).catch((error) => {
        console.log(error)
    })
}

onMounted(() => {
    getRelatedTicket();
})



</script>
