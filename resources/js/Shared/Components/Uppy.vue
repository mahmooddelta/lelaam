<template>
    <section>
        <label for="uploader" class="block font-medium flex justify-between">
            <slot name="label"/>
        </label>
        <dashboard
            id="uploader"
            ref="dashboardContainer"
            :uppy="uppy"
            :plugins="['Form', 'ImageEditor']"
            :props="dashboardProps"
        />
    </section>
</template>
<script setup>
import {Dashboard} from "@uppy/vue";
import Uppy from '@uppy/core';
import ImageEditor from "@uppy/image-editor";
import Persian from '@uppy/locales/lib/fa_IR';
import {onBeforeUnmount, onMounted} from "vue";
import Form from '@uppy/form'
import Noty from 'noty';
// Styles
import '@uppy/core/dist/style.min.css';
import '@uppy/dashboard/dist/style.min.css';
import '@uppy/image-editor/dist/style.min.css'

const props = defineProps({
    maxFileSizeInBytes: {
        type: Number,
        required: true
    },
    minNumberOfFiles: {
        type: Number,
        required: true
    },
    maxNumberOfFiles: {
        type: Number,
        required: true
    },
    formId: {
        type: String,
        required: true,
    },
    uploadRoute: {
        type: String,
        required: true,
        default: '/store',
    },
});
const dashboardProps = {
    hideUploadButton: true,
    inline: true,
    height: 400,
    replaceTargetContent: true,
    showProgressDetails: true,
    browserBackButtonClose: true,
    theme: "auto",
};
const uppy = new Uppy({
    debug: true,
    autoProceed: true,
    restrictions: {
        maxFileSize: props.maxFileSizeInBytes,
        minNumberOfFiles: props.minNumberOfFiles,
        maxNumberOfFiles: props.maxFileSizeInBytes,
        allowedFileTypes: ['image/*',],
        multipleResults: true
    },
    locale: Persian,
}).use(ImageEditor, {});

onMounted(() => {
    uppy.use(Form, {
        id: props.formId,
        target: props.formId,
        resultName: 'images',
        getMetaFromForm: true,
        addResultToForm: true,
        submitOnSuccess: false,
        triggerUploadOnSubmit: false,
    })
})

// uppy.use(XHRUpload, {
//         limit: 10,
//         endpoint: '/file/upload',
//         formData: true,
//         fieldName: 'file',
//         headers: {
//             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // from <meta name="csrf-token" content="{{ csrf_token() }}">
//         }
//     })
//     uppy.on('complete', (event) => {
//         if (event.successful[0] !== undefined) {
//             payload = event.successful[0].response.body.path;
//
//             disabled = false;
//         }
//     });

const notify = (type, text) => {
    new Noty({
        text,
        type,
        layout: 'top',
        theme: 'mint',
        timeout: 3000,
    }).show();
};
const resetUploader = () => {
    uppy.reset();

    return this;
};
onBeforeUnmount(() => {
    uppy.close();
})
// const confirmUpload = () => {
//     if (payload) {
//         axios.post(uploadRoute, {file: payload})
//             .then(({data}) => {
//                 updatePreviewPath(data)
//                     .resetUploader()
//                     .notify('success', 'تصویر (تصاویر) موفقانه آپلود شد.');
//             })
//             .catch(err => {
//                 notify('error', 'آپلود موفق نبود!')
//                 resetUploader();
//             })
//         ;
//     } else notify('warning', `شما هیچ فایلی را انتخاب نکرده اید!`);
// }
</script>
