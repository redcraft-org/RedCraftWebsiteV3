import { defineConfig } from 'vitest/config';

// Deliberately not reusing vite.config.js. Vitest spins up a Vite dev server,
// and laravel-vite-plugin refuses to start one in CI, which is correct of it
// but fatal here. The tests only need module resolution, not the asset
// pipeline, so the plugin is simply absent.
export default defineConfig({
    test: {
        environment: 'jsdom',
        include: ['resources/js/**/*.test.js'],
    },
});
