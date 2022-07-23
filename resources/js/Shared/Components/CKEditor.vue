<template>
    <CKEditor v-if="IsBrowser && CKEditorInline"
              class="rounded-lg"
              :class="{'input-error': errors}"
              :editor="CKEditorInline"
              :config="config"
              :model-value="modelValue"
              @input="$emit('update:modelValue', $event)"
              :disabled="disabled"
              tag-name="textarea"
    ></CKEditor>
</template>

<script>
import {defineAsyncComponent, ref} from 'vue';

export default {
    name: "RichEditor",
    components: {
        CKEditor: defineAsyncComponent(() => {
            return import('@ckeditor/ckeditor5-vue/dist/ckeditor')
                .then(module => module.component)
        })
    },
    props: {
        errors: Object,
        modelValue: String,
        disabled: Boolean,
    },
    emits: ['update:modelValue'],
    data() {
        return {
            config: {
                language: 'fa',
                toolbar: [
                    'bold', 'italic', '|',
                    'bulletedList', 'numberedList', '|',
                    'blockQuote', '|',
                    'outdent', 'indent', '|',
                    'undo', 'redo', '|',
                ],
            }
        }
    },
    setup() {
        const IsBrowser = typeof window !== 'undefined';
        let CKEditorInline = ref(null);

        if (IsBrowser) {
            import('@ckeditor/ckeditor5-build-classic')
                .then(e => CKEditorInline.value = e.default)
        }

        return {IsBrowser, CKEditorInline}
    },
};
</script>
