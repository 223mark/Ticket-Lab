<template>
    <!-- component -->
    <div class="p-6 mt-16  w-screen space-y-8 bg-slate-100">
       
        <button  @click="router.back()"
        class="px-8  bg-indigo-500 text-white rounded font-semibold text-lg"
        >Back</button>
        
        <div class="flex  bg-white shadow-xl rounded-lg overflow-hidden mt-5">
           <div class="w-1/3 h-48">
            <img v-if="operator.img== 'http://localhost:8000/img/OperatorImage/null'" src="../../../public/img/brand/codelab.png" alt="" class="w-full h-full">
            <img class="h-full" v-else :src="operator.img">
           
           </div>
            <div class="w-2/3 p-4 space-y-4">
                <h1 class="text-gray-900 font-bold text-2xl">{{ operator.operatorName}}</h1>
                <h5 class="text-gray-400 font-semibold text-xl">{{ operator.email}}</h5>
                <h6 class="text-gray-900 font-medium text-sm">{{ operator.phone1}}</h6>
                <h6 class="text-gray-900 font-medium text-sm">{{ operator.phone2}}</h6>
                <p class="mt-2 text-gray-600 text-sm">{{ operator.description }}</p>
                
              
            </div>
        </div>
    </div>
</template>
<script setup>
import { onMounted } from "@vue/runtime-core";
import axiosClient from "../../axiosClient";
import { ref } from "vue";
import { useRoute } from "vue-router";
import { useRouter } from "vue-router";
const operator = ref([]);
const router = useRouter();
const route = useRoute();

onMounted(() => {
    const operatorId = route.params.operator;
    axiosClient.get(`operators/${operatorId}`).then((response) => {
        
        response.data.data.img = "http://localhost:8000/img/OperatorImage/" + response.data.data.img;

        operator.value = response.data.data;
        console.log(operator.value);
      
    })
})
</script>