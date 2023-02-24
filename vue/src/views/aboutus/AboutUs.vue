<template>
    <div  class="pt-20 px-4 md:px-36 dark:bg-dark">
        <div class="flex flex-col  md:flex-row ">
            <div class="w-4/5 mb-4 md:w-1/2 ml-2 flex flex-col justify-center items-start">
                 <div class="">
                    <h5 class="text-slate-800 font-lg mb-2 tracking-wide dark:text-darkIndigo">GET IN TOUCH</h5>
                    <p class="text-indigo-700 font-medium tracking-widest text-capitalize text-2xl dark:text-darkTheme">Visit our main location and contact with us now.</p>
                    <h5 class="text-gray-700 font-bold text-md tracking-wide mt-4 dark:text-white">Head Office</h5>
                 </div>
                 <div class="flex flex-col space-y-4 mt-5">
                    <div class="flex" v-for="(info,index) in information" :key="index">
                        <div class="pr-2 dark:text-darkIndigo"><i :class="info.icon"></i></div>
                        <div class="font-medium text-slate-900 text-md dark:text-white">{{ info.text }}</div>
                    </div>
                    
                 </div>
            </div>
            <div class="hidden md:w-1/2 md:inline-block">
                <div class="google-map">
                    <iframe src="https://www.google.com/maps/d/embed?mid=1cvb0KCYS7KeOxUjcuUU0fPfs21s&hl=en_US&ehbc=2E312F" width="640"
                        height="480"></iframe>
                </div>
            </div>
        </div>
    </div>


</template>
<script setup>
const information = [
    {
        icon:"fa-solid fa-map-location-dot",
        text: 'No.245, U Tun Lin Road, Hledan, Yangon/fakeinfo'
    },
    {
        icon: "fa-solid fa-envelope",
        text: 'hpyaesone@gmail.com/my info'
    },
    {
        icon: "fa-solid fa-phone",
        text: '09986900645/my info'
    },
    {
        icon: "fa-solid fa-user",
        text: 'Pyae Sone Hein/my info'
    }
]
</script>

