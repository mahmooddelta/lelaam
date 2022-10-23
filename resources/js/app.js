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
// Toast
import Toast, {POSITION, useToast} from 'vue-toastification'
// Font awesome
import {library} from "@fortawesome/fontawesome-svg-core";
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome'
import {fas} from '@fortawesome/free-solid-svg-icons'

library.add(fas);
import {dom} from "@fortawesome/fontawesome-svg-core";

dom.watch();

let appName = 'Laravel';

if (typeof window !== 'undefined') {
    appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';
    window.toast = useToast();
}


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
            .component('FontAwesomeIcon', FontAwesomeIcon)
            .mixin({methods: {route}})
            .use(Toast, {
                position: POSITION.TOP_RIGHT, rtl: true,
            })
            .mount(el);
    },
});

InertiaProgress.init({color: '#EE3E43'});
