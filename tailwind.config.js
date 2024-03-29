const defaultTheme = require('tailwindcss/defaultTheme');


module.exports = {
    content: [
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
            colors: {
                "primary": "#c24f4f",
                "secondary": "#7a8185",
                "accent": "#8f3b3b",
                "neutral": "#f2f2f3",
                "base-100": "#2b2d2f",
                "base-200": "#181a1b",
                "info": "#4F96C2",
                "success": "#4FC270",
                "warning": "#FFC547",
                "error": "#9558C7",
                "light": "#d9dcdd",
                "gray": "#6A6F73",
                "light-gray": "#f2f2f3",
                "white": "#ffffff",
                "black": "#000000",
            },
            scale: {
                '98': '0.98',
                '99': '0.99',
                '101': '1.01',
                '102': '1.02',
                '103': '1.03',
                '104': '1.04',
            },
            transitionTimingFunction: {
                'in-expo': 'cubic-bezier(0.95, 0.05, 0.795, 0.035)',
                'out-expo': 'cubic-bezier(0.19, 1, 0.22, 1)',
            },
            lineHeight: {
                '32': '8rem',
            },
            strokeWidth: {
                '3': '3',
                '4': '4',
                '5': '5',
            }
        },
    },
    daisyui: {
        styled: true,
        themes: [
            {
                RedCraft: {
                    "primary": "#c24f4f",
                    // "primary-focus": "",
                    // "primary-content": "",

                    "secondary": "#7a8185",
                    // "secondary-focus": "",
                    // "secondary-content": "",

                    "accent": "#8f3b3b",
                    // "accent-focus": "",
                    // "accent-content": "",

                    "neutral": "#f2f2f3",
                    // "neutral-focus": "",
                    // "neutral-content": "",

                    "base-100": "#2b2d2f",
                    // "base-200": "",
                    // "base-300": "",
                    // "base-content": "",

                    "info": "#4F96C2",
                    // "info-content": "",
                    "success": "#4FC270",
                    // "success-content": "",
                    "warning": "#FFC547",
                    // "warning-content": "",
                    "error": "#9558C7",
                    // "error-content": "",
                },
            },
        ],
        base: true,
        utils: true,
        logs: true,
        rtl: false,
        prefix: "",
        darkTheme: "dark",
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require("daisyui")
    ],
};
