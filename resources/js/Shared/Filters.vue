<script setup>
import {ref, watch} from "vue";

const props = defineProps({
    modelValue: {
        type: Object,
        default: () => ({}),
    },
    categories: Object,
    states: Object,
    districts: Object,
});
const emits = defineEmits(["update:modelValue"]);
const filters = ref({...props.modelValue});
watch(
    filters,
    () => {
        emits("update:modelValue", filters.value);
    },
    {
        deep: true,
    }
);
watch(filters.state, (value) => {
    Inertia.get(route('ads'), {'state': value}, {
        preserveScroll: true,
        preserveState: true,
        replace: true,
    });
});
</script>
<template>
    <form class="p-4 rounded-lg">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 gap-4">
            <input
                class="input input-bordered input-transparent"
                v-model="filters.search"
                placeholder="جستجو..."
            />
            <v-select class="" placeholder="دسته بندی" :value="filters.category" :options="categories" label="name"
                      :reduce="(option) => option.slug"
                      v-model="filters.category"/>
            <v-select class="" :value="filters.state" placeholder="ولایت"
                      :options="states"
                      label="name" :reduce="(option) => option.id" v-model="filters.state"/>
            <v-select :value="filters.district" class="" placeholder="ناحیه" :options="districts" label="name"
                      :reduce="(option) => option.id"
                      v-model="filters.district"/>
        </div>
    </form>
</template>
