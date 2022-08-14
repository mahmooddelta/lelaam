<script setup>
import Category from "../Shared/Category.vue";
import Pagination from "../Shared/Components/Pagination.vue";

defineProps({
    categories: Object,
})
</script>

<template>
    <Head title="دسته بندی ها"/>
    <h1 class="text-5xl text-center text-primary-500 py-4">دسته بندی ها</h1>
    <section class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 xs:grid-cols-4 gap-4 px-10">
        <Category v-for="category in categories.data" :key="category.id" :category="category"/>
    </section>
    <div class="divider"></div>
    <Pagination :links="categories.meta.links"/>
</template>
