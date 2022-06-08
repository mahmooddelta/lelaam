import {createSSRApp, h} from 'vue';
import {renderToString} from '@vue/server-renderer';
import {createInertiaApp, Head, Link} from '@inertiajs/inertia-vue3';
import createServer from '@inertiajs/server';
import route from 'ziggy';
import Layout from './Layouts/Layout';
// Media Library
import {MediaLibraryAttachment} from "@spatie/media-library-pro-vue3-attachment";

// Import the functions you need from the SDKs you need
import {initializeApp} from "firebase/app";
import {getAnalytics} from "firebase/analytics";
// Toast
import Toast, {POSITION, useToast} from 'vue-toastification'
import VueSelect from "vue-select";

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
window.toast = useToast();

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createServer((page) =>
    createInertiaApp({
        page,
        render: renderToString,
        title: (title) => `${title} - ${appName}`,
        resolve: async name => {
            const page = (await import(`./Pages/${name}.vue`)).default
            page.layout = page.layout || Layout
            return page
        },
        setup({app, props, plugin}) {
            return createSSRApp({render: () => h(app, props)})
                .use(plugin)
                .component('Head', Head)
                .component('Link', Link)
                .component('v-select', VueSelect)
                .component('media-library-attachment', MediaLibraryAttachment)
                .use(Toast, {
                    position: POSITION.TOP_RIGHT,
                    rtl: true,
                })
                .mixin({
                    methods: {
                        route: (name, params, absolute) => {
                            return route(name, params, absolute, {
                                ...page.props.ziggy,
                                location: new URL(page.props.ziggy.url),
                            });
                        },
                    },
                });
        },
    })
);
