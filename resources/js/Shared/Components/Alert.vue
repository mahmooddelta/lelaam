<template>
    <div class="fixed z-40 px-16 py-8" v-if="$page.props.flash.body && show">
        <div class="flex items-center justify-end max-w-3xl alert shadow-lg" :class="alertType">
            <div class="flex items-center">
                <svg v-if="$page.props.flash.type === 'success'" xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 mx-4 mr-2 w-6 h-6"
                     fill="none"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <svg v-else-if="$page.props.flash.type === 'info'" xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 mx-4 mr-2 w-6 h-6"
                     fill="none"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <svg v-else-if="$page.props.flash.type === 'warning'" xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 mx-4 mr-2 w-6 h-6"
                     fill="none"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
                <svg v-else xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 mx-4 mr-2 w-6 h-6"
                     fill="none"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div class="py-4 text-white text-sm font-medium">{{ $page.props.flash.body }}</div>
            </div>
            <button type="button" class="group mr-2 p-2" @click="show = false">
                <svg class="block w-2 h-2 fill-green-800 group-hover:fill-white" xmlns="http://www.w3.org/2000/svg" width="235.908" height="235.908"
                     viewBox="278.046 126.846 235.908 235.908">
                    <path
                        d="M506.784 134.017c-9.56-9.56-25.06-9.56-34.62 0L396 210.18l-76.164-76.164c-9.56-9.56-25.06-9.56-34.62 0-9.56 9.56-9.56 25.06 0 34.62L361.38 244.8l-76.164 76.165c-9.56 9.56-9.56 25.06 0 34.62 9.56 9.56 25.06 9.56 34.62 0L396 279.42l76.164 76.165c9.56 9.56 25.06 9.56 34.62 0 9.56-9.56 9.56-25.06 0-34.62L430.62 244.8l76.164-76.163c9.56-9.56 9.56-25.06 0-34.62z"/>
                </svg>
            </button>
        </div>
    </div>
</template>

<script setup>
import {computed, ref, watch} from 'vue';
import {usePage} from "@inertiajs/inertia-vue3";

const show = ref(true);
const alertType = computed(() => {
    if (usePage().props.value.flash) {
        if (usePage().props.value.flash.type === 'success')
            return 'alert-success';
        else if (usePage().props.value.flash.type === 'info')
            return 'alert-info';
        else if (usePage().props.value.flash.type === 'warning')
            return 'alert-warning';
        else
            return 'alert-error';
    } else
        return '';
})
watch(usePage().props.value.flash, () => {
    show.value = true
}, {deep: true})
</script>
