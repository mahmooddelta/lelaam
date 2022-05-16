<script setup>

import Filters from "../Shared/Filters";
import LatestAds from "./Ad/LatestAds";

defineProps({
    categories: Object,
    states: Object,
    districts: Object,
    ads: Object,
})
</script>

<template>
    <section class="w-full">
        <Filters :categories="categories" :states="states" :districts="districts"/>
    </section>
    <section class="w-full text-center my-4">
        <LatestAds :ads="ads.data"/>
    </section>
</template>
