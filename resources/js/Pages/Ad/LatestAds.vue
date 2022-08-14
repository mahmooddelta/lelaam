<script setup>
import Ad from "../../Shared/Ad.vue";

defineProps({
    ads: Object,
})
</script>

<template>
    <!-- Ads -->
    <h2 class="text-primary-500 text-4xl my-6">
        جدید ترین آگهی ها
    </h2>
    <section class="w-full grid grid-cols-1 md:grid-cols-4 lg:grid-cols-4 xs:grid-cols-4 gap-4 px-4">
        <Ad v-for="ad in ads" :key="ad.id" :ad="ad"/>
    </section>
    <Link :href="route('ads')" class="btn btn-primary shadow-xl mt-6">
        دیدن تمام آگهی ها
    </Link>
</template>
