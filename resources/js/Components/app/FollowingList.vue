<script setup>
import FollowingItem from './FollowingItem.vue';
import FollowingListItems from './FollowingListItems.vue';
import TextInput from '@/Components/TextInput.vue';
import {
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
  } from '@headlessui/vue'
</script>

<template>
    <div class="px-3 bg-white rounded border h-full py-3 overflow-hidden        ">
        <div class=" block lg:hidden">
            <Disclosure v-slot="{ open }">

                <DisclosureButton class="w-full">
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-bold">My Friends</h2>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 transition-all" :class="open ? 'rotate-90 transform' : ''">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </div>
                </DisclosureButton>

                <DisclosurePanel>
                    <FollowingListItems />
                </DisclosurePanel>
                    
            </Disclosure>
        </div>


        <div class="h-full flex-col overflow-hidden hidden lg:flex px-0.5">       
            <h2 class="text-xl font-bold">My Friends</h2>
            <FollowingListItems />
        </div>
    </div>  
    
</template>

<style scoped>

</style>