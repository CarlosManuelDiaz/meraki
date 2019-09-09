// Include gulp
var gulp = require('gulp');

// Include Plugins
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var cssnano = require('gulp-cssnano');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var sourcemaps = require('gulp-sourcemaps');
var rename = require('gulp-rename');

// Compile Styles & Minify
gulp.task('styles', function() {
    return gulp.src('./src/scss/styles.scss')
    	.pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(cssnano())
        .pipe(rename({ suffix: '.min' }))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./css'));
});

gulp.task('scripts', function() {
    gulp.src([
         './src/js/frontend/events.js',
         './src/js/frontend/functions.js',
    ])
        .pipe(sourcemaps.init())
        .pipe(concat('scripts.js'))
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./js'));
});


// Watch Files For Changes
gulp.task('watch', function() {
    gulp.watch('./src/js/**/*.js', ['scripts']);
    gulp.watch('./src/scss/**/*.scss', ['styles']);
});
