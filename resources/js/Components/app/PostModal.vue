<script setup>
  import { computed, onMounted, ref, watch } from 'vue'
  import {
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogPanel,
    DialogTitle,
  } from '@headlessui/vue'
  import InputTextArea from '@/Components/InputTextArea.vue'
  import PostUserHeader from '@/Components/app/PostUserHeader.vue'
  import {XMarkIcon, PaperClipIcon, CheckBadgeIcon} from '@heroicons/vue/24/solid'
  import { useForm } from '@inertiajs/vue3'
  import ClassicEditor from '@ckeditor/ckeditor5-build-classic'
  import { isImage } from '@/helpers.js'

  const editor = ClassicEditor;
  const editorConfig = {
    toolbar: [ 'heading', '|', 'bold', 'italic', '|',  'link', '|', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote'],
  }

  const props = defineProps({
    post: {
        type: Object,
        required: true
    },
    modelValue: Boolean
  })


//   file: FILE,
//   url: '',
//   size: 
  const attachmentFiles = ref([])

    const form = useForm({
        id: null,
        body: '',
        attachments: []
    })

    const show = computed({
        get: () => props.modelValue,
        set: (value) => emit('update:modelValue', value)
    })
  
    const emit = defineEmits(['update:modelValue'])

    watch(() => props.post, () => {
        // console.log('Changed')
        form.id = props.post.id
        form.body = props.post.body
    })

  function closeModal() {
    show.value = false
    resetModal();
  }

  function resetModal() {
    form.reset()
    attachmentFiles.value = []
  }

  function submit() {
    form.attachments = attachmentFiles.value.map(myFile => myFile.file)
        if(form.id) {
            form.put(route('post.update', props.post.id), {
                preserveScroll: true,
                onSuccess: () => {
                    closeModal();

                }
            })
        } else {
        
            form.post(route('post.create'), {
                preserveScroll: true,
                onSuccess: ()=> {
                    closeModal();

                }
            })

        }
    }

  async function onAttachmentChoose($event) {
        console.log($event.target.files)
        for (const file of $event.target.files) {
            const myFile = {
                file,
                url: await readFile(file)
            }
                myFile.src = await readFile(file)
            attachmentFiles.value.push(myFile)
        }
        $event.target.value = null
        console.log(attachmentFiles.value)
    }

    async function readFile(file) {
        return new Promise((res, rej) => {
            if(isImage(file)) {
                const reader = new FileReader();
                reader.onload = () => {
                    res(reader.result)
                }
                reader.onerror = rej
                reader.readAsDataURL(file)
            } else {
                res(null)
            }
        })
    }

    function removeFile(myFile) {
    attachmentFiles.value = attachmentFiles.value.filter(file => file !== myFile);
}

</script>


<template>
    <teleport to='body'>
        <TransitionRoot appear :show="show" as="template">
        <Dialog as="div" @close="closeModal" class="relative z-10">
            <TransitionChild
            as="template"
            enter="duration-300 ease-out"
            enter-from="opacity-0"
            enter-to="opacity-100"
            leave="duration-200 ease-in"
            leave-from="opacity-100"
            leave-to="opacity-0"
            >
            <div class="fixed inset-0 bg-black/25" />
            </TransitionChild>
    
            <div class="fixed inset-0 overflow-y-auto">
            <div
                class="flex min-h-full items-center justify-center p-4 text-center"
            >
                <TransitionChild
                as="template"
                enter="duration-300 ease-out"
                enter-from="opacity-0 scale-95"
                enter-to="opacity-100 scale-100"
                leave="duration-200 ease-in"
                leave-from="opacity-100 scale-100"
                leave-to="opacity-0 scale-95"
                >
                <DialogPanel
                    class="w-full max-w-md transform overflow-hidden rounded bg-white text-left align-middle shadow-xl transition-all"
                >
                    <DialogTitle
                        as="h3"
                        class="flex items-center justify-between py-3 px-4 font-medium bg-gray-100 text-gray-900"
                        >
                        {{form.id ? 'Update Post' : 'Create Post'}}
                        <button  
                            @click = "show=false"
                            class="w-8 h-8 rounded-full outline-none hover:bg-black/5 flex items-center justify-center transition "
                        >
                            <XMarkIcon class="w-4 h-4"/>       
                        </button>
                    </DialogTitle>

                    <div class="p-4">
                        <PostUserHeader :post="post" :show-time="false" class="mb-4" />
                        <ckeditor :editor="editor" v-model="form.body" :config="editorConfig"></ckeditor>

                        <div class="grid gap-3 my-3" :class="[
                            attachmentFiles.length == 1 ? 'grid-cols-1' : 'grid-cols-2'
                        ]">
                            <template v-for="(myFile, ind) of attachmentFiles" >
                                
                                <div class=" group bg-blue-100 aspect-square flex flex-col items-center justify-center text-gray-500 relative">
                                   

                                    <button 
                                        @click="removeFile(myFile)"
                                        class="absolute z-20 right-2 top-2 w-5 h-5 flex items-center justify-center bg-black/30 hover:bg-black/40 text-white rounded-full"
                                    >
                                        <XMarkIcon class="h-5 w-5"/>
                                    </button>

                                    <img  
                                        v-if="isImage(myFile.file)" 
                                        :src="myFile.url" 
                                        alt="" 
                                        class="object-contain aspect-square"
                                    >

                                    <template v-else>
                                        <!-- document -->
                                        <PaperClipIcon class="w-10 h-10 mb-3"/>


                                        <small class="text-center ">{{ myFile.file.name }}</small>
                                    </template>

                                    
                                </div>
                            </template>
                        </div>

                    </div>
    
                    <div class="flex gap-2 py-3 px-4 mb-2">
                        <button
                            type="button"
                            class="relative flex items-center justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 w-full"
                            @click="submit"
                        >
                            <PaperClipIcon class="w-4 h-4 mr-2"/>
                            Attach Files
                            <input @click.stop multiple @change="onAttachmentChoose" type="file" class="opacity-0 absolute left-0 top-0 right-0 bottom-0 ">
                        </button>
                        <button
                            type="button"
                            class="flex items-center justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 w-full"
                            @click="submit"
                        >
                            <CheckBadgeIcon class="w-4 h-4 mr-2"/>
                            Submit
                        </button>
                    </div>
                </DialogPanel>
                </TransitionChild>
            </div>
            </div>
        </Dialog>
        </TransitionRoot>
    </teleport> 
</template>

