<template>
    <!--  hero start -->
    <section id="service-hero">
      <div class="flex flex-col items-start justify-center h-full ">
        <div class="pl-10">
            <h4 class="text-xl font-medium  text-green-500 md:font-semibold md:text-4xl">Contact Our Customer Services</h4>
            <div href="#" class="mt-5">
                <a href="#" class="focus:outline-none border border-blue-600 bg-blue-500 px-4 py-1 md:px-6 md:py-2 text-white text-sm rounded-lg ">Call Now</a>
            </div>
        </div>
      </div>
    </section>
    <!--  hero end -->
    <!-- section start -->
   <section class="mx-8">
    <div class="sm:flex  items-center shadow-md ">
        <div>
            <img class="bg-cover"
                src="../../public/img/service.png"
                alt="" />
        </div>
        <div class="md:px-10 sm:px-5">
            <h1 class="text-gray-800 font-bold text-2xl my-2">long established</h1>
            <p class="text-gray-700 mb-2 md:mb-6">It is a long established fact that a reader will be distracted by the
                readable content of a page when looking at its layout. The point of using Lorem Ipsum is that....</p>
            <div class="flex justify-between mb-2">
                <span class="font-thin text-sm">May 20th 2020</span>
                <span class="sm:block hidden mb-2 text-gray-800 font-bold">Read more</span>
            </div>
        </div>
    </div>
   </section>

    <!-- section end -->


</template>

<style scoped>
#service-hero{
    height: 50vh;
    background-image: url('../../public/img/hero/service_hero.jpg');
    background-repeat: no-repeat;
    background-size: cover;
}
</style>