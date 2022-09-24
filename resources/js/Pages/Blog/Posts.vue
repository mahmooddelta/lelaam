<script setup>

import Container from "../../Shared/Components/Container.vue";
import BlogPost from "../../Shared/Components/BlogPost.vue";
import BlogFilters from "../../Shared/BlogFilters.vue";
import Pagination from "../../Shared/Components/Pagination.vue";
import useFilters from "../../Composables/useFilters";

const props = defineProps({
    posts: Object,
    categories: Object,
    routeResourceName: {
        type: String,
        required: true,
    },
    filters: Object,
})
const {filters, isLoading} = useFilters({
    filters: props.filters,
    routeResourceName: props.routeResourceName,
});

</script>

<template>
    <Head title="پست های بلاگ لیلام"/>
    <Container>
        <div class="w-full">
            <h1 class="text-5xl font-bold pb-4 text-center">
                پست ها
            </h1>
            <section class="w-full">
                <BlogFilters :categories="categories" :filters="filters" v-model="filters"/>
            </section>
            <div v-if="posts.data && posts.data.length > 0"
                 class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 md:gap-12 lg:gap-20 w-full justify-items-center">
                <template v-for="post in posts.data" :key="post.id">
                    <BlogPost :item="post" class="my-4"/>
                </template>
            </div>
            <div v-else class="my-12">
                <h1 class="text-4xl text-center font-bold">
                    متاسفیم. پست بلاگی با فیلتر شما پیدا نشد!
                </h1>
            </div>
            <Pagination :links="posts.meta.links"/>
        </div>
    </Container>
</template>
