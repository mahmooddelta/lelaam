<script setup>
import ClientOnly from '@duannx/vue-client-only'

const props = defineProps({
    modelValue: null,
    errors: null,
    collectionName: String,
});
const mlp_translations = {
    fileTypeNotAllowed: 'شما باید فایل با فرمت type انتخاب کنید',
    tooLarge: 'فایل انتخاب شده بسیار بزرگ است, max',
    tooSmall: 'فایل انتخاب شده بسیار کوچک است, min',
    tryAgain: 'لطفاً دوباره کوشش نمایید',
    somethingWentWrong: 'مشکلی در آپلود شدن فایل پیش آمده است!',
    selectOrDrag: 'فایل را انتخاب یا بکشید',
    selectOrDragMax: 'انتخاب یا کشیدن به تعداد {maxItems} فایل',
    file: {singular: 'فایل', plural: 'فایل ها'},
    anyImage: 'هر نوع تصویر',
    anyVideo: 'هر نوع ویدیو',
    goBack: 'بازگشت',
    dropFile: 'فایل را کشیده و بیاندازید',
    dragHere: 'فایل را اینجا بیاندازید',
    remove: 'حذف',
    download: 'دانلود',
};
const emit = defineEmits(['mediaChanged']);
const onImageChange = (media) => {
    emit('mediaChanged', media);
};
</script>
<template>
    <div>
        <label class="label block flex justify-between mb-2">
            <slot name="label"/>
        </label>
        <client-only>
<!--            <media-library-attachment-->
<!--                :name="collectionName"-->
<!--                @change="onImageChange"-->
<!--                :initial-value="modelValue"-->
<!--                :max-items="5"-->
<!--                :translations="mlp_translations"-->
<!--                :validation-rules="{accept: ['image/jpeg', 'image/png', 'image/jpg'], maxSizeInKB: 5 * 1024, minSizeInKB: 5}"-->
<!--                :validation-errors="errors"-->
<!--                multiple-->
<!--            />-->
        </client-only>
        <div v-if="errors" class="text-red-500 text-sm my-2">{{ errors }}</div>
    </div>
</template>
<script>
import {defineAsyncComponent} from "vue";

export default {
    name: "MlPAttachment",
    components: {
        // MediaLibraryAttachment: defineAsyncComponent(() => {
        //     if (typeof window !== 'undefined') {
        //         return import('@spatie/media-library-pro-vue3-attachment')
        //             .then(module => module.MediaLibraryAttachment)
        //     }
        // })
    },
}
</script>
