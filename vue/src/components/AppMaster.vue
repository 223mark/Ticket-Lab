<template>
        <NavBar/>

        <main class=" space-y-4 bg-white">
            <!-- <RouterView class="router-view"  v-slot="{Component}">
                 <Transition class="page">
                    <component :is="Component"/>
                 </Transition>
            </RouterView> -->
            <router-view></router-view>
        </main>

        <Footer/>
        
</template>
<script setup>
import NavBar from './NavBar.vue'
import Footer from './Footer.vue'

</script>
<style scoped>
.page-enter-active, 
.page-leave-active{
    transition: 600ms ease all;
}

.page-enter-from,
.page-leave-to{
    opacity: 0;
}


</style>