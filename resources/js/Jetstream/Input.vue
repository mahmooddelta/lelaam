<script setup>
import {onMounted, ref} from 'vue';

defineProps({
    modelValue: String,
    placeholder: String,
    error: null,
    type: {
        type: String,
        default: 'text'
    },
    id: {
        type: String,
        default: 'input',
    }
});

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({focus: () => input.value.focus()});
</script>

<template>
    <input
        :id="id"
        ref="input"
        :type="type"
        :placeholder="placeholder"
        class="input input-bordered bg-adaptable block w-full"
        :class="{'input-error': error}"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
    >
    <div v-if="error" class="text-red-500 text-sm my-2"
         v-text="error"></div>
</template>
