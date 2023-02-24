<template>
    <section class="mx-2 md:mx-40 ">
        <div class="flex flex-col mt-10">
            <div class="w-full mb-2">
                <h6 class="text-md text-indigo-800 font-medium">Our Best</h6>
                <h5 class="text-3xl text-green-500 font-semibold tracking-wide">Offer Deals</h5>
            </div>
            <div class="w-full flex    ">
                <div class="w-full mr-2 md:w-1/2 bg-blue-500 rounded-lg " id="left-hero">
                    <div class="flex flex-col  items-center justify-center h-full space-y-4 ">
                        <h6 class="text-white font-bold tracking-wider text-md dark:text-darkTheme">Mandalay - Taunggyi</h6>
                        <span class="text-white font-semibold tracking-wide text-md inline-block dark:text-darkIndigo">Price From</span>
                        <span class="text-white font-bold tracking-wider text-md dark:text-darkTheme">20,000 MMK</span>
                        <button class="px-4 py-2 bg-theme text-md rounded-lg font-medium text-white">
                            Book Now
                        </button>
                    </div>
                </div>
                <div class="w-full md:w-1/2 flex flex-wrap  ">
                    <div class="w-full pb-2 md:w-1/2" v-for="(route,index) in routeInfo" :key="index">
                        <div class="  shadow-md border-2 border-gray-200 rounded-lg max-w-sm dark:border-darkTheme">
                            <div class="hidden md:inline">
                                <img class="rounded-t-lg w-full h-32 " :src="route.img" alt="routes" >
                            </div>
                            <div class="p-1 md:p-5 ">
    
                                <h3
                                    class="pb-2 text-gray-900 font-medium text-md md:text-lg text-center tracking-tight  dark:text-darkTheme">
                                    {{ route.route }}</h3>
                                <button
                                    class="text-white  mt-4 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm  px-3 py-1 md:py-2 text-center  items-center w-full  ">
                                    Go
                                </button>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </section>
</template>
<script setup>
const routeInfo = [
    {
        route: "Yangon - Mandalay",
        img: '../../public/img/location/mandalay.png'
    },
    {
        route: "Yangon - Bagan",
        img: '../../public/img/location/bagan.png'
    },
    {
        route: "Mandalay - Myitkyina",
        img: '../../public/img/location/mawlamyaing.png'
    },
    {
        route: "Mandalay - Naypyitaw",
        img: '../../public/img/location/naypyidaw.png'
    },

]
</script>
<style scoped>

#left-hero {
    background-image: url('../../public/img/location/bagan.png');
    background-size: cover;
    background-repeat: no-repeat;

}
</style>