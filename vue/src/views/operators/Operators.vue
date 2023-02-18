<template>
    
    <!-- operators start -->
    <!-- <LoadingCard /> -->
    <section id="operators" class="py-20 md:px-8 min-h-screen dark:bg-dark">
        <div class=" py-2 mb-8 ">
            <h4 class=" text-green-500 font-semibold  text-center underline text-2xl dark:text-darkTheme">Operators</h4>
        </div>

        <div class="flex flex-wrap flex-col md:flex-row  gap-2 ">
            
            <OperatorCard/>
        </div>
   
        <!-- <div class="flex justify-center mt-20">
            <a href="#" class="px-6 py-1 rounded-lg text-white bg-green-500 hover:rounded-none">see more</a>
        </div>  -->
    </section>
    
</template>
<script setup>
//component imports
import LoadingCard from '../../components/LoadingCard.vue'
import OperatorCard from '../../components/OperatorCard.vue'



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