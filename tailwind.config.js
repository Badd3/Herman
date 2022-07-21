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
      sm: ["12px", "18px"],
      base: ["14px", "22px"],
      md: ["16px", "22px"],
      lg: ["20px", "28px"],
      xl: ["24px", "32px"],
      "2xl": ["30px", "32px"],
      "3xl": ["38px", "32px"],
    },
    extend: {
      // colors: tailpress.colorMapper(
      //   tailpress.theme("settings.color.palette", theme)
      // ),

      colors: {
        white: {
          DEFAULT: "#ffffff",
          bg: "#FDFDFB",
        },

        grey: {
          DEFAULT: "#B2B2B0",
        },
      },

      // fontSize: tailpress.fontSizeMapper(
      //   tailpress.theme("settings.typography.fontSizes", theme)
      // ),
    },
    fontFamily: {
      sans: ["Gotham", "sans-serif"],
    },
    screens: {
      xs: "480px",
      sm: "600px",
      md: "782px",
      lg: tailpress.theme("settings.layout.contentSize", theme),
      xl: tailpress.theme("settings.layout.wideSize", theme),
      "2xl": "1440px",
    },
  },
  plugins: [require("@tailwindcss/aspect-ratio"), tailpress.tailwind],
};
