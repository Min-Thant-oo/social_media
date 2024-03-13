<script setup>
    defineProps({
        image: String,
        title: String,
        description: String
    })
</script>

<template>
    <div id="1" class="mb-3 cursor-pointer hover:bg-gray-100">
        <div id="2" class="flex items-start gap-1 py-2 px-2">
            <img 
                :src="image" 
                alt="pic"
                class="w-[32px] rounded-full aspect-square"
            >
            <div>
                <h3 class="font-black text-lg">{{ title }}</h3>
                <div class="text-xs text-gray-500">{{ description }}</div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>