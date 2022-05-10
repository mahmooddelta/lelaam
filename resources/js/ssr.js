import {createSSRApp, h} from 'vue';
import {renderToString} from '@vue/server-renderer';
import {createInertiaApp, Head, Link} from '@inertiajs/inertia-vue3';
import createServer from '@inertiajs/server';
import route from 'ziggy';

const appName = 'Laravel';

createServer((page) =>
    createInertiaApp({
        page,
        render: renderToString,
        title: (title) => `${title} - ${appName}`,
        resolve: (name) => require(`./Pages/${name}.vue`),
        setup({app, props, plugin}) {
            return createSSRApp({render: () => h(app, props)})
                .use(plugin)
                .component('Head', Head)
                .component('Link', Link)
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
