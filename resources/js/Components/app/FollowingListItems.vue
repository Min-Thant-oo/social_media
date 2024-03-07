<script setup>
import FollowingItem from './FollowingItem.vue';
import TextInput from '@/Components/TextInput.vue'
import {ref} from 'vue';

const searchKeyword = ref('')
</script>

<template>
        <TextInput :model-value="searchKeyword" placeholder="Type to search" class="w-full mt-3"/>
        <div class=" mt-3 h-[200px] lg:flex-1 overflow-auto">
            <div v-if="false" class="text-gray-600 text-center p-3">You don't have friends yet.</div>
            <div v-else>
                
                <FollowingItem
                    image="https://source.unsplash.com/random"
                    title="John Doe"
                    description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                />
                <FollowingItem
                    image="https://source.unsplash.com/random"
                    title="Elon Musk"
                    description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                />
                <FollowingItem
                    image="https://source.unsplash.com/random"
                    title="John Doe"
                    description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                />
                <FollowingItem
                    image="https://source.unsplash.com/random"
                    title="Elon Musk"
                    description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                />
                <FollowingItem
                    image="https://source.unsplash.com/random"
                    title="John Doe"
                    description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                />
                <FollowingItem
                    image="https://source.unsplash.com/random"
                    title="Elon Musk"
                    description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                />
                <FollowingItem
                    image="https://source.unsplash.com/random"
                    title="John Doe"
                    description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                />
                <FollowingItem
                    image="https://source.unsplash.com/random"
                    title="Elon Musk"
                    description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                />
                <FollowingItem
                    image="https://source.unsplash.com/random"
                    title="John Doe"
                    description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                />
                <FollowingItem
                    image="https://source.unsplash.com/random"
                    title="Elon Musk"
                    description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                />
                <FollowingItem
                    image="https://source.unsplash.com/random"
                    title="John Doe"
                    description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                />
                <FollowingItem
                    image="https://source.unsplash.com/random"
                    title="Elon Musk"
                    description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                />
                <FollowingItem
                    image="https://source.unsplash.com/random"
                    title="John Doe"
                    description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                />
                <FollowingItem
                    image="https://source.unsplash.com/random"
                    title="Elon Musk"
                    description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                />
                <FollowingItem
                    image="https://source.unsplash.com/random"
                    title="John Doe"
                    description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                />
                <FollowingItem
                    image="https://source.unsplash.com/random"
                    title="Elon Musk"
                    description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                />
                <FollowingItem
                    image="https://source.unsplash.com/random"
                    title="John Doe"
                    description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                />
                <FollowingItem
                    image="https://source.unsplash.com/random"
                    title="Elon Musk"
                    description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                />
                <FollowingItem
                    image="https://source.unsplash.com/random"
                    title="John Doe"
                    description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                />
                <FollowingItem
                    image="https://source.unsplash.com/random"
                    title="Elon Musk"
                    description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                />
                <FollowingItem
                    image="https://source.unsplash.com/random"
                    title="John Doe"
                    description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                />
                <FollowingItem
                    image="https://source.unsplash.com/random"
                    title="Elon Musk"
                    description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                />
                <FollowingItem
                    image="https://source.unsplash.com/random"
                    title="John Doe"
                    description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                />
                <FollowingItem
                    image="https://source.unsplash.com/random"
                    title="Elon Musk"
                    description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                />
                <FollowingItem
                    image="https://source.unsplash.com/random"
                    title="John Doe"
                    description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                />
                <FollowingItem
                    image="https://source.unsplash.com/random"
                    title="Elon Musk"
                    description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                />
                <FollowingItem
                    image="https://source.unsplash.com/random"
                    title="John Doe"
                    description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                />
                <FollowingItem
                    image="https://source.unsplash.com/random"
                    title="Elon Musk"
                    description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                />
                <FollowingItem
                    image="https://source.unsplash.com/random"
                    title="John Doe"
                    description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                />
                <FollowingItem
                    image="https://source.unsplash.com/random"
                    title="Elon Musk"
                    description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                />
                <FollowingItem
                    image="https://source.unsplash.com/random"
                    title="John Doe"
                    description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                />
                <FollowingItem
                    image="https://source.unsplash.com/random"
                    title="Elon Musk"
                    description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                />
            </div>
        </div>
</template>

<style scoped>

</style>