<script setup>
defineProps({
    categories: Object,
})
</script>

<template>
    <section class="w-full grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 xs:grid-cols-4 gap-4 px-4 text-center">
        <div
            class="card card-side bg-base-100 shadow-xl my-2 text-right border-2 border-primary-500 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-100 duration-300 hover:border-1 hover:shadow-2xl"
            v-for="category in categories" :key="category.id">
            <div class="card-body">
                <div class="flex justify-between">
                    <h2 class="card-title" v-html="category.name"></h2>
                    <div class="badge badge-info text-sm">
                        (
                        {{ category.ads_count ?? 0 }}
                        آگهی جدید
                        )
                    </div>
                </div>
                <section class="w-full h-32">
                    <div v-for="child in category.children" :key="child.id">
                        <div class="badge badge-info" v-html="child.name"></div>
                    </div>
                </section>
                <div class="card-actions justify-end">
                    <Link v-if="category.ads_count > 0" :href="route('ads', category.slug)"
                          class="btn btn-primary btn-sm">دیدن تمام آگهی ها
                    </Link>
                </div>
            </div>
        </div>
    </section>
</template>
