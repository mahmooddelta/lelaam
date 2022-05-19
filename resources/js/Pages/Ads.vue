<script setup>

import Filters from "../Shared/Filters";
import Ads from "../Shared/Ads";

defineProps({
    categories: Object,
    states: Object,
    districts: Object,
    ads: Object,
})
</script>

<template>
    <Head title="همه آگهی ها"/>
    <section class="w-full">
        <Filters :categories="categories" :states="states" :districts="districts"/>
    </section>
    <section class="w-full text-center my-4">
        <Ads :ads="ads"/>
    </section>
</template>
