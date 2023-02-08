<template>
        <NavBar/>

        <main class=" space-y-4">
            <router-view></router-view>
        </main>

        <Footer/>
        
</template>
<script setup>
import NavBar from './NavBar.vue'
import Footer from './Footer.vue'

</script>

<style>
#footer {
    min-height: 30vh;
    background-image: url('../../public/img/banner/greenfooter.jpg');
    background-repeat: no-repeat;
    background-position: top 40% right 0;
    background-size: cover;

}
</style>