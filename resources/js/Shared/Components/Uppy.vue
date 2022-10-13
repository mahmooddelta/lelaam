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
import Noty from 'noty';
// Styles
import '@uppy/core/dist/style.min.css';
import '@uppy/dashboard/dist/style.min.css';
import '@uppy/image-editor/dist/style.min.css'
import XHRUpload from "@uppy/xhr-upload";
import Webcam from "@uppy/webcam";

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
    autoOpenFileEditor: true,
    hideCancelButton: true,
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
    // uppy.use(Form, {
    //     id: props.formId,
    //     target: props.formId,
    //     resultName: 'images',
    //     getMetaFromForm: true,
    //     addResultToForm: true,
    //     submitOnSuccess: false,
    //     triggerUploadOnSubmit: false,
    // })
});

uppy.use(Webcam, {
    onBeforeSnapshot: () => Promise.resolve(),
    countdown: false,
    modes: [
        'video-audio',
        'video-only',
        'picture',
    ],
    mirror: true,
    showVideoSourceDropdown: false,
    /** @deprecated Use `videoConstraints.facingMode` instead. */
    facingMode: 'user',
    videoConstraints: {
        facingMode: 'user',
    },
    preferredImageMimeType: null,
    preferredVideoMimeType: null,
    showRecordingLength: false,
    mobileNativeCamera: true,
    locale: {},
})
const uploadRoute = '/attachment/upload';

uppy.use(XHRUpload, {
    limit: 5,
    endpoint: uploadRoute,
    formData: true,
    fieldName: 'file',
    headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // from <meta name="csrf-token" content="{{ csrf_token() }}">
    }
})
uppy.on('complete', (event) => {
    if (event.successful[0] !== undefined) {
        // TODO: v-model this to form data that is being passed
        const id = event.successful[0].response.body.uuid;
    }
});

const notify = (type, text) => {
    new Noty({
        text,
        type,
        layout: 'top',
        theme: 'mint',
        timeout: 3000,
    }).show();
};

onBeforeUnmount(() => {
    uppy.close();
})
</script>
