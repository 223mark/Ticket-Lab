<template>
    <!-- component -->
    <div class="p-6 mt-12  w-screen space-y-8">
        <a href="#" class="mt-4" >
            <h4 class="text-indigo-500 font-semibold text-lg">Back</h4>
        </a>
        <div class="flex  bg-white shadow-lg rounded-lg overflow-hidden">
           <div class="w-1/3">
            <img class=" bg-cover" :src="operator.img">
           
           </div>
            <div class="w-2/3 p-4 space-y-4">
                <h1 class="text-gray-900 font-bold text-2xl">{{ operator.operatorName}}</h1>
                <h5 class="text-gray-400 font-semibold text-xl">{{ operator.email}}</h5>
                <h6 class="text-gray-900 font-medium text-sm">{{ operator.phone1}}</h6>
                <h6 class="text-gray-900 font-medium text-sm">{{ operator.phone2}}</h6>
                <p class="mt-2 text-gray-600 text-sm">{{ operator.description }}</p>
                
                <!-- <div class="flex item-center justify-between mt-3">
                    <h1 class="text-gray-700 font-bold text-xl">$220</h1>
                    <button class="px-3 py-2 bg-gray-800 text-white text-xs font-bold uppercase rounded">Add to
                        Card</button>
                </div> -->
            </div>
        </div>
    </div>
</template>
<script setup>
import { onMounted } from "@vue/runtime-core";
import axiosClient from "../../axiosClient";
import { ref } from "vue";
import { useRoute } from "vue-router";

const operator = ref([]);

const route = useRoute()

onMounted(() => {
    const operatorId = route.params.operator;
    axiosClient.get(`operators/${operatorId}`).then((response) => {
        operator.value = response.data.data;
      
    })
})
</script>