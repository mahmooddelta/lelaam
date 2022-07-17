import './bootstrap';
import '../css/app.css';

import {createSSRApp, h} from 'vue';
import {renderToString} from '@vue/server-renderer';
import {createInertiaApp, Head, Link} from '@inertiajs/inertia-vue3';
import createServer from '@inertiajs/server';
import {resolvePageComponent} from "laravel-vite-plugin/inertia-helpers";
import route from 'ziggy';
import Layout from '../js/Layouts/Layout.vue';
// Vue Select
import VueSelect from "vue-select";

// Toast
import Toast, {POSITION, useToast} from 'vue-toastification'

let appName = 'Laravel';

if (typeof window !== 'undefined') {
    appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';
    window.toast = useToast();
}

createServer((page) => createInertiaApp({
    page, render: renderToString, title: (title) => `${title} - ${appName}`, resolve: name => {
        return resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')).then(page => {
            page.default.layout = page.default.layout || Layout
            return page;
        });
    }, setup({app, props, plugin}) {
        return createSSRApp({render: () => h(app, props)})
            .use(plugin)
            .component('Head', Head)
            .component('Link', Link)
            .component('v-select', VueSelect)
            .use(Toast, {
                position: POSITION.TOP_RIGHT, rtl: true,
            })
            .mixin({
                methods: {
                    route: (name, params, absolute) => {
                        return route(name, params, absolute, {
                            ...page.props.ziggy, location: new URL(page.props.ziggy.url),
                        });
                    },
                },
            });
    },
}));
