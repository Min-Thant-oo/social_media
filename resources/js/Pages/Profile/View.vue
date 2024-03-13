<script setup>
  import { computed, ref } from 'vue'
  import { TabGroup, TabList, Tab, TabPanels, TabPanel } from '@headlessui/vue'
  
  import {usePage} from '@inertiajs/vue3';

  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
  import TabItem from '@/Pages/Profile/Partials/TabItem.vue'
  import { Head } from '@inertiajs/vue3';
  import Edit from '@/Pages/Profile/Edit.vue'
  import PrimaryButton from '@/Components/PrimaryButton.vue'

  import { XMarkIcon, CheckCircleIcon, CameraIcon } from '@heroicons/vue/24/solid'
  import { useForm } from '@inertiajs/vue3'
  
  const imagesForm = useForm({
    avatar: null,
    cover: null,
  })
        
  const authUser = usePage().props.auth.user;
  const isMyProfile = computed(() => authUser && authUser.id === props.user.id)
  const coverImageSrc = ref('');
  const avatarImageSrc = ref('');
  const showNotification = ref('true');
  const props = defineProps({
    errors: Object,
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
    success: {
        type: String,
    },
    user: {
      type: Object
    }
});

function onCoverChange(e) {
  console.log(e)
  imagesForm.cover=e.target.files[0]
  if(imagesForm.cover) {
    const reader = new FileReader()
    reader.onload = () => {
      coverImageSrc.value = reader.result;
    }
    reader.readAsDataURL(imagesForm.cover)
  }
}

  function resetCoverImage() {
    imagesForm.cover = null;
    coverImageSrc.value = null;
  }

  function submitCoverImage() {
    console.log(imagesForm.cover)
    imagesForm.post(route('profile.updateImages'), {
      onSuccess: (user) => {
        resetCoverImage()
        setTimeout(() => {
          showNotification.value = false
        }, 3000);
      },

    })
  }

  function onAvatarChange(e) {
    console.log(e)
    imagesForm.avatar=e.target.files[0]
    if(imagesForm.avatar) {
      const reader = new FileReader()
      reader.onload = () => {
        avatarImageSrc.value = reader.result;
      }
      reader.readAsDataURL(imagesForm.avatar)
    }
  }
  

  function resetAvatarImage() {
    imagesForm.avatar = null;
    avatarImageSrc.value = null;
  }

  function submitAvatarImage() {
    console.log(imagesForm.avatar)
    imagesForm.post(route('profile.updateImages'), {
      onSuccess: (user) => {
        resetAvatarImage()
        setTimeout(() => {
          showNotification.value = false
        }, 3000);
      },

    })
  }


</script>


<template>

    <Head title="Profile" />

     <AuthenticatedLayout>

      


      <!-- container or w-[768px] -->
      <div class="max-w-[768px] mx-auto h-full overflow-auto">
        <!-- cover update noti -->
        <div
          v-show="showNotification && success"
          class="my-2 py-2 px-3 font-medium text-sm bg-emerald-500 text-white"
        >
          {{ success }}
        </div>
        <div
          v-if="errors.cover"
          class="my-2 py-2 px-3 font-medium text-sm bg-red-400 text-white"
        >
          {{ errors.cover }}
        </div>


        <div class="relative bg-white">
          <!-- cover image -->
          <div class="group">
            <img 
              :src="coverImageSrc || user.cover_url || '/img/default_cover.jpeg' " 
              alt=""
              class="w-full h-[200px] object-cover"
          >
          <div class="absolute top-2 right-2">
            <button v-if="!coverImageSrc" class="bg-gray-50 hover:bg-gray-100 text-gray-800 py-1 px-2 text-xs flex items-center opacity-0 group-hover:opacity-100 transition-all transform">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
              </svg>

              Update Cover Image
              <input 
                @change = "onCoverChange"
                type="file" 
                class="cursor-pointer w-full opacity-0 absolute left-0 top-0 bottom-0 right-0 "
              >
            </button>
            <div v-else 
                class="flex gap-2 opacity-0 group-hover:opacity-100 transition-all transform
                transition-all transform">
              <button 
                @click="resetCoverImage"
                class="bg-gray-50 hover:bg-gray-100 text-gray-800 py-1 px-2 text-xs flex items-center ">
              <XMarkIcon class="h-6 w-6 mr-2"/>

                Cancel 
            </button>
            <button 
              @click="submitCoverImage"
              class="bg-gray-800 hover:bg-gray-900 text-gray-100 py-1 px-2 text-xs flex items-center ">
              <CheckCircleIcon class="h-6 w-6 mr-2"/>

              Submit
            </button>
                
              
            </div>
          </div>
          </div>

          <!-- avatar -->
          <div class="flex">
            <div class="flex items-center justify-center group/avatar relative -mt-[64px] ml-[48px] w-[128px] h-[128px] rounded-full">
              <img 
                :src="avatarImageSrc || user.avatar_url || '/img/default_avatar.png'" 
                alt="" 
                class="w-full h-full object-cover rounded-full"
              >

                <button 
                  v-if="!avatarImageSrc" 
                  class="absolute left-0 top-0 right-0 bottom-0 flex items-center justify-center bg-black/50 text-gray-200 rounded-full opacity-0 group-hover/avatar:opacity-100 transition-all transform"
                >
                  <CameraIcon class="w-8 h-8"/>

                  <input 
                    @change = "onAvatarChange"
                    type="file" 
                    class="cursor-pointer w-full opacity-0  absolute left-0 top-0 bottom-0 right-0 "
                  >
                </button>
                <div 
                  v-else 
                  class="absolute top-1 right-0 flex flex-col gap-2">
                  <button 
                    @click="resetAvatarImage"
                    class="w-7 h-7 flex items-center justify-center bg-red-500/80 text-white rounded-full">
                  <XMarkIcon class="h-5 w-5"/>

                     
                </button>
                <button 
                  @click="submitAvatarImage"
                  class="w-7 h-7 flex items-center justify-center bg-emerald-500/80 text-white rounded-full">
                  <CheckCircleIcon class="h-5 w-5"/>

                  
                </button>
                    
                  
                </div>
              
            </div>

            <div class="flex justify-between items-center flex-1 p-4">
              <h2 class="font-bold text-lg">{{ user.name }}</h2>
              <!-- <PrimaryButton v-if="isMyProfile">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                </svg>


                Edit Profile
              </PrimaryButton> -->
            </div>
          </div>

        </div>
        
        <div class="border-t">
          <TabGroup>
            <TabList class=" flex bg-white">
              
              <Tab v-slot="{ selected }" as="template">
                <TabItem text="Posts" :selected="selected"/>
              </Tab>
              <Tab v-slot="{ selected }" as="template">
                <TabItem text="Followers" :selected="selected"/>
              </Tab>
              <Tab v-slot="{ selected }" as="template">
                <TabItem text="Following" :selected="selected"/>
              </Tab>
              <Tab v-slot="{ selected }" as="template">
                <TabItem text="Photos" :selected="selected"/>
              </Tab>
              <Tab v-if="isMyProfile" v-slot="{ selected }" as="template">
                <TabItem text="My Profile" :selected="selected"/>
              </Tab>
            </TabList>
      
            <TabPanels class="mt-2">
              <TabPanel class="bg-white p-3 shadow">
                Posts
              </TabPanel>
              <TabPanel class="bg-white p-3 shadow">
                Followers 
              </TabPanel>
              <TabPanel class="bg-white p-3 shadow">
                Followings
              </TabPanel>
              <TabPanel class="bg-white p-3 shadow">
                Photos
              </TabPanel>
              <TabPanel v-if="isMyProfile">
                <Edit :must-verify-email="mustVerifyEmail" :status="status" />
              </TabPanel>
            </TabPanels>
          </TabGroup>
        </div>

    </div>
     </AuthenticatedLayout>


</template>

<style scoped>

</style>
