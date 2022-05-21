<script setup>
defineProps({
    ad: Object,
})
</script>

<template>
    <Link class="card card-side bg-base-400 shadow-xl my-2 text-right" :href="route('ad.show', { ad: ad.slug })">
        <figure><img :src="ad.thumb" :alt="`${ad.name} image`" class="w-32 object-contain pr-4 rounded"></figure>
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
