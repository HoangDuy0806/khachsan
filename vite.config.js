import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js',
                 'resources/scss/bootstrap.scss',
                 'resources/css/bootstrap.min.css'
                ],
            refresh: true,
        }),
    ],
});
