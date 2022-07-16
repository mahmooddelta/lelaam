<script setup>
import {Splide, SplideSlide} from '@splidejs/vue-splide';

const props = defineProps({
    images: {
        type: Object,
        default: {},
    },
    modelData: Object,
})

const options = {
    gap: '1rem',
    paginationDirection: 'rtl',
    direction: 'rtl',
    rewind: props.images.length > 1,
    autoplay: props.images.length > 1,
    type: props.images.length > 1 ? 'loop' : 'slide',
    drag: props.images.length > 1,
    keyboard: props.images.length > 1,
    pagination: props.images.length > 1,
    paginationKeyboard: props.images.length > 1,
    arrows: props.images.length > 1,
    lazyLoad: 'nearby',
}
</script>

<template>
    <Splide :options="options" :has-track="true" aria-label="تصاویر آگهی"
            class="w-full max-h-[34rem] order-first lg:order-last pt-4 lg:py-0 mb-12 md:mb-0">
        <SplideSlide v-if="images.length === 1"
                     :id="images[0].uuid">
            <img :src="images[0].url" :data-splide-lazy="images[0].url"
                 :alt="modelData.title + '_image_' + images[0].uuid"
                 class="rounded-lg w-full object-cover" loading="lazy"/>
        </SplideSlide>
        <SplideSlide v-if="images.length > 1"
                     v-for="image in images"
                     :key="image.uuid"
                     :id="image.uuid">
            <img :src="image.url" :data-splide-lazy="image.url" :alt="modelData.title + '_image_' + image.uuid"
                 class="rounded-lg w-full object-cover" loading="lazy"/>
        </SplideSlide>
        <SplideSlide v-else>
            <img :src="modelData.thumb" :data-splide-lazy="modelData.thumb" alt="No Image Placeholder"
                 loading="lazy"
                 class="rounded-lg object-cover w-full"/>
        </SplideSlide>
    </Splide>
</template>
