<script setup>
defineProps({
    value: String,
    required: {
        type: Boolean,
        default: false,
    },
    inputId: {
        type: String,
        default: 'input',
    }
});
</script>

<template>
    <label class="label block" :for="inputId">
        <span class="label-text font-bold text-sm"
              :class="{ 'after:content-[\'*\'] after:ml-0.5 after:text-red-500': required }" v-if="value"
              v-text="value"></span>
        <span v-else><slot/></span>
    </label>
</template>
