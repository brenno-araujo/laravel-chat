const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
            cursor: ['responsive', 'hover', 'focus'],
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],

    purge: {
        safelist: [
          "flex",
          "flex-row",
          "flex-col",
          "absolute",
          "grid",
          "grid-cols-5",
          "grid-cols-8",
          "grid-cols-10",
          "col-start-1",
          "row-start-1",
          "place-content-start",
          "gap-0",
          "justify-items-center",
          "align-center",
          "items-center",
          "w-6",
          "w-8",
          "w-10",
          "h-6",
          "h-8",
          "h-10",
          "h-64",
          "p-0.5",
          "p-1",
          "p-2",
          "pt-1",
          "mt-1",
          "mt-10",
          "mb-4",
          "py-1",
          "px-2",
          "rounded",
          "border",
          "overflow-x-auto",
          "overflow-y-hidden",
          "overflow-y-scroll",
          "bg-gray-200",
          "bg-gray-50",
          "bg-opacity-25"
        ]
      }

};
