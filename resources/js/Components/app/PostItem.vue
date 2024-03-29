<script setup>
 import {
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
  } from '@headlessui/vue'

import PostUserHeader from '@/Components/app/PostUserHeader.vue'
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'
import { PencilIcon, TrashIcon, EllipsisVerticalIcon, ArrowDownTrayIcon } from '@heroicons/vue/20/solid'
import { ChatBubbleLeftRightIcon, HandThumbUpIcon } from '@heroicons/vue/24/outline'
import { router } from '@inertiajs/vue3'
import { isImage } from '@/helpers.js'
 
const props = defineProps({
    post: Object
})

const emit = defineEmits(['editClick'])



function openEditModal() {
    emit('editClick', props.post)
}

function deletePost(){
    if (window.confirm('Are you sure you want to delete this post?')) {
        router.delete(route('post.destroy', props.post), {
            preserveScroll: true
        })
    }
}
</script>

<template>
    <div class="bg-white border rounded p-4 shadow mb-3">
        <div class="flex items-center justify-between mb-3">
            <PostUserHeader :post="post" />
                
                <Menu as="div" class="relative inline-block text-left">
                <div>
                    <MenuButton class="w-8 h-8 rounded-full hover:bg-black/5 flex items-center justify-center transition ">
                    
                    <EllipsisVerticalIcon
                        class="w-5 h-5"
                        aria-hidden="true"
                    />
                    </MenuButton>
                </div>

                <transition
                    enter-active-class="transition duration-100 ease-out"
                    enter-from-class="transform scale-95 opacity-0"
                    enter-to-class="transform scale-100 opacity-100"
                    leave-active-class="transition duration-75 ease-in"
                    leave-from-class="transform scale-100 opacity-100"
                    leave-to-class="transform scale-95 opacity-0"
                >
                    <MenuItems
                        class="absolute right-0 mt-2 w-32 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none"
                    >
                        <div class="px-1 py-1">
                            <MenuItem v-slot="{ active }">
                        <button 
                            @click="openEditModal"
                            :class="[
                            active ? 'bg-indigo-500 text-white' : 'text-gray-900',
                            'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                            ]"
                        >
                            <PencilIcon
                            class="mr-2 h-5 w-5"
                            aria-hidden="true"
                            />
                            Edit
                        </button>
                            </MenuItem>

                            <MenuItem v-slot="{ active }">
                            <button
                                @click=" deletePost"
                                :class="[
                                active ? 'bg-indigo-500 text-white' : 'text-gray-900',
                                'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                                ]"
                            >
                                <TrashIcon
                                :active="active"
                                class="mr-2 h-5 w-5 "
                                aria-hidden="true"
                                />
                                Delete
                            </button>
                            </MenuItem>
                        </div>
                    </MenuItems>
                </transition>
                </Menu>

        </div>
        <div class="mb-3">
            <Disclosure v-slot="{ open }">
                <div class="ck-content-output" v-if="!open" v-html="post.body.substring(0, 200)" />
                <template v-if="post.body.length > 200">
                    <DisclosurePanel>
                    <div class="ck-content-output" v-html="post.body" />
                </DisclosurePanel>
                <div class="flex justify-end">
                    <DisclosureButton class="text-blue-500 hover:underline outline-none">
                        {{ open ? 'Show less' : 'Read more'}}
                    </DisclosureButton>
                </div>
                        
                    
                </template>
            </Disclosure>
            
        </div>
        <div class="grid gap-3 mb-3" :class="[
            post.attachments.length == 1 ? 'grid-cols-1' : 'grid-cols-2'
        ]">
            <template v-for="(attachment, ind) of post.attachments.slice(0,4)" >
                
                

                <div class="group bg-blue-100 aspect-square flex flex-col items-center justify-center text-gray-500 relative">
                    
                    <div v-if=" ind==3 " class="absolute left-0 top-0 right-0 bottom-0 z-10 bg-black/60 text-white flex items-center justify-center text-2xl">
                        + {{ post.attachments.length - 4 }} more
                    </div>

                    <!-- download -->
                    <button class="z-20 opacity-0 group-hover:opacity-100 transition-all w-8 h-8 flex items-center justify-center text-gray-100 bg-gray-700 hover:bg-gray-800 rounded absolute right-2 top-2 cursor-pointer">
                        <ArrowDownTrayIcon class="w-4 h-4" />
                    </button>

                    <img  
                        v-if="isImage(attachment)" 
                        :src="attachment.url" 
                        alt="" 
                        class="object-contain aspect-square"
                    >

                    <template v-else>
                        <!-- document -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
                        class="w-12 h-12">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>

                        <small>{{ attachment.name }}</small>
                    </template>

                    
                </div>
            </template>
        </div>
        <div class="flex gap-2">
            <button class="text-gray-800 flex gap-1 items-center justify-center bg-gray-100 hover:bg-gray-200 rounded-lg py-2 px-4 flex-1">
                <HandThumbUpIcon class="w-5 h-5 mr-1" />
                like
            </button>
            <button class="text-gray-800 flex gap-1 items-center justify-center bg-gray-100 hover:bg-gray-200 rounded-lg py-2 px-4 flex-1">
                <ChatBubbleLeftRightIcon class="w-5 h-5 mr-1"/>
                Comment
            </button>
        </div>
    </div> 

    
</template>

<style scoped>

</style>