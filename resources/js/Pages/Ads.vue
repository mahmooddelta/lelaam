<script setup>

import Filters from "../Shared/Filters";
import Ad from "../Shared/Ad";
import Pagination from "../Shared/Components/Pagination";
import useFilters from "../Composables/useFilters";

const props = defineProps({
    categories: Object,
    states: Object,
    districts: Object,
    ads: Object,
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
    <Head title="همه آگهی ها"/>
    <section class="w-full">
        <Filters :categories="categories" :states="states" :districts="districts" :filters="filters" v-model="filters"/>
    </section>
    <section class="w-full text-center my-4">
        <section class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xs:grid-cols-4 gap-4 px-4">
            <Ad v-for="ad in ads.data" :key="ad.id" :ad="ad"/>
        </section>
        <div class="divider"></div>
        <Pagination :links="ads.meta.links"/>
    </section>
</template>
