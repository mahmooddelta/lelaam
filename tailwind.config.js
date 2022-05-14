const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './vendor/filament/**/*.blade.php',
    ],
    darkMode: 'class',
    theme: {
        extend: {
            fontFamily: {
                sans: ['Vazirmatn', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: colors.rose,
                danger: colors.red,
                success: colors.green,
                warning: colors.yellow,
            },

        },
    },
    daisyui: {
        themes: [
            {
                dark: {
                    ...require("daisyui/src/colors/themes")["[data-theme=dark]"],
                    primary: "#EE3E43",
                    secondary: "#F3F4F6",
                    accent: "#8b5cf6",
                    info: "#fecdd3",
                    success: "#22BE00",
                    warning: "#FBBD23",
                    error: "#F87272",
                    neutral: "#414558",
                    "base-100": "#282a36",
                    "base-content": "#f8f8f2",
                },
                light: {
                    ...require("daisyui/src/colors/themes")["[data-theme=autumn]"],
                    primary: "#EE3E43",
                    secondary: "#fecdd3",
                    accent: "#8b5cf6",
                    info: "#fda4af",
                    success: "#22BE00",
                    warning: "#FBBD23",
                    error: "#F87272",
                },
            },
        ],
        rtl: true,
        darkTheme: "dracula"
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require("daisyui"),
        require("tailwindcss-flip"),
    ],
};
