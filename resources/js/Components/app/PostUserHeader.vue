<script setup>

defineProps({
    post: {
        type: Object,
    },
    showTime: {
        type: Boolean,
        default: true
    }
})
</script>

<template>  
<div class="flex items-center gap-2">
        <a href="#">
            <img :src="post.user.avatar_url" alt="" class="w-[40px] rounded-full aspect-square border border-2 hover:border-blue-500 transition-all"> 
        </a>
        <div>
            <h4 class="font-bold">
                <a href="javascript:void[0]" class="hover:underline">{{ post.user.name }}</a>

                <template v-if="post.group">
                    >
                    <a href="javascript:void[0]" class="hover:underline">{{ post.group.name }}</a>
                </template>
            </h4>
            <small v-if="showTime" class="text-gray-400">{{ post.updated_at }}</small>
        </div>
    </div>
</template>

<style scoped>

</style >

