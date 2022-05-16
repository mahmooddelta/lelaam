<template>
    <section class="w-full p-4 ">
        <form @submit.prevent="filter" class="bg-base-100 rounded-lg ">
            <div class="flex justify-center">
                <Input placeholder="جستجو..." :model-value="search"/>
                <v-select class="mx-2 w-full max-w-xs" placeholder="دسته بندی" :value="category" :options="categories" label="name"
                          :reduce="(option) => option.slug"
                          v-model="category"/>
                <v-select class="mx-2 w-full max-w-xs" :value="state" placeholder="ولایت"
                          :options="states"
                          label="name" :reduce="(option) => option.id" v-model="state"/>
                <v-select v-if="states.length > 0" :value="districts" class="mx-2 w-full max-w-xs" placeholder="ناحیه" :options="districts" label="name"
                          :reduce="(option) => option.id"
                          v-model="district"/>
                <button class="btn btn-outline btn-primary gap-2 mx-2 ring-primary">
                    جستجو
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>
            </div>
        </form>
    </section>
</template>
<script setup>

import Input from "./Form/Input";
import {ref, watch} from "vue";
import {Inertia} from "@inertiajs/inertia";

const search = ref('');
const category = ref(null)
const state = ref(null)
const district = ref(null)
const filter = () => {
    let search = this.search.value;
    let categories = this.categories.value;
};

defineProps({
    categories: Object,
    states: Object,
    districts: Object,
})

watch(state, (value) => {
    Inertia.get(route('ads'), {'state': value}, {
        preserveScroll: true,
        preserveState: true,
        replace: true,
    });
});

</script>
