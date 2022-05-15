<script setup>
defineProps({
    ads: Object,
})
</script>

<template>
    <!-- Ads -->
    <h2 class="text-primary-500 text-4xl my-6 underline decoration-solid">جدید ترین آگهی ها</h2>
    <section class="w-full grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 xs:grid-cols-4 gap-4 px-4">
        <div class="card card-side bg-base-100 shadow-xl my-2 text-right" v-for="ad in ads" :key="ad.id">
            <figure><img :src="ad.thumb" :alt="`${ad.name} image`" class="w-32 object-contain"></figure>
            <div class="card-body">
                <h2 class="font-bold text-primary text-xl" v-html="ad.title"></h2>
                <p v-html="`<b>${ad.price}</b> ${ad.currency}`"></p>
                <p v-html="ad.created_at + ' در ' + ad.district "></p>
            </div>
        </div>
    </section>
    <Link :href="route('ads')" class="btn btn-primary shadow-xl mt-6">
        دیدن تمام آگهی ها
    </Link>
</template>
