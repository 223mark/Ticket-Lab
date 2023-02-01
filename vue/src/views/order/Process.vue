<template>
    <div class="flex flex-col md:flex-row md:justify-between mt-20 mx-2 md:mx-5 gap-2">
            
            <div class=" w-full md:w-3/5 rounded-lg bg-white pb-4">
                <!-- seat section -->
                    <div class="text-center py-2 bg-green-500">
                        <h5 class="text-xl  font-semibold text-white">Please Select Seat</h5>
                    </div>
                    <!-- driver section -->
                    <!-- <div class="flex justify-between p-2 md:p-4 ">
                        <div class="w-2/6  " >
                            <h6 class="text-indigo-700 ">Bus No : 12345</h6>
                        </div>
                        <div class="w-2/6">
                            <h6 class="text-indigo-700">Driver : Aung Aung</h6>
                        </div>
                        <div class="w-2/6">
                            <h6 class="text-indigo-700">NRC : 12/katana(naing)/456200</h6>
                        </div>
                    </div> -->
                    <!-- driver section end -->
                <!-- seat position  -->
                <div class="flex justify-between pt-5 md:pt-10 gap-1">
                    <!-- left position -->
                    <div class="flex justify-between gap-2 flex-wrap ml-2 md:ml-8 md:w-1/2 ">
                            <div class="flex justify-center items-center bg-gray-400 w-full md:w-1/3 h-12">
                                <span><i class="fa-solid fa-lock text-light"></i></span>
                            </div>
                            <div class="flex justify-center items-center bg-gray-400 w-full md:w-1/3 h-12">
                                <span><i class="fa-solid fa-lock text-light"></i></span>
                            </div>
                            <div class="flex justify-center items-center bg-gray-400 w-full md:w-1/3 h-12">
                                <span><i class="fa-solid fa-lock text-light"></i></span>
                            </div>
                            <div class="flex justify-center items-center bg-gray-400 w-full md:w-1/3 h-12">
                                <span><i class="fa-solid fa-lock text-light"></i></span>
                            </div>
                            <div class="flex justify-center items-center bg-gray-400 w-full md:w-1/3 h-12">
                                <span><i class="fa-solid fa-lock text-light"></i></span>
                            </div>
                            <div class="flex justify-center items-center bg-gray-400 w-full md:w-1/3 h-12">
                                <span><i class="fa-solid fa-lock text-light"></i></span>
                            </div>
                            <div class="flex justify-center items-center bg-gray-400 w-full md:w-1/3 h-12">
                                <span><i class="fa-solid fa-lock text-light"></i></span>
                            </div>
                            <div class="flex justify-center items-center bg-gray-400 w-full md:w-1/3 h-12">
                                <span><i class="fa-solid fa-lock text-light"></i></span>
                            </div>
                            <div class="flex justify-center items-center bg-gray-400 w-full md:w-1/3 h-12">
                                <span><i class="fa-solid fa-lock text-light"></i></span>
                            </div>
                            <div class="flex justify-center items-center bg-gray-400 w-full md:w-1/3 h-12">
                                <span><i class="fa-solid fa-lock text-light"></i></span>
                            </div>
                            <div class="flex justify-center items-center bg-gray-400 w-full md:w-1/3 h-12">
                                <span><i class="fa-solid fa-lock text-light"></i></span>
                            </div>
                            <div class="flex justify-center items-center bg-gray-400 w-full md:w-1/3 h-12">
                                <span><i class="fa-solid fa-lock text-light"></i></span>
                            </div>
                    </div>
                    <!-- right position -->
                    <div class="flex justify-between gap-2 flex-wrap mr-2 md:mr-8 md:w-1/2 ">
                        <div class="flex justify-center items-center bg-gray-400 w-full md:w-1/3 h-12">
                            <span><i class="fa-solid fa-lock text-light"></i></span>
                        </div>
                        <div class="flex justify-center items-center bg-gray-400 w-full md:w-1/3 h-12">
                            <span><i class="fa-solid fa-lock text-light"></i></span>
                        </div>
                        <div class="flex justify-center items-center bg-gray-400 w-full md:w-1/3 h-12">
                            <span><i class="fa-solid fa-lock text-light"></i></span>
                        </div>
                        <div class="flex justify-center items-center bg-gray-400 w-full md:w-1/3 h-12">
                            <span><i class="fa-solid fa-lock text-light"></i></span>
                        </div>
                        <div class="flex justify-center items-center bg-gray-400 w-full md:w-1/3 h-12">
                            <span><i class="fa-solid fa-lock text-light"></i></span>
                        </div>
                        <div class="flex justify-center items-center bg-gray-400 w-full md:w-1/3 h-12">
                            <span><i class="fa-solid fa-lock text-light"></i></span>
                        </div>
                        <div class="flex justify-center items-center bg-gray-400 w-full md:w-1/3 h-12">
                            <span><i class="fa-solid fa-lock text-light"></i></span>
                        </div>
                        <div class="flex justify-center items-center bg-gray-400 w-full md:w-1/3 h-12">
                            <span><i class="fa-solid fa-lock text-light"></i></span>
                        </div>
                        <div class="flex justify-center items-center bg-gray-400 w-full md:w-1/3 h-12">
                            <span><i class="fa-solid fa-lock text-light"></i></span>
                        </div>
                        <div class="flex justify-center items-center bg-gray-400 w-full md:w-1/3 h-12">
                            <span><i class="fa-solid fa-lock text-light"></i></span>
                        </div>
                        <div class="flex justify-center items-center bg-gray-400 w-full md:w-1/3 h-12">
                            <span><i class="fa-solid fa-lock text-light"></i></span>
                        </div>
                        <div class="flex justify-center items-center bg-gray-400 w-full md:w-1/3 h-12">
                            <span><i class="fa-solid fa-lock text-light"></i></span>
                        </div>
                    </div>
                    
                </div>
                <!-- seat position end -->
            </div>
            <!-- seat section end -->
        <!-- booking summary  -->
            <div class="w-full md:w-2/5">
               <BookingSummary></BookingSummary> 
            </div>
        <!-- booking summary end -->
    </div>
</template>

<script setup>
import BookingSummary from '../../components/BookingSummary.vue'
</script>

<style lang="stylus" scoped>

</style>
