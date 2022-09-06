import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from "path";

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            ssr: 'resources/js/ssr.js',
            refresh: true,
        }), vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    css: {
        postcss: {
            plugins: [
                require("tailwindcss")({
                    config: "./tailwind.config.js",
                }),
                require("autoprefixer"),
            ],
        },
    },
    build: {
        outDir: "./public/build/frontend",
    },
    resolve: {
        alias: {
            '@': 'resources/js',
            'ziggy': path.resolve(__dirname, 'vendor/tightenco/ziggy/src/js')
        }
    },
    ssr: {
        noExternal: ['@inertiajs/server'],
    },
});
