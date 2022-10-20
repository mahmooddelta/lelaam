<template>
    <section>
        <label for="uploader" class="label block">
            <span class="label-text text-sm flex justify-between">
                <slot name="label"/>
            </span>
        </label>
        <dashboard
            id="uploader"
            ref="dashboardContainer"
            :uppy="uppy"
            :plugins="['ImageEditor', 'Webcam']"
            :props="dashboardProps"
            class="w-full"
        />
    </section>
</template>
<script setup>
import {Dashboard} from "@uppy/vue";
import Uppy from '@uppy/core';
import ImageEditor from "@uppy/image-editor";
import Persian from '@uppy/locales/lib/fa_IR';
import Compressor from "@uppy/compressor";
import {onBeforeUnmount} from "vue";
import Webcam from "@uppy/webcam";
// Styles
import '@uppy/core/dist/style.min.css';
import '@uppy/dashboard/dist/style.min.css';
import '@uppy/image-editor/dist/style.min.css'
import '@uppy/webcam/dist/style.min.css'
import isMobile from "is-mobile";

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
    media: {
        type: Object,
        default: {},
    }
});

const dashboardProps = {
    hideUploadButton: true,
    inline: true,
    height: 320,
    replaceTargetContent: true,
    showProgressDetails: true,
    browserBackButtonClose: true,
    theme: "auto",
    hideCancelButton: true,
};
const uppy = new Uppy({
    autoProceed: true,
    restrictions: {
        maxFileSize: props.maxFileSizeInBytes,
        minNumberOfFiles: props.minNumberOfFiles,
        maxNumberOfFiles: props.maxFileSizeInBytes,
        allowedFileTypes: ['image/*',],
        multipleResults: true
    },
    locale: Persian,
});
// ImageEditor
uppy.use(ImageEditor, {});
// Webcam
uppy.use(Webcam, {
    onBeforeSnapshot: () => Promise.resolve(),
    countdown: false,
    modes: [
        'picture',
    ],
    mirror: true,
    mobileNativeCamera: isMobile({tablet: true}),
    locale: {
        strings: {
            pluginNameCamera: 'کمره',
            noCameraTitle: 'کمره در دسترس نیست.',
            noCameraDescription: 'برای گرفتن عکس با یک دستگاه کمره دار متصل کنید.',
            recordingStoppedMaxSize: 'ثبت با نزدیک شدن به محدودیت سایز متوقف شد.',
            submitRecordedFile: 'ثبت فایل ثبت شده',
            discardRecordedFile: 'صرف نظر از فایل ثبت شده',
            // Shown before a picture is taken when the `countdown` option is set.
            smile: 'لبخند!',
            // Used as the label for the button that takes a picture.
            // This is not visibly rendered but is picked up by screen readers.
            takePicture: 'گرفتن عکس',
            // Used as the label for the button that starts a video recording.
            // This is not visibly rendered but is picked up by screen readers.
            startRecording: 'شروع ثبت ویدیو',
            // Used as the label for the button that stops a video recording.
            // This is not visibly rendered but is picked up by screen readers.
            stopRecording: 'توقف ثبت ویدیو',
            // Used as the label for the recording length counter. See the showRecordingLength option.
            // This is not visibly rendered but is picked up by screen readers.
            recordingLength: '%{recording_length} طول ویدیو',
            // Title on the “allow access” screen
            allowAccessTitle: 'لطفا اجازه استفاده از کمره را بدهید',
            // Description on the “allow access” screen
            allowAccessDescription: 'برای گرفتن عکس یا ثبت ویدیو، لطفاً دسترسی کمره برای این سایت را فعال کنید.',
        }
    },
});
// Compressor
uppy.use(Compressor, {
    quality: 0.7,
    limit: 5,
});

const emit = defineEmits(['fileAdded', 'fileRemoved']);

uppy.on('file-added', (file) => {
    emit('fileAdded', file.data);
})

uppy.on('file-removed', (file, reason) => {
    emit('fileRemoved', file);
})
// Add images to uppy
if (props?.media) {
    for (const media of props?.media) {
        fetch(media.original_url)
            .then((response) => response.blob()) // returns a Blob
            .then((blob) => {
                uppy.addFile({
                    name: media.file_name,
                    type: media.type,
                    data: blob
                })
                emit('fileAdded', blob);
            })
    }
}
onBeforeUnmount(() => {
    uppy.close();
})
</script>
