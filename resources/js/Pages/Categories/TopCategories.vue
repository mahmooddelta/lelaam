<script setup>
defineProps({
    categories: Object,
})
</script>

<template>
    <section class="w-full grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 xs:grid-cols-4 gap-4 px-4">
        <div
            class="card card-side bg-base-100 shadow-xl my-2 text-right border-2 border-primary-500 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-100 duration-300 hover:border-1 hover:shadow-2xl"
            v-for="category in categories" :key="category.id">
            <div class="card-body text-center">
                <h2 class="text-2xl font-bold" v-html="category.name"></h2>
                <p class="text-sm mb-2" v-text="`${(category.ads_count || 0)} آگهی جدید `"></p>
                <section class="w-full h-32">
                    <Link :href="route('ads', child.slug)" v-for="child in category.children" :key="child.id" class="ml-1">
                        <span class="badge badge-info p-3 my-1" v-html="child.name"></span>
                    </Link>
                </section>
                <div class="card-actions justify-center mt-6">
                    <Link :href="route('ads', category.slug)"
                          class="btn btn-primary btn-sm">دیدن تمام آگهی ها
                    </Link>
                </div>
            </div>
        </div>
    </section>
</template>
