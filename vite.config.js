import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import fg from 'fast-glob';

const jsFiles = fg.sync('resources/js/pages/**/*.js');

export default defineConfig({
    plugins: [
        laravel({
            input: [

                'resources/css/auth.css',
                'resources/js/auth.js',

                'resources/css/app.css',
                'resources/js/app.js',
                ...jsFiles
            ],
            refresh: true,
        }),
    ],
});
