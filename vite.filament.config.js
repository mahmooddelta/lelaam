import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/filament.css"],
            refresh: true,
        }),
    ],
    css: {
        postcss: {
            plugins: [
                require("tailwindcss")({
                    config: "./tailwind.filament.config.js",
                }),
                require("autoprefixer"),
            ],
        },
    },
    build: {
        outDir: "./public/build/admin",
    },
});
