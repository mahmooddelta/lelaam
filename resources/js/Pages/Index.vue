<script setup>
import LatestAds from "./Ad/LatestAds.vue";
import TopCategories from "./Categories/TopCategories.vue";

defineProps({
    categories: Object,
    ads: Object,
})
</script>

<template>
    <Head title="خانه"/>
    <div class="py-10 min-h-fit bg-base-200">
        <div class="w-full text-center">
            <h1 class="text-4xl font-bold md:text-5xl text-primary-500">
                خرید و فروش بی واسطه
            </h1>
            <h4 class="py-6">
                خرید و فروش هر آنچه به فکرت میرسد!
            </h4>
            <!-- Top Categories -->
            <TopCategories :categories="categories.data"/>
            <!-- Latest Ads -->
            <LatestAds :ads="ads.data"/>
        </div>
    </div>
</template>
