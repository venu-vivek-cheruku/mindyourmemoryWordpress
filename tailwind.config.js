/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.{html,js,php}",
    "./template-parts/**/*.php",
    "./*.php",
    "./*.html",
    "./js/*.js",
    "./php",
  ],
  theme: {
    extend: {
      fontFamily: {
        primary: ["inter", "sans-serif"],
        secondary: ["inter", "sans-serif"],
      },
      colors: {
        transparent: "transparent",
        primary: "#1F526E",
        secondary: "#367CFF",
        secondaryLight: "#1F526E 20%",
        ctaBg: "#54ABA7",
        white: "#fffffA",
        primaryText: "#0F3950",
        secondaryText: "#292A2E",
        secondaryTextLight: "#F0F0EC",
      },
    },
  },
  plugins: [],
};
