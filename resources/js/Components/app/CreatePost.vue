<script setup>
import { ref } from 'vue';
import TextInput from '@/Components/TextInput.vue';
import InputTextArea from '@/Components/InputTextArea.vue'
// import In
import { useForm } from '@inertiajs/vue3';

const postCreating = ref(false)

const newPostForm = useForm({
    body: '',
})

const newPost = ref({
    body: ''
})

function submit() {
    newPostForm.post(route('post.create'), {
        onSuccess: ()=> {
            newPostForm.reset()
        }
    })
}
</script>

<template>
    <div class="p-4 pb-0 bg-white rounded-lg border mb-3">
        <InputTextArea
            @click="postCreating=true" 
            class=""
            placeholder="Create new post"
            v-model="newPostForm.body"
            
        />
        <div v-if="postCreating" class="flex gap-2 justify-between pb-4">
            <button type="button" class="relative rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Attach files
                <input type="file" class="absolute left-0 right-0 top-0 bottom-0 opacity-0">
            </button>
            <button @click="submit" type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Submit
            </button>
        </div>
    </div> 
    
</template>

<style scoped>

</style>