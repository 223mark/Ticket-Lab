@props(['data'])

<div class="w-full md:w-1/4 border">
    <div class="w-full  flex flex-col items-center justify-enter h-32 bg-white shadow-lg rounded-lg px-4 py-6 md:h-48">

        <div class=" h-full">
            <h2 class="text-3xl font-bold text-indigo-500 hover:text-indigo-600 tracking-wider md:text-2xl">
                {{ $slot }}
            </h2>
        </div>
        <div class=" h-full">
            <h2 class="text-4xl font-bold text-black "> {{ $data }}</h2>
        </div>
    </div>
</div>
