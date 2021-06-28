var gulp = require('gulp');
var { src, dest, watch, series, parallel } = require('gulp');
var yargs = require('yargs');
var sass = require('gulp-sass')(require('sass'));
var cleanCss = require('gulp-clean-css');
var gulpif = require('gulp-if');
var postcss = require('gulp-postcss');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('autoprefixer');
var imagemin = require('gulp-imagemin');
var concat = require('gulp-concat');
var replace = require('gulp-replace');
var del = require('del');
var zip = require("gulp-zip");
var browserSync = require('browser-sync').create();
var info = require("./package.json");
const PRODUCTION = yargs.argv.prod;

gulp.task('styles', function() {
  return gulp
    .src('src/scss/style.scss')
    .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
    .pipe(sass().on('error', sass.logError))
    .pipe(gulpif(PRODUCTION, postcss([ autoprefixer ])))
    .pipe(gulpif(PRODUCTION, cleanCss({compatibility:'ie8'})))
    .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
    .pipe(dest('dist/css'));
});

gulp.task('images', function() {
    return src('src/images/**/*.{jpg,jpeg,png,svg,gif}')
    .pipe(gulpif(PRODUCTION, imagemin()))
    .pipe(dest('dist/images'));
});

gulp.task('watch', function() {
    gulp.src('src/images/**/*.{jpg,jpeg,png,svg,gif}')
    .pipe(gulpif(PRODUCTION, imagemin()))
    .pipe(dest('dist/images'));
    gulp.watch('src/scss/**/*.scss', gulp.series('styles'))
    gulp.watch('src/js/*.js', gulp.series('scripts'))
    gulp.watch("scr/*.php").on('change', () => {
      console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
      gulp.series('copy');
      browserSync.reload();
    });
    gulp.watch("scr/*.html").on('change', () => {
        console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
        gulp.series('copy');
        browserSync.reload();
  });
});

gulp.task('scripts', function() {
    return gulp.src([
        'src/js/*.js',
        ])
      .pipe(concat({ path: 'main.js'}))
      .pipe(browserSync.reload({stream:true}))
      .pipe(gulp.dest('dist/js'));
  });

gulp.task('browser-sync', function() {
    browserSync.init({
      server: {
        baseDir: siteOutput
      }
    });
});

gulp.task('clean', function() { 
    return del(['dist']);
});

gulp.task('copy', function() { 
    return src(['src/**/*','!src/{images,js,scss,html}','!src/{images,js,scss,html}/**/*'])
    .pipe(replace("_themename", info.name))
    .pipe(dest('dist'));
});

gulp.task('compress', function() { 
    return src([
        "dist/**/*",
        "!node_modules{,/**}",
        "!bundled{,/**}",
        "!src{,/**}",
        "src/style.css",
        "!.gitignore",
        "!gulpfile.js",
        "!package.json",
        "!package-lock.json",
      ])
      .pipe(replace("_themename", info.name))
      .pipe(zip(`${info.name}.zip`))
      .pipe(dest('bundled'));
});

const clean = () => del(['dist']);

gulp.task('dev', gulp.series(series('clean', parallel('styles', 'images', 'copy', 'scripts'), 'watch')));
gulp.task('build', gulp.series(series('clean', parallel('styles', 'images', 'copy', 'scripts')), 'compress'));