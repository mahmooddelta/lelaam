<script setup>
import {Swiper, SwiperSlide} from 'swiper/vue';
import {Keyboard, Lazy, Navigation, Pagination, Zoom} from 'swiper';

const modules = [
    Navigation,
    Pagination,
    Lazy,
    Keyboard,
    Zoom,
];
defineProps({
    images: {
        type: Object,
        default: {},
    },
    modelData: Object,
})
</script>

<template>
    <swiper
        :style="{'--swiper-navigation-color': '#fb5858', '--swiper-pagination-color': '#fb5858',}"
        :zoom="true"
        :slidesPerView="1"
        :centeredSlides="true"
        :pagination="{clickable: true,}"
        :keyboard="{enabled: true,}"
        :grabCursor="true"
        :navigation="true"
        :loop="images.length > 0"
        :hashNavigation="{watchState: true,}"
        :lazy="true"
        class="w-full lg:w-[25rem] max-h-[34rem] order-first lg:order-last"
        dir="rtl"
        :modules="modules"
    >
        <swiper-slide
            v-if="images.length > 0"
            v-for="image in images"
            :key="image.uuid"
            :data-hash="image.uuid"
            :id="image.uuid">
            <div class="swiper-zoom-container">
                <img :data-src="image.url" :alt="modelData.title + '_image_' + image.uuid" class="rounded-lg w-full swiper-lazy" loading="lazy"/>
                <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
            </div>
        </swiper-slide>
        <swiper-slide v-else>
            <img :data-src="modelData.thumb" alt="No Image Placeholder" loading="lazy" class="rounded-lg swiper-lazy"/>
        </swiper-slide>
    </swiper>
</template>
