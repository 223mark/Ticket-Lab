<template>
    
        <!-- trip section -->
        <div  id="trip-section">
            
        </div>
        
        <section class="flex flex-row-reverse md:flex-row mx-4 md:mx-8" id="operator-date">
            
            <!-- operator and date time section -->
            <div class="w-1/2">
                <div class="flex  justify-between gap-2">
                        <div class="">
                            <div class="border bg-gray-200 ">
                                <div class="py-4 border border-gray-400 ">
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
                                            Afternoon Bus
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
                        <div class="">
                            <div class="border bg-gray-200 ">
                                <div class="py-4 border border-gray-400 ">
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
                                            Afternoon Bus
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
            </div>
            <div class="w-1/2">
                <TicketSearch></TicketSearch>
            </div>
        </section>
        <!-- operator and date time section end-->
        <section>
            <div class="w-full ">
                <TripResult class="mx-8"></TripResult>
            </div>
        </section>
   
    
</template>

<script setup>
import TripResult from '../../components/SearchTrip.vue'
import TicketSearch from '../../components/Ticket-Search-Card.vue'
</script>

<style scoped>
#trip-section {
    height: 45vh;
    background-image: url('../../public/img/banner/innlaybanner.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: top 40% right 0;
    
}
</style>