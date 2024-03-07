<script setup>
import PostItem from '@/Components/app/PostItem.vue'

const post1 = {
    user: {
        id: 1,
        avatar: 'https://randomuser.me/api/portraits/men/60.jpg',
        name: 'John Smith'
    },
    group: null,
    attachments: [
        {
            id: 1,
            name: 'test.png',
            url:  'https://source.unsplash.com/random/300×300',
            mime:  'image/png',

        },
        {
            id: 2,
            name: 'test2.png',
            url:  'https://source.unsplash.com/random/300×300',
            mime:  'image/png',

        },
        {
            id: 3,
            name: 'MyDocument.docx',
            url:  '#',
            mime:  'application/msword',

        },
    ],
    body: `
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?</p>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?</p>
    
    `,
    created_at: '2023-11-19 15:12'
}
const post2 = {
    user: {
        id: 2,
        avatar: 'https://randomuser.me/api/portraits/women/60.jpg',
        name: 'Jane Smith'
    },
    group: {
        id: 1,
        name: "Laravel Developers"
    },
    body: `
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?</p>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem sed necessitatibus est?</p>
    
    `,
    created_at: '2023-11-20 15:12'
}
</script>

<template>
    <div>
        <div class="">
            <PostItem :post="post1"/>
            <PostItem :post="post2"/>
        </div>
    </div> 
    
</template>

<style scoped>

</style>