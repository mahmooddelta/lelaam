<script setup>
defineProps({
    title: {
        type: String,
        default: 'Title'
    }
})
</script>

<template>
    <div tabindex="0" class="collapse collapse-arrow border-2 border-primary-300 rounded-box my-2 bg-base-300">
        <input type="checkbox"/>
        <div class="collapse-title text-xl font-medium" v-text="title"></div>
        <div class="collapse-content">
            <slot/>
        </div>
    </div>
</template>
