const mix = require("laravel-mix");

/*
  Mix builds your "unbuilded" files (JS and CSS)
  to a builded version.
*/

mix
  .js("resources/js/index.js", "public/js") // Converting our JS file.
  .sass("resources/scss/index.scss", "public/css") // Converting our SCSS file.
  .sourceMaps(); // Generating a source map to development issues.
