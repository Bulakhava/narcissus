var gulp = require('gulp');
var concat = require('gulp-concat');
var sass = require('gulp-sass');
var minifyCSS = require('gulp-minify-css');
var concatCss = require('gulp-concat-css');
const autoprefixer = require('gulp-autoprefixer');
const babel = require('gulp-babel');


gulp.task('scripts', function () {
    gulp.src('resources/js/*.js')
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(gulp.dest('public/js'))
});

gulp.task('styles', function () {
    gulp.src(['resources/scss/**/*.scss'])
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer({
            browsers: ['last 4 versions'],
            cascade: false
        }))
        .pipe(concatCss('css/style.min.css'))
        .pipe(minifyCSS())
        .pipe(gulp.dest('public'))
});

gulp.task('dev', function () {
    gulp.run('scripts', 'styles');

    gulp.watch('resources/js/*js', function () {
        gulp.run('scripts');
    })
    gulp.watch('resources/scss/*scss', function () {
        gulp.run('styles');
    })
});





