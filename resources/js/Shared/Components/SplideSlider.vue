<script setup>
import {Splide, SplideSlide} from '@splidejs/vue-splide';

defineProps({
    images: {
        type: Object,
        default: {},
    },
    modelData: Object,
})

const options = {
    rewind: true,
    gap: '1rem',
    autoplay: true,
    type: 'loop',
    paginationDirection: 'rtl',
    drag: true,
    lazyLoad: 'nearby',
    keyboard: true,
    paginationKeyboard: true,
    direction: 'rtl',
}
</script>

<template>
    <Splide :options="options" :has-track="true" aria-label="تصاویر آگهی"
            class="w-full max-h-[34rem] order-first lg:order-last my-4 lg:my-4">
        <SplideSlide v-if="images.length > 0"
                     v-for="image in images"
                     :key="image.uuid"
                     :id="image.uuid">
            <img :src="image.url" :data-splide-lazy="image.url" :alt="modelData.title + '_image_' + image.uuid"
                 class="rounded-lg w-full object-cover" loading="lazy"/>
        </SplideSlide>
        <SplideSlide v-else>
            <img :src="modelData.thumb" :data-splide-lazy="modelData.thumb" alt="No Image Placeholder"
                 loading="lazy"
                 class="rounded-lg object-cover"/>
        </SplideSlide>
    </Splide>
</template>
