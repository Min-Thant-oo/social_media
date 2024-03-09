<script setup>
import PostItem from '@/Components/app/PostItem.vue'

defineProps({
    posts : Array
})
</script>

<template>
    <div>
        <div class="">

            
            <PostItem v-for="post of posts" :key="post.id" :post="post"/>
        </div>
    </div> 
    
</template>

<style scoped>

</style>