<template>
    <!-- hero start -->
    <!-- <section id="operator-hero">

    </section> -->
    <!-- hero end -->
    <!-- operators start -->
    <!-- operators -->
    <section id="operators" class="mt-16 md:px-8">
        <div class=" py-2">
            <h4 class="text-lg text-black-500 font-semibold text-center hover:underline md:text-2xl">Operators</h4>
        </div>
        <div class="flex flex-wrap gap-2 " >
            <div class="w-1/4" v-for="operator in operators" :key="operator.id">
                <div class=" bg-white shadow-md border border-gray-200 rounded-lg max-w-sm dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="rounded-t-lg " :src="operator.img" alt="">
                    </a>
                    <div class="p-5">
                        <div class="space-y-2 ">
            
                            <h3 class=" text-gray-900 font-bold text-xl tracking-tight mb-2 dark:text-white">{{ operator.operatorName }}</h3>
                            <h6 class=" w-1/3 text-indigo-500">{{ operator.email }}</h6>
                            <div class="flex">
                                
                                <h6 class=" w-1/3 text-indigo-500">{{ operator.phone1 }}</h6>
                                <h6 class=" w-1/3 text-indigo-500">{{ operator.phone2 }}</h6>
                            </div>
                            <p class="font-normal text-gray-700 mb-3 dark:text-gray-400 py-4">{{ operator.description }}</p>
                        </div>
            
                        <router-link :to="{ name: 'app.operators.detail', params: {operator: operator.id}}"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Read more
                            <svg class="-mr-1 ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </router-link>
                    </div>
                </div>
            
            
            </div>
        </div>
    <!-- component -->
    <!-- This is an example component -->
   
        <!-- <div class="flex justify-center">
            <a href="#" class="px-6 py-1 rounded-lg text-white bg-green-500 hover:rounded-none">see more</a>
        </div> -->
    </section>
    <!-- operators end -->

    <!-- operators end -->
</template>
<script setup>
import { onMounted } from "@vue/runtime-core";
import axiosClient from "../../axiosClient";
import { ref } from "@vue/runtime-core";

const operators = ref([]);
onMounted(() => {
     axiosClient.get('/operators').then((response) => {
         operators.value = response.data.data;
        console.log(operators.value);
    }) 
})
</script>
<style scoped>
#operator-hero{
    height: 60vh;
    background-image: url('../../public/img/banner/Yangon.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: top 120% right 10%;
}
</style>