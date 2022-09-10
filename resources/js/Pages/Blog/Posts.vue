<script setup>

import Container from "../../Shared/Components/Container.vue";
import BlogPost from "../../Shared/Components/BlogPost.vue";
import Pagination from "../../Shared/Components/Pagination.vue";

defineProps({
    posts: Object,
})
</script>

<template>
    <Head title="پست های بلاگ لیلام"/>
    <Container>
        <div class="w-full">
            <h1 class="text-5xl font-bold pb-4 text-center">
                پست ها
            </h1>
            <div v-for="post in posts.data" :key="post.id" class="flex flex-row w-full">
                <BlogPost :item="post"/>
            </div>
            <Pagination :links="posts.meta.links"/>
        </div>
    </Container>
</template>
