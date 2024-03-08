const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                Montserrat: ["Montserrat", "sans-serif"],
                Poppins: ["Poppins", "sans-serif"],
                OpenSans: ["Open sans", "sans-serif"],
            },
            colors: {
                primary: {
                    500: "#9B2382;",
                    700: "#6F1E5A;",
                },
                secondary: {
                    500: "#86BF40;",
                    700: "#5F8E2A;",
                },
                paragraph: {
                    500: "#2B2B2B;",
                    700: "#1F1F1F;",
                },
                footer: "#2B2B2B",
                green: "#85BE3F",
            },
            aspectRatio: {
                bigGallery: "2 / 2",
                medGallery: "2 / 1",
                smallGallery: "1 / 1",
            },
            flex: {
                2: "2 2 0%",
                3: "3 3 0%",
                4: "4 4 0%",
                5: "5 5 0%",
                6: "6 6 0%",
                7: "7 7 0%",
                8: "8 8 0%",
                9: "9 9 0%",
                10: "10 10 0%",
                11: "11 11 0%",
                12: "12 12 0%",
            },
            screens: {
                tablet: "640px",
                // => @media (min-width: 640px) { ... }

                laptop: "1024px",
                // => @media (min-width: 1024px) { ... }

                desktop: "1280px",
                // => @media (min-width: 1280px) { ... }
            },
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
