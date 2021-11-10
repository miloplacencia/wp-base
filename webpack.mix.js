let mix = require("laravel-mix");

mix
  .browserSync({
    proxy: "localhost:3070",
    files: ["./theme/**/*.css", "./theme/**/*.js", "./theme/**/*.php"],
  })
  .js("theme/assets/main.js", "./theme/js/scripts.js")
  .sass("theme/assets/sass/main.scss", "./theme/style.css");
// .postCss("theme/assets/style.css", "./theme", [require("tailwindcss")]);
