<script setup>
defineProps({
    ad: Object,
})
</script>

<template>
    <Link class="card card-side bg-base-100 shadow-xl my-2 text-right border-2 border-primary-500" :href="route('ad.show', { ad: ad.slug })">
        <figure><img :src="ad.thumb" :alt="`${ad.name} image`" class="w-32 object-contain pl-2 rounded-md"></figure>
        <div class="card-body">
            <h2 class="font-bold text-primary text-xl" v-html="ad.title"></h2>
            <p v-html="`<b>${ad.price}</b> ${ad.currency}`"></p>
            <p>
                {{ ad.created_at }}
                در
                {{ ad.district }}
                ولایت
                {{ ad.state }}
            </p>
        </div>
    </Link>
</template>
