<script setup>
defineProps({
  category: Object,
});
</script>

<template>
  <div
    class="w-full my-2 text-right transition duration-300 ease-in-out delay-150 border-2 shadow-xl card card-side bg-base-100 border-primary-500 hover:-translate-y-1 hover:scale-100 hover:border-1 hover:shadow-2xl"
  >
    <div class="text-center card-body">
      <h2 class="flex items-center justify-center text-xl font-bold">
        <i
          class="h-6 mr-1 text-center fas"
          :class="category.icon === '' ? 'fa-list' : category.icon"
        ></i>
        {{ category.name }}
      </h2>
      <p class="text-sm" v-text="`${category.ads_count || 0} آگهی جدید `"></p>
      <div class="justify-center my-2 card-actions">
        <Link
          :href="route('ads', { category: category.slug })"
          class="btn btn-primary btn-sm"
          >دیدن تمام آگهی ها</Link
        >
      </div>
    </div>
  </div>
</template>
