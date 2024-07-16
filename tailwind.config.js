/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    daisyui: {
        themes: [
            {
                nord: {
                    ...require("daisyui/src/theming/themes")["nord"],
                    ".menu li > *:not(ul):not(.menu-title):not(details).active":
                        {
                            "background-color": "#fca311",
                            "--primary-muted": "78.6% 0.167 70.04",
                            color: "#000000",
                        },
                    "--base-400": "25.2% 0.056 264.00",
                },
            },
            // light theme
            {
                light: {
                    ...require("daisyui/src/theming/themes")["light"],
                    "--primary-muted": "78.6% 0.167 70.04",
                    "--base-400": "25.2% 0.056 264.00",
                },
            },

            // dark theme
            {
                dark: {
                    ...require("daisyui/src/theming/themes")["dark"],
                    "--primary-muted": "78.6% 0.167 70.04",
                    "--base-400": "25.2% 0.056 264.00",
                },
            },
            "light",
            "dark",
            "cupcake",
            "bumblebee",
            "emerald",
            "corporate",
            "synthwave",
            "retro",
            "cyberpunk",
            "valentine",
            "halloween",
            "garden",
            "forest",
            "aqua",
            "lofi",
            "pastel",
            "fantasy",
            "wireframe",
            "black",
            "luxury",
            "dracula",
            "cmyk",
            "autumn",
            "business",
            "acid",
            "lemonade",
            "night",
            "coffee",
            "winter",
            "dim",
            "nord",
            "sunset",
        ],
    },
    theme: {
        extend: {
            colors: {
                "primary-muted": "oklch(var(--primary-muted) / <alpha-value>)",
                "base-400": "oklch(var(--base-400) / <alpha-value>)",
            },
        },
    },
    plugins: [require("daisyui")],
};
