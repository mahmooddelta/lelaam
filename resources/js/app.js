import VueSelect from "vue-select";
import {createApp, h} from 'vue';
import {createInertiaApp, Head, Link} from '@inertiajs/inertia-vue3';
import {InertiaProgress} from '@inertiajs/progress';
import Layout from './Layouts/Layout';
// Media Library
import {MediaLibraryAttachment} from '@spatie/media-library-pro-vue3-attachment';

require('./bootstrap');

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
            .mount(el);
    },
});

InertiaProgress.init({color: '#4B5563'});
