import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            // Each entry emits its own hashed css file, so the per page
            // stylesheets stay separate exactly as they were under Mix.
            input: [
                'resources/sass/app.scss',
                'resources/sass/pages/home.scss',
                'resources/sass/pages/rules.scss',
                'resources/sass/components/icon-success-error.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    css: {
        preprocessorOptions: {
            scss: {
                // Font Awesome is imported by package name, which sass only
                // resolves with node_modules on the load path.
                loadPaths: ['node_modules'],
                silenceDeprecations: ['import', 'global-builtin', 'legacy-js-api'],
            },
        },
    },
});
