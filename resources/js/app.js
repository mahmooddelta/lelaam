import VueSelect from "vue-select";
import {createApp, h} from 'vue';
import {createInertiaApp, Head, Link} from '@inertiajs/inertia-vue3';
import {InertiaProgress} from '@inertiajs/progress';
import Layout from './Layouts/Layout';
// Media Library
import {MediaLibraryAttachment} from '@spatie/media-library-pro-vue3-attachment';
// Import the functions you need from the SDKs you need
import {initializeApp} from "firebase/app";
import {getAnalytics} from "firebase/analytics";
// Toast
import Toast, {POSITION} from 'vue-toastification'

require('./bootstrap');

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
    apiKey: "AIzaSyBSMj80wutV8V9xN7Kzl_sIgaB11FFYfH8",
    authDomain: "lelaam-42896.firebaseapp.com",
    projectId: "lelaam-42896",
    storageBucket: "lelaam-42896.appspot.com",
    messagingSenderId: "606275294671",
    appId: "1:606275294671:web:a2679e3c18de34c23deeba",
    measurementId: "G-N970EG7BPE"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);
const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: async name => {
        const page = (await import(`./Pages/${name}.vue`)).default
        page.layout = page.layout || Layout
        return page
    },
    setup({el, app, props, plugin}) {
        return createApp({render: () => h(app, props)})
            .use(plugin)
            .component('Head', Head)
            .component('Link', Link)
            .component('v-select', VueSelect)
            .component('media-library-attachment', MediaLibraryAttachment)
            .mixin({methods: {route}})
            .use(Toast, {
                position: POSITION.TOP_RIGHT,
                rtl: true,
            })
            .mount(el);
    },
});

InertiaProgress.init({color: '#4B5563'});
