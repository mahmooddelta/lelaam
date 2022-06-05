<script setup>
import {ref, watch} from "vue";
import {Inertia} from "@inertiajs/inertia";

const props = defineProps({
    modelValue: {
        type: Object,
        default: () => ({}),
    },
    categories: Object,
    states: Object,
    districts: Object,
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
watch(filters.state, (value) => {
    _.delay(() => {
        Inertia.get(route().current(), {'state': value}, {
            preserveScroll: true,
            preserveState: true,
            replace: true,
        });
    }, 300)
});
</script>
<template>
    <form class="p-4 rounded-lg">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 gap-4">
            <input
                class="input input-bordered bg-adaptable"
                v-model="filters.search"
                placeholder="جستجو..."
            />
            <v-select placeholder="دسته بندی" :value="filters.category" :options="categories" label="name"
                      :reduce="(option) => option.slug"
                      v-model="filters.category"/>
            <v-select :value="filters.state" placeholder="ولایت"
                      :options="states"
                      label="name"
                      :reduce="(option) => option.name"
                      v-model="filters.state"/>
            <v-select :value="filters.district" placeholder="ناحیه" :options="districts"
                      label="name"
                      :reduce="(option) => option.name"
                      v-model="filters.district"/>
        </div>
        <!-- Sorts -->
        <section class="py-4 flex justify-between items-center">
            <h2 class="text-3xl w-full hidden md:inline-block">همه آگهی ها</h2>
            <div class="flex flex-col md:flex-row md:justify-end shrink-0 w-full md:w-fit">
                <div class="form-control order-last md:order-first mt-2 md:mt-0">
                    <label class="label cursor-pointer">
                        <input type="checkbox" checked="checked" class="checkbox checkbox-primary" v-model="filters.hasImages"/>
                        <span class="label-text font-bold ml-2">فقط آگهی های عکس دار</span>
                    </label>
                </div>

                <div class="divider divider-horizontal"></div>

                <select name="sorts" id="sorts" class="select select-bordered w-full md:w-fit" v-model="filters.sortBy"
                        placeholder="مرتب سازی بر اساس">
                    <option selected disabled>مرتب سازی بر اساس</option>
                    <option value="newest">جدید ترین</option>
                    <option value="oldest">قدیمی ترین</option>
                    <option value="highestPrice">بالا ترین قیمت</option>
                    <option value="lowestPrice">کم ترین قیمت</option>
                </select>
            </div>
        </section>
    </form>
</template>
