import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import Vue from "@vitejs/plugin-vue";
export default defineConfig({
    plugins: [
        Vue(),
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
    build: {
        rollupOptions: {
            output: {
                manualChunks: undefined,
            },
        },
    },
    server: {
        host: "0.0.0.0",
        port: 8080,
    },
});
