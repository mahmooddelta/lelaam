import './bootstrap';
import '../css/app.css';

import {createApp, h} from 'vue';
import {createInertiaApp, Head, Link} from '@inertiajs/inertia-vue3';
import {InertiaProgress} from '@inertiajs/progress';
import Layout from '../js/Layouts/Layout.vue';
import {resolvePageComponent} from "laravel-vite-plugin/inertia-helpers";
import {ZiggyVue} from '../../vendor/tightenco/ziggy/dist/vue.m';
// Vue Select
import VueSelect from "vue-select";
// Media Library
import {MediaLibraryAttachment} from '@spatie/media-library-pro-vue3-attachment';
// Toast
import Toast, {POSITION, useToast} from 'vue-toastification'
// Livewire AutoHMR
import {livewire_hot_reload} from 'virtual:livewire-hot-reload';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

window.toast = useToast();

livewire_hot_reload();

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: name => {
        return resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')).then(page => {
            page.default.layout = page.default.layout || Layout
            return page;
        })
    }, setup({el, app, props, plugin}) {
        return createApp({render: () => h(app, props)})
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .component('Head', Head)
            .component('Link', Link)
            .component('v-select', VueSelect)
            .component('media-library-attachment', MediaLibraryAttachment)
            .mixin({methods: {route}})
            .use(Toast, {
                position: POSITION.TOP_RIGHT, rtl: true,
            })
            .mount(el);
    },
});

InertiaProgress.init({color: '#EE3E43'});
