<template>
    
    <!-- operators start -->
    <section id="operators" class="my-16 md:px-8">
        <div class=" py-2 mb-8">
            <h4 class="text-lg text-black-500 font-semibold text-center hover:underline md:text-2xl">Operators</h4>
        </div>

        <div class="flex flex-wrap gap-2 ">
            <OperatorCard/>
        </div>
   
    <!-- This is an example component -->
   
        <!-- <div class="flex justify-center">
            <a href="#" class="px-6 py-1 rounded-lg text-white bg-green-500 hover:rounded-none">see more</a>
        </div> -->
    </section>
    
</template>
<script setup>
import OperatorCard from '../../components/OperatorCard.vue'
import { useRoute } from 'vue-router';
import { computed } from '@vue/runtime-core'



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