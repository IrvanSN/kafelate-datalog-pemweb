module.exports = {
  content: ["./**/*.{html,js,php}"],
  theme: {
    extend: {
      colors: {
        main: "#2D1A18",
        maindarker: "#57250A",
        secondary: {
          50: "#fdf9ed",
          100: "#f9eccc",
          200: "#f3d894",
          300: "#ecbf5d",
          400: "#e8a737",
          500: "#e08920",
          600: "#c66719",
          700: "#9b4517",
          800: "#863a1a",
          900: "#6f3118",
          950: "#3f1709",
        },
        black: "#131313",
      },
      fontFamily: {
        poppins: ["Poppins", "Arial", "sans-serif"],
        playfair: ["Playfair Display", "Arial", "sans-serif"],
      },
    },
  },
  plugins: [],
};
