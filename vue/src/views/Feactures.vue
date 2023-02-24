<template>
        <transition name="feacture">
            <div class="mx-auto max-w-7xl mt-3 px-10 lg:px-20 ">
                <h4 class="text-2xl text-center text-indigo-600 font-bold dark:text-darkIndigo">Our Feactures</h4>
                <div class="mt-10 max-w-lg sm:mx-auto md:max-w-none">
                    <div class="grid grid-cols-1 gap-y-16 md:grid-cols-2 md:gap-x-12 md:gap-y-16">
                        <div v-for="feature in features" :key="feature.name"
                            class="relative flex flex-col gap-6 sm:flex-row md:flex-col lg:flex-row">
                            <div
                                class="flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-500 text-white sm:shrink-0">
                                <component :is="feature.icon" class="h-8 w-8" aria-hidden="true" />
                            </div>
                            <div class="sm:min-w-0 sm:flex-1">
                                <p class="text-lg font-semibold leading-8 text-gray-900 dark:text-darkIndigo">{{ feature.name }}</p>
                                <p class="mt-2 text-base leading-7 text-gray-600">{{ feature.description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
</template>

<script setup>
import { BoltIcon, DevicePhoneMobileIcon, GlobeAltIcon, ScaleIcon } from '@heroicons/vue/24/outline'

const features = [
    {
        name: 'Easy Buying',
        description:
            'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.',
        icon: GlobeAltIcon,
    },
    {
        name: 'Over 100 + Opearators',
        description:
            'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.',
        icon: ScaleIcon,
    },
    {
        name: 'Secure Payment and Userinfo',
        description:
            'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.',
        icon: BoltIcon,
    },
    {
        name: 'Avaliable Insurance',
        description:
            'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.',
        icon: DevicePhoneMobileIcon,
    },
]
</script>

<style scoped>
.feacture-enter-from {
    opacity: 0;
    
}

.feacture-enter-to {
    opacity: 1;
   
}

.feacture-enter-active {
    transition: all 0.8s ease-in;
}

.feacture-leave-to {
    opacity: 0;
    
}

.feacture-leave-active {
    transition: all 0.2s ease-out;
}

</style>