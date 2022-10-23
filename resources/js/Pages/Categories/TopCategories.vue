<script setup>
import Heroicons from "../../Shared/Components/Heroicons.vue";

defineProps({
    categories: Object,
})
</script>

<template>
    <section class="grid w-full grid-cols-1 gap-4 px-4 md:grid-cols-3 lg:grid-cols-4 xs:grid-cols-4">
        <div
            class="my-2 text-right transition duration-300 ease-in-out delay-150 border-2 shadow-xl card card-side bg-base-100 border-primary-500 hover:-translate-y-1 hover:scale-100 hover:border-1 hover:shadow-2xl"
            v-for="category in categories" :key="category.id">
            <div class="text-center card-body">
                <h2 class="flex items-center justify-center text-xl font-bold">
                    <i
                      class="h-6 mr-1 text-center fas"
                      :class="category.icon === '' ? 'fa-list' : category.icon"
                    ></i>
                    {{ category.name }}
                  </h2>
                <p class="mb-2 text-sm" v-text="`${(category.ads_count || 0)} آگهی جدید `"></p>
                <section class="w-full h-32">
                    <Link :href="route('ads', child.slug)" v-for="child in category.children" :key="child.id"
                          class="ml-1">
                        <span class="p-3 my-1 badge badge-info" v-html="child.name"></span>
                    </Link>
                </section>
                <div class="justify-center mt-6 card-actions">
                    <Link :href="route('ads', category.slug)"
                          class="btn btn-primary btn-sm">دیدن تمام آگهی ها
                    </Link>
                </div>
            </div>
        </div>
    </section>
</template>
