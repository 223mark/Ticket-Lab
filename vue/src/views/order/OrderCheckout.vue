<template>
    <div class="flex flex-col md:flex-row mt-20 m-4 md:mx-8 "> 
        <div class="w-full md:w-2/3 px-4 py-6 mb-4 bg-white shadow-lg rounded">
            <div class="mb-2">
                <a href="#">
                    <span class="text-indigo-300 font-light hover:text-indigo-600 hover:font-semibold transition-color">Back</span>
                </a>
            </div>
            <h2 class="text-xl font-semibold mb-4 ">Customer Information</h2>
            <div class="space-y-2 mb-4">
                <label for="name" class="text-md text-green-500 font-medium ">Name</label>
                <input type="text"  id="name" class="w-full px-4 py-2 rounded focus:border-indigo-700 placeholder-gray-600 border-2 rounded border-gray-500 font-semibold" placeholder="Please Enter Your Name">
            </div>         
            <div class=" space-y-4 mb-4">
                <label for="name" class="text-md text-green-500 font-medium ">NRC Number</label>
                <div class="flex flex-col space-y-2 md:space-y-0 md:flex-row md:gap-2">
                    <div class=" md:w-1/4">
                        <select name="nrcTNo" id="" class="w-full px-4 py-2 border-2 rounded border-gray-500">
                            <option :value="n" v-for="(n,index) in nrc.nrcNo" :key="index" >{{ n }}</option>
                        </select>
                    </div>
                    <div class=" md:w-1/4">
                        <select name="payment" id="payment" class="w-full px-4  py-2 border-2 rounded border-gray-500">
                            <option :value="n" v-for="(n,index) in nrc.nrctype" :key="index">{{ n }}</option>
                        </select>
                    </div>
                    <div class=" md:w-1/4">
                        <select name="nrcCtz" class=" px-4 py-2 w-full border-2 rounded border-gray-500">
                            <option value="(Naing)">Naing</option>
                            <option value="(Eait)">Eait</option>
                        </select>
                    </div>
                    <div class=" md:w-1/4">
                        <input type="number" name="nrcNo" id="" class="px-4 py-2 w-full border-2 rounded border-gray-500" placeholder="******">
                    </div>
                </div>
            
            </div>
            <div class="space-y-4">
                <label for="payment" class="text-md text-green-500 font-medium ">Please Choose Payment</label>
                <select name="payment" id="payment" class="w-full px-4  py-2 border-2 rounded border-gray-500">
                    <option :value="p" v-for="(p,index) in payment" :key="index">{{ p }}</option>
                </select>
              
            </div>
            
        </div>
        <div class="w-full md:w-1/3 md:ml-4">
         <BookingSummary/>
        </div>
    </div>
</template>
<script setup>
import BookingSummary from '../../components/BookingSummary.vue'
const nrc = {
    nrctype: ['KhaPhaNa', 'KaTaNa', 'KaMaYwut'],
    nrcNo: ['1/', '2/', '3/', '4/', '5/', '6/', '7/', '8/', '9/', '10/', '11/', '12/', '13/', '14/']
    
}
const payment = ['Kpay','CBPay','WavePay','KBZ Banking','CB Banking'];
</script>
