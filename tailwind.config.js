/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    fontFamily: {
      poppins: ["Poppins", "sans-serif"],
      oswald: ["Oswald", "sans-serif"],
      montserrat: ["Montserrat", "sans-serif"],
    },
  },
  daisyui: {
    themes: [
      {
        mytheme: {
          primary: "#9bf2dd",
          secondary: "#f9b69d",
          accent: "#4ce519",
          neutral: "#283339",
          "base-100": "#30465A",
          info: "#2861E6",
          success: "#1CBA56",
          warning: "#9D7A07",
          error: "#EA7161",
        },
      },
    ],
  },
  plugins: [require("daisyui")],
};
