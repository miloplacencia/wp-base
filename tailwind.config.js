const padMar = (positivo = true) =>
  new Array(48)
    .fill(0)
    .map((_, i) => i * 4)
    .reduce(
      (init, val) => ({
        ...init,
        [positivo ? val : `-${val}`]: `${positivo ? "" : "-"}${val}${
          +val !== 0 ? "px" : ""
        }`,
      }),
      {}
    );

module.exports = {
  purge: ["./theme/**/*.php"],
  darkMode: false, // or 'media' or 'class'
  theme: {
    screens: {
      sm: "640px",
      // => @media (min-width: 640px) { ... }

      md: "768px",
      // => @media (min-width: 768px) { ... }

      lg: "1024px",
      // => @media (min-width: 1024px) { ... }

      xl: "1280px",
      // => @media (min-width: 1280px) { ... }
    },
    extend: {
      container: {
        center: true,
        padding: "20px",
      },
      colors: {
        // magenta: "#eb4668",
        // magenta: "#d92d4a",
        magenta: "#ab2c34",
        // "magenta-dark": "#961a4f",
        "magenta-dark": "#ab2c34",
        pink: "#cd4867",
        "pink-light": "#fbebec",
        cafe: "#B8684F",
      },
      fontFamily: {
        sans: ["Montserrat", "system-ui"],
        body: ["Montserrat"],
      },
      padding: {
        0: 0,
        px: "1px",
        ...padMar(),
      },
      margin: {
        auto: "auto",
        px: "1px",
        ...padMar(),
        0: 0,
        "-px": "-1px",
        ...padMar(false),
      },
    },
  },
  variants: {},
  plugins: [],
};
