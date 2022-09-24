<script setup>
import {Splide} from '@splidejs/vue-splide';

const props = defineProps({
    images: {
        type: Object,
        default: {},
        required: true,
    },
    customOptions: {
        type: Object,
        default: {},
    }
})

const options = {
    ...{
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
    }, ...props.customOptions,
};
</script>

<template>
    <Splide :options="options" :has-track="true">
        <slot/>
    </Splide>
</template>
