<script setup>
import {ref, watch} from "vue";

const props = defineProps({
    modelValue: {
        type: Object,
        default: () => ({}),
    },
    categories: Object,
    filters: Object,
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
</script>
<template>
    <form class="p-4 rounded-lg">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input
                class="input input-bordered bg-adaptable"
                v-model="filters.search"
                placeholder="جستجو..."
            />
            <v-select placeholder="دسته بندی"
                      label="name"
                      :options="$props.categories.data"
                      :reduce="(option) => option.slug"
                      v-model="filters.category"/>
        </div>
        <!-- Sorts -->
        <section class="py-4 flex justify-between items-center">
            <h2 class="text-3xl w-full hidden md:inline-block">همه پست ها</h2>
            <div class="flex flex-col md:flex-row md:justify-end shrink-0 w-full md:w-fit">
                <select name="sorts" id="sorts" class="select select-bordered w-full md:w-fit" v-model="filters.sortBy"
                        placeholder="مرتب سازی بر اساس">
                    <option selected disabled>مرتب سازی بر اساس</option>
                    <option value="newest">جدید ترین</option>
                    <option value="oldest">قدیمی ترین</option>
<!--                    <option value="mostView">بالا ترین قیمت</option>-->
                </select>
            </div>
        </section>
    </form>
</template>
