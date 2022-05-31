const defaultTheme = require('tailwindcss/defaultTheme');


module.exports = {
    mode: 'jit',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    daisyui: {
        themes: [
            {
                RedCraft: {
                    "primary": "#C24F4F",
                    "secondary": "#8F3B3B",
                    "accent": "#7A8185",
                    "neutral": "#F2F2F3",
                    "base-100": "#2B2D2F",
                    "info": "#4F96C2",
                    "success": "#4FC270",
                    "warning": "#FFC547",
                    "error": "#9558C7",
                },
            },
        ],
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography'), require("daisyui")],
};
