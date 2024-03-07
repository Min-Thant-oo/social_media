<script setup>

import TextInput from '@/Components/TextInput.vue';
import GroupItem from './GroupItem.vue'
import {ref} from 'vue';

const searchKeyword = ref('')
</script>

<template>
        <TextInput :model-value="searchKeyword" placeholder="Type to search" class="w-full mt-4"/>
            <div class=" mt-3 h-[200px] lg:flex-1 overflow-auto">
                <div v-if="false" class="text-gray-400 text-center p-3">You are not joined to any groups.</div>
                
                <div v-else>
                    
                    
                    
                    <GroupItem
                        image="https://source.unsplash.com/random"
                        title="Vue.js Developer"
                        description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                    />
                    <GroupItem
                        image="https://source.unsplash.com/random"
                        title="Laravel Developer"
                        description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                    />
                    <GroupItem
                        image="https://source.unsplash.com/random"
                        title="Vue.js Developer"
                        description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                    />
                    <GroupItem
                        image="https://source.unsplash.com/random"
                        title="Laravel Developer"
                        description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                    />
                    <GroupItem
                        image="https://source.unsplash.com/random"
                        title="Vue.js Developer"
                        description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                    />
                    <GroupItem
                        image="https://source.unsplash.com/random"
                        title="Laravel Developer"
                        description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                    />
                    <GroupItem
                        image="https://source.unsplash.com/random"
                        title="Vue.js Developer"
                        description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                    />
                    <GroupItem
                        image="https://source.unsplash.com/random"
                        title="Laravel Developer"
                        description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                    />
                    <GroupItem
                        image="https://source.unsplash.com/random"
                        title="Vue.js Developer"
                        description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                    />
                    <GroupItem
                        image="https://source.unsplash.com/random"
                        title="Laravel Developer"
                        description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                    />
                    <GroupItem
                        image="https://source.unsplash.com/random"
                        title="Vue.js Developer"
                        description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                    />
                    <GroupItem
                        image="https://source.unsplash.com/random"
                        title="Laravel Developer"
                        description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                    />
                    <GroupItem
                        image="https://source.unsplash.com/random"
                        title="Vue.js Developer"
                        description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                    />
                    `<GroupItem
                        image="https://source.unsplash.com/random"
                        title="Laravel Developer"
                        description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                    />
                    <GroupItem
                        image="https://source.unsplash.com/random"
                        title="Vue.js Developer"
                        description="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?"
                    />`
                </div>
            </div>
</template>

<style scoped>

</style>