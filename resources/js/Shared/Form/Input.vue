<script setup>
import {onMounted, ref} from 'vue';

defineProps({
    modelValue: String,
    label: {
        type: String,
        default: 'Input',
    },
    placeholder: {
        type: String,
        default: 'Type here',
    },
    type: {
        type: String,
        default: 'text',
    },
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
    <div class="form-control w-full max-w-xs">
        <label class="label" v-if="label !== 'Input'">
            <span class="label-text" v-html="label"></span>
        </label>
        <input
            class="input input-bordered bg-base-100 w-full max-w-xs"
            :type="type"
            :placeholder="placeholder"
            ref="input"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
        />
    </div>
</template>

