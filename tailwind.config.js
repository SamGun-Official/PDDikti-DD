/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        extend: {
            borderRadius: {
                "4xl": "2rem",
            },
            borderWidth: {
                6: "6px",
            },
            fontFamily: {
                sans: ['"Courier New"'],
            },
            fontSize: {
                "8xl": "5.25rem",
                "9xl": "6rem",
                "subtitle-sm": "1.375rem", // 22px
                "subtitle-md": "1.750rem", // 28px
                "subtitle-lg": "2.625rem", // 42px
                "subtitle-xl": "2.875rem", // 46px
            },
            screens: {
                xsm: "480px",
                lg: "992px",
                xl: "1200px",
                "2xl": "1440px",
                "3xl": "1600px",
                "4xl": "1920px",
            },
        },
        container: {
            padding: {
                DEFAULT: "1.25rem",
            },
        },
    },
    plugins: [],
};
