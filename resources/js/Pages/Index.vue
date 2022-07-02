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
    <div class="min-h-fit bg-base-200 py-10">
        <div class="w-full text-center">
            <h1 class="text-5xl font-bold text-primary-500 hover:no-underline underline decoration-solid">
                خرید و فروش بی واسطه
            </h1>
            <h4 class="py-6 hover:underline hover:decoration-solid">
                خرید و فروش هر آنچه به فکرت میرسد!
            </h4>
            <!-- Top Categories -->
            <TopCategories :categories="categories"/>
            <!-- Latest Ads -->
            <LatestAds :ads="ads.data"/>
        </div>
    </div>
</template>
