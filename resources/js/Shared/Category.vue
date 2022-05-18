<script setup>
defineProps({
    category: Object,
})
</script>

<template>
    <div class="w-full card card-side bg-base-300 shadow-xl my-2">
        <div class="card-body text-center">
            <h2 class="font-bold text-lg" v-html="category.name"></h2>
            <p class="text-sm" v-text="category.ads_count + ' آگهی '"></p>
            <div class="card-actions justify-center my-2">
                <Link :href="route('ads', { category: category.slug })" class="btn btn-primary btn-sm">دیدن تمام آگهی ها</Link>
            </div>
        </div>
    </div>
</template>
