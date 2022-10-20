<script setup>
import {ref} from "vue";

defineProps({
    title: {
        type: String,
        default: 'Title'
    }
})
const visible = ref(false)
</script>

<template>
    <div class="border-2 border-primary-300 rounded-box my-2 overflow-hidden">
        <section class="flex justify-between items-center bg-base-300" @click="visible = !visible">
            <div class="collapse-title text-xl font-medium" v-text="title"></div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 :class="visible ? 'rotate-180' : ''"
                 stroke="currentColor" class="w-8 h-8 mr-3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5"/>
            </svg>
        </section>
        <transition
            enter-from-class="translate-y-[150%] opacity-0"
            enter-active-class="transition duration-300"
        >
            <div v-if="visible" class="pb-8 pt-4 bg-base-200">
                <slot/>
            </div>
        </transition>
    </div>
</template>
