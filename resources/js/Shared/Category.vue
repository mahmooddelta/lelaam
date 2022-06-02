<script setup>
defineProps({
    category: Object,
})
</script>

<template>
    <div
        class="w-full card card-side bg-base-100 shadow-xl my-2 text-right border-2 border-primary-500 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-100 duration-300 hover:border-1 hover:shadow-2xl">
        <div class="card-body text-center">
            <h2 class="font-bold text-lg" v-html="category.name"></h2>
            <p class="text-sm" v-text="`${(category.ads_count || 0)} آگهی `"></p>
            <div class="card-actions justify-center my-2">
                <Link :href="route('ads', { category: category.slug })" class="btn btn-primary btn-sm">دیدن تمام آگهی ها</Link>
            </div>
        </div>
    </div>
</template>
