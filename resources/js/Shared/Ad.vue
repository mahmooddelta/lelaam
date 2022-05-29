<script setup>
import {computed} from "vue";

const props = defineProps({
    ad: Object,
})
const price = computed(() => {
    return props.ad.price == null ? `<b class="text-bold">توافقی</b>` : `<b>${props.ad.price}</b> ${props.ad.currency}`;
})
</script>

<template>
    <Link class="card card-side bg-base-100 shadow-xl my-2 text-right border-2 border-primary-500 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-100 duration-300 hover:border-1 hover:shadow-2xl" :href="route('ad.show', { ad: ad.slug })">
        <figure><img :src="ad.thumb" :alt="`${ad.name} image`" class="w-32 object-contain pl-2 rounded-md"></figure>
        <div class="card-body">
            <h2 class="font-bold text-primary text-xl" v-html="ad.title"></h2>
            <p v-html="price"></p>
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
