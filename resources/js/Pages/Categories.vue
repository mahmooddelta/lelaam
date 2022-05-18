<script setup>
import Category from "../Shared/Category";

defineProps({
    categories: Object,
})
</script>

<template>
    <h1 class="text-5xl text-center text-primary-500 underline my-4">دسته بندی ها</h1>
    <section class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 xs:grid-cols-4 gap-4 px-10">
        <Category v-for="category in categories" :key="category.id" :category="category"/>
    </section>
</template>
