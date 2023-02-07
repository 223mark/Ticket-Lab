<template>
    <div class="flex flex-col md:flex-row md:justify-between mt-20 mx-2 md:mx-5 gap-2">
            
            <div class=" w-full md:w-3/5 rounded-lg bg-white pb-4">
                <!-- seat section -->
                    <div class="text-center py-2 ">
                        <h5 class="text-xl  font-semibold text-white bg-green-500 py-2 mb-2">Please Select Seat</h5>
                        <h4 class="text-indigo-500 font-medium">Seat Number - <span class="text-green-500 font-semibold">S-15</span></h4>
                        
                    </div>
                   
                <!-- seat position  -->
                <div class="flex justify-between pt-5 md:pt-10 gap-1">
                    <!-- left position -->
                    <div class="flex justify-between  gap-2 flex-wrap ml-2 md:ml-8 md:w-1/2 ">
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
                    <div class="flex justify-between  gap-2 flex-wrap mr-2 md:mr-8 md:w-1/2 md:ml-4">
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
