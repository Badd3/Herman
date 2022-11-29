const _ = require("lodash");
const theme = require("./theme.json");
const tailpress = require("@jeffreyvr/tailwindcss-tailpress");
const { white } = require("tailwindcss/colors");

module.exports = {
  content: [
    "./*.php",
    "./**/*.php",
    "./**/**/*.php",
    "./woocommerce/**/*.php",
    "./woocommerce/**/**/*.php",
    "./woocommerce/**/**/**/*.php",
    "./resources/css/*.css",
    "./resources/js/*.js",
    "./safelist.txt",
  ],
  theme: {
    container: {
      padding: {
        DEFAULT: "1rem",
        sm: "2rem",
        lg: "0rem",
      },
    },

    fontSize: {
      xs: ["10px", "16px"],
      sm: ["12px", "18px"],
      base: ["14px", "22px"],
      md: ["16px", "22px"],
      lg: ["18px", "28px"],
      xl: ["24px", "32px"],
      "2xl": ["30px", "32px"],
      "3xl": ["38px", "32px"],
    },
    extend: {
      spacing: {
        2.5: "0.625rem",
        7.5: "1.875rem",
      },
      gridTemplateRows: {
        12: "repeat(12, minmax(0, 1fr))",
      },

      colors: {
        white: {
          DEFAULT: "#ffffff",
          bg: "#FDFDFB",
        },

        grey: {
          DEFAULT: "#b2b2b2",
        },
      },

      // fontSize: tailpress.fontSizeMapper(
      //   tailpress.theme("settings.typography.fontSizes", theme)
      // ),
    },
    fontFamily: {
      book: ["Gotham-Book", "sans-serif"],
      light: ["Gotham", "sans-serif"],
    },
    screens: {
      xx: "375px",
      xs: "480px",
      sm: "600px",
      md: "782px",
      lg: tailpress.theme("settings.layout.contentSize", theme),
      xl: tailpress.theme("settings.layout.wideSize", theme),
      "2xl": "1440px",
    },
  },
  plugins: [require("@tailwindcss/aspect-ratio"), tailpress.tailwind],
  variants: {
    extend: {
        display: ["group-hover"],
    },
},
};
