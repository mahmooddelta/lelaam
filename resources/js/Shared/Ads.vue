<script setup>
import Ad from './Ad'
import Pagination from "./Components/Pagination";

defineProps({
    ads: Object,
})
</script>

<template>
    <section class="w-full grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 xs:grid-cols-4 gap-4 px-4">
        <Ad v-for="ad in ads.data" :key="ad.id" :ad="ad"/>
    </section>
    <div class="divider"></div>
    <Pagination :links="ads.meta.links"/>
</template>
