<template>
     
        <div class=" mx-2 md:w-1/4" v-for="operator in operators" :key="operator.id">
            <div
                class="  shadow-md border border-gray-200 rounded-lg max-w-sm bg-gray-800">
                <div class="bg-white">
                    
                    <img class="rounded-t-lg w-full h-32 " v-if="operator.img== 'http://localhost:8000/img/OperatorImage/null'"  src="../../public/img/brand/codelab.png" alt="">
                   
                    <img class="rounded-t-lg w-full h-32 " v-else :src="operator.img" alt=""> 

                </div>
                <div class="p-5">
                    <div class="space-y-2 ">
    
                        <h3 class=" text-gray-900 font-bold text-xl tracking-tight mb-2 dark:text-white">{{
                            operator.operatorName
                        }}</h3>
                        <h6 class=" w-1/3 text-indigo-500">{{ operator.email }}</h6>
                        <div class="flex">
    
                            <h6 class=" w-1/3 text-indigo-500">{{ operator.phone1 }}</h6>
                            <h6 class=" w-1/3 text-indigo-500">{{ operator.phone2 }}</h6>
                        </div>
                        
                    </div>
    
                    <router-link :to="{ name: 'app.operators.detail', params: { operator: operator.id } }"
                        class="">
                        <button class="text-white mt-4 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm  px-3 py-2 text-center  items-center   w-full">More Info</button>
                       
                        <!-- <svg class="-mr-1 ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg> -->
                    </router-link>
                </div>
            </div>
    
    
        </div>
   
</template>

<script setup>
import { onMounted } from "@vue/runtime-core";
import axiosClient from "../axiosClient";
import { ref } from "@vue/runtime-core";

const operators = ref([]);
onMounted(() => {
    axiosClient.get('/operators').then((response) => {
         for (let i = 0; i < response.data.data.length; i++) {
           
             response.data.data[i].img = "http://localhost:8000/img/OperatorImage/" + response.data.data[i].img;
         }
     
         operators.value = response.data.data;
       console.log(operators.value);
    }) 
})
</script>