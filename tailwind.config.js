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

                dracula: {
                    ...require("daisyui/src/colors/themes")["[data-theme=dracula]"],
                    primary: "#EE3E43",
                    secondary: "#F3F4F6",
                    accent: "#8b5cf6",
                    info: "#3ABFF8",
                    success: "#22BE00",
                    warning: "#FBBD23",
                    error: "#F87272",
                },
                pastel: {
                    ...require("daisyui/src/colors/themes")["[data-theme=pastel]"],
                    primary: "#EE3E43",
                    secondary: "#F3F4F6",
                    accent: "#8b5cf6",
                    info: "#3ABFF8",
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
