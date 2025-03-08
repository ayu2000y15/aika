import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'public/css/style.css',
                'public/js/script.css'],
            refresh: true,
        }),
    ],
});
