import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import fg from 'fast-glob';

const jsFiles = fg.sync('resources/js/pages/**/*.js');

export default defineConfig({
    plugins: [
        laravel({
            input: [

                'resources/js/app.js',
                'resources/js/global.js',
                ...jsFiles
            ],
            refresh: true,
        }),
    ],
});
