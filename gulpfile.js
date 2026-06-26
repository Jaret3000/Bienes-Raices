// gulpfile.js (ESM) — solo SASS y JS, no toca imágenes
import gulp from "gulp";
import gulpSass from "gulp-sass";
import dartSass from "sass";
import postcss from "gulp-postcss";
import autoprefixer from "autoprefixer";
import cssnano from "cssnano";
import sourcemaps from "gulp-sourcemaps";
import concat from "gulp-concat";
import terser from "gulp-terser";
import rename from "gulp-rename";
import notify from "gulp-notify";

const { src, dest, watch, series, parallel } = gulp;
const sassCompiler = gulpSass(dartSass);

// Rutas
const paths = {
  scss: "src/scss/**/*.scss",
  js: "src/js/**/*.js"
};

// --- CSS (SASS -> PostCSS (autoprefixer + cssnano) + sourcemaps)
export function css() {
  return src(paths.scss)
    .pipe(sourcemaps.init())
    .pipe(
      sassCompiler().on("error", function (err) {
        // usar function() para que `this.emit('end')` funcione
        console.error(err.message);
        this.emit("end");
      })
    )
    .pipe(postcss([autoprefixer(), cssnano()]))
    .pipe(sourcemaps.write("."))
    .pipe(dest("public/build/css"))
    .pipe(notify({ message: "✅ CSS compilado", onLast: true }));
}

// --- JS (concat + terser + sourcemaps)
export function javascript() {
  return src(paths.js)
    .pipe(sourcemaps.init())
    .pipe(concat("bundle.js"))
    .pipe(terser())
    .pipe(rename({ suffix: ".min" }))
    .pipe(sourcemaps.write("."))
    .pipe(dest("public/build/js"))
    .pipe(notify({ message: "✅ JS procesado", onLast: true }));
}

// --- Watch (solo sass y js)
export function watchFiles() {
  watch(paths.scss, css);
  watch(paths.js, javascript);
}

// --- Tareas agrupadas
export const dev = series(parallel(css, javascript), watchFiles);
export const build = series(parallel(css, javascript));

// Default (para `gulp` / `npm run dev`)
export default dev;