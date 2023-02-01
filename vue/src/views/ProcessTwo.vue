<template>
    <div class="container-fluid py-4 ">
        <div class="row">
            <!-- user information section -->
            <div class="col-md-7 col-sm-7 ">
                <div class="card w-100 px-4">
                    <div class="card-header">
                        Traveler Information
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 ">
                                <label for="name" class="mb-2">Traveler Name</label>
                                <input type="text" name="" id="name" class="form-control " placeholder="exp-Kyaw Kyae">
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="mb-2">Phone Number</label>
                                <input type="number" phone="" id="name" class="form-control " placeholder="09 ********">
                            </div>
                            <div class="col-md-12 py-4">
                                    <label for="" class="mb-2">NRC Number</label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <select name="nrcTNo" id="" class=" form-control w-100">
                                                <option value="၁">၁ /</option>
                                                <option value="၂">၂ /</option>
                                                <option value="၃">၃ /</option>
                                                <option value="၄">၄ /</option>
                                                <option value="၅">၅ /</option>
                                                <option value="၆">၆ /</option>
                                                <option value="၇">၇ /</option>
                                                <option value="၈">၈ /</option>
                                                <option value="၉">၉ /</option>
                                                <option value="၁၀">၁၀ /</option>
                                                <option value="၁၁">၁၁ /</option>
                                                <option value="၁၂">၁၂ /</option>
                                
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="nrcPlace" class=" form-control" placeholder="ကဖန">
                                        </div>
                                        <div class="col-md-3">
                                            <select name="nrcCtz" class=" form-control">
                                                <option value="(နိုင်)">နိုင်</option>
                                                <option value="(ဧည့်)">ဧည့်</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" name="nrcNo" id="" class=" form-control" placeholder="******">
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-6 py-2">
                                <label for="" class="mb-2">Gender</label>
                                <div class="d-flex ">
                                    <div class="form-check mx-2">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check mx-2">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Female
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 p-4 bg-light border-top">
                                <p class="text-danger fw-light">
                                    Your Information won't be public 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- user information  section end -->
            <!-- booking summary  -->
            <div class="col-md-4 col-sm-4 ms-2 border-bottom bg-tertiary">
                <div class="row border">
                    <div class="col-md-12 py-2 bg-light border">
                        <h6 class=" fw-semibold">Booking Summary</h6>
                    </div>
                    <div class="row pt-4">
                        <div class="col-md-6 ">
                            <p class=" fw-light">Bus Operator</p>
                        </div>
                        <div class="col-md-6">
                            <p class=" fw-semibold">Something Something</p>
                        </div>
                        <div class="col-md-6 ">
                            <p class=" fw-light">Route</p>
                        </div>
                        <div class="col-md-6">
                            <p class=" fw-semibold">Yangon - Mandalay </p>
                        </div>
                        <div class="col-md-6 ">
                            <p class=" fw-light">Departure Time</p>
                        </div>
                        <div class="col-md-6">
                            <p class=" fw-semibold">28 Jan 2022</p>
                        </div>
                        <div class="col-md-6 ">
                            <p class=" fw-light">Arrive Time</p>
                        </div>
                        <div class="col-md-6">
                            <p class=" fw-semibold">29 Jam 2024</p>
                        </div>
                        <div class="col-md-6 ">
                            <p class=" fw-semibold">Subtotal</p>
                        </div>
                        <div class="col-md-6">
                            <p class=" fw-bold text-success">30000 Ks</p>
                        </div>
                    </div>
                
                </div>
                <div class="row my-2  py-4 border bg-light">
                    <div class="col-md-12">
                        <div class="card-body text-center">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <p class=" fw-semibold">Number of Seat</p>
                                </div>
                                <div class="col-md-6">
                                    <p class=" fw-bold text-primary">1 Seats</p>
                                </div><div class="col-md-6 ">
                                    <p class=" fw-semibold">Subtotal</p>
                                </div>
                                <div class="col-md-6">
                                    <p class=" fw-bold text-success">30000 Ks</p>
                                </div>
                            </div>
                            <div class="mt-2">
                                <button class="btn btn-success w-100">Continue to Payment</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- booking summary end -->
        </div>

    </div>
</template>

<script setup>
</script>

<style lang="stylus" scoped>

</style>
