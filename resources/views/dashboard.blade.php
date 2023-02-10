{{-- dropdown --}}
<template>
    <div class="fixed top-16 w-72">
        <Listbox v-model="selectedPerson">
            <div class="relative mt-1">
                <ListboxButton
                    class="relative w-full cursor-default rounded-lg bg-white py-2 pl-3 pr-10 text-left shadow-md focus:outline-none focus-visible:border-indigo-500 focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75 focus-visible:ring-offset-2 focus-visible:ring-offset-orange-300 sm:text-sm">
                    <span class="block truncate">{{ selectedPerson . name }}</span>
                    <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                        <ChevronUpDownIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                    </span>
                </ListboxButton>

                <transition leave-active-class="transition duration-100 ease-in" leave-from-class="opacity-100"
                    leave-to-class="opacity-0">
                    <ListboxOptions
                        class="absolute mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
                        <ListboxOption v-slot="{ active, selected }" v-for="person in people" :key="person.name"
                            :value="person" as="template">
                            <li
                                :class="[
                                    active ? 'bg-amber-100 text-amber-900' : 'text-gray-900',
                                    'relative cursor-default select-none py-2 pl-10 pr-4',
                                ]">
                                <span
                                    :class="[
                                        selected ? 'font-medium' : 'font-normal',
                                        'block truncate',
                                    ]">{{ person . name }}</span>
                                <span v-if="selected"
                                    class="absolute inset-y-0 left-0 flex items-center pl-3 text-amber-600">
                                    <CheckIcon class="h-5 w-5" aria-hidden="true" />
                                </span>
                            </li>
                        </ListboxOption>
                    </ListboxOptions>
                </transition>
            </div>
        </Listbox>
    </div>
</template>

<script setup>
    import {
        ref
    } from 'vue'
    import {
        Listbox,
        ListboxLabel,
        ListboxButton,
        ListboxOptions,
        ListboxOption,
    } from '@headlessui/vue'
    import {
        CheckIcon,
        ChevronUpDownIcon
    } from '@heroicons/vue/20/solid'

    const people = [{
            name: 'Wade Cooper'
        },
        {
            name: 'Arlene Mccoy'
        },
        {
            name: 'Devon Webb'
        },
        {
            name: 'Tom Cook'
        },
        {
            name: 'Tanya Fox'
        },
        {
            name: 'Hellen Schmidt'
        },
    ]
    const selectedPerson = ref(people[0])
</script>



{{-- dropdown end --}}

{{-- switch --}}
<template>
    <div class="py-16">
        <Switch v-model="enabled" :class="enabled ? 'bg-teal-900' : 'bg-teal-700'"
            class="relative inline-flex h-[38px] w-[74px] shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75">
            <span class="sr-only">Use setting</span>
            <span aria-hidden="true" :class="enabled ? 'translate-x-9' : 'translate-x-0'"
                class="pointer-events-none inline-block h-[34px] w-[34px] transform rounded-full bg-white shadow-lg ring-0 transition duration-200 ease-in-out" />
        </Switch>
    </div>
</template>

<script setup>
    import {
        ref
    } from 'vue'
    import {
        Switch
    } from '@headlessui/vue'

    const enabled = ref(false)
</script>



{{-- switchend --}}

<template>
    <div class="fixed top-16 w-56 text-right">
        <Menu as="div" class="relative inline-block text-left">
            <div>
                <MenuButton
                    class="inline-flex w-full justify-center rounded-md bg-black bg-opacity-20 px-4 py-2 text-sm font-medium text-white hover:bg-opacity-30 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75">
                    Options
                    <ChevronDownIcon class="ml-2 -mr-1 h-5 w-5 text-violet-200 hover:text-violet-100"
                        aria-hidden="true" />
                </MenuButton>
            </div>

            <transition enter-active-class="transition duration-100 ease-out"
                enter-from-class="transform scale-95 opacity-0" enter-to-class="transform scale-100 opacity-100"
                leave-active-class="transition duration-75 ease-in" leave-from-class="transform scale-100 opacity-100"
                leave-to-class="transform scale-95 opacity-0">
                <MenuItems
                    class="absolute right-0 mt-2 w-56 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                    <div class="px-1 py-1">
                        <MenuItem v-slot="{ active }">
                        <button
                            :class="[
                                active ? 'bg-violet-500 text-white' : 'text-gray-900',
                                'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                            ]">
                            <EditIcon :active="active" class="mr-2 h-5 w-5 text-violet-400" aria-hidden="true" />
                            Edit
                        </button>
                        </MenuItem>
                        <MenuItem v-slot="{ active }">
                        <button
                            :class="[
                                active ? 'bg-violet-500 text-white' : 'text-gray-900',
                                'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                            ]">
                            <DuplicateIcon :active="active" class="mr-2 h-5 w-5 text-violet-400"
                                aria-hidden="true" />
                            Duplicate
                        </button>
                        </MenuItem>
                    </div>
                    <div class="px-1 py-1">
                        <MenuItem v-slot="{ active }">
                        <button
                            :class="[
                                active ? 'bg-violet-500 text-white' : 'text-gray-900',
                                'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                            ]">
                            <ArchiveIcon :active="active" class="mr-2 h-5 w-5 text-violet-400"
                                aria-hidden="true" />
                            Archive
                        </button>
                        </MenuItem>
                        <MenuItem v-slot="{ active }">
                        <button
                            :class="[
                                active ? 'bg-violet-500 text-white' : 'text-gray-900',
                                'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                            ]">
                            <MoveIcon :active="active" class="mr-2 h-5 w-5 text-violet-400" aria-hidden="true" />
                            Move
                        </button>
                        </MenuItem>
                    </div>

                    <div class="px-1 py-1">
                        <MenuItem v-slot="{ active }">
                        <button
                            :class="[
                                active ? 'bg-violet-500 text-white' : 'text-gray-900',
                                'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                            ]">
                            <DeleteIcon :active="active" class="mr-2 h-5 w-5 text-violet-400"
                                aria-hidden="true" />
                            Delete
                        </button>
                        </MenuItem>
                    </div>
                </MenuItems>
            </transition>
        </Menu>
    </div>
</template>

<script setup>
    import {
        Menu,
        MenuButton,
        MenuItems,
        MenuItem
    } from '@headlessui/vue'
    import {
        ChevronDownIcon
    } from '@heroicons/vue/20/solid'
    import ArchiveIcon from './archive-icon.vue'
    import DuplicateIcon from './duplicate-icon.vue'
    import MoveIcon from './move-icon.vue'
    import EditIcon from './edit-icon.vue'
    import DeleteIcon from './delete-icon.vue'
</script>
