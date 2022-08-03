const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {
    content: ["./resources/**/*.blade.php", "./vendor/filament/**/*.blade.php"],
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

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
};
