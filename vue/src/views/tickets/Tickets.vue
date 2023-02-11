<template>
    
        <!-- trip section -->
        <div  id="trip-section" class="mt-10">
            
        </div>
        
        <section class="flex flex-col  md:flex-row mx-0 md:mx-8" id="operator-date">
            
           <div class="w-full mb-4 md:w-1/6">
            <!-- operator and date time section -->
               
                <div class="">
                    <div class="border bg-white mx-4 md:mx-2 ">
                        <div class="pt-4 pb-2 w-full border-b border-gray-700 ">
                            <h1 class="text-xl font-semibold text-gray-500 text-center">Departure Time</h1>
                        </div>
                        <div class=" p-4 flex flex-col ">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Any Time
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Day Bus
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Night Bus
                                </label>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
           </div>
            <div class="w-5/6 ">
                <div class=""></div>
                <Ticket class="mx-4"></Ticket>
            </div>
        </section>
        <!-- operator and date time section end-->
        <section>
            
        </section>
   
    
</template>

<script setup>
import Ticket from '../../components/Ticket.vue'
import TicketSearch from '../../components/Ticket-Search-Card.vue'
</script>

<style scoped>
#trip-section {
    height: 50vh;
    background-image: url('../../../public/img/banner/innlaybanner.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: top 45% right 0;
    
}
</style>