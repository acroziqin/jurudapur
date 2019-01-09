const gulp          = require('gulp');
const browserSync   = require('browser-sync').create();
const sass          = require('gulp-sass');
const autoprefixer  = require('gulp-autoprefixer');
const uglify        = require('gulp-uglify');
const rename        = require('gulp-rename');

// Compile Sass & Inject Into Browser
gulp.task('sass', function() {
    return gulp.src(['src/scss/*.scss'])
        .pipe(sass({outputStyle: 'uncompress'}))
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(gulp.dest("src/css"))
        .pipe(browserSync.stream());
});
gulp.task('js', function() {
    return gulp.src('./src/js/!(*.min)*.js')
    .pipe(uglify({
        sourceMap : true,
        mangle: {
            reserved: ['jquery']
        }
    }))
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest('./src/js'))
    .pipe(browserSync.stream());
});


// Watch Sass & Serve
gulp.task('serve', ['sass', 'js'], function() {
    browserSync.init({
        server: "./src"  
    });
    gulp.watch(['src/scss/*.scss'], ['sass']);
    gulp.watch(['src/scss/bootstrap-scss/*.scss'], ['sass']);
    gulp.watch(['src/js/!(*.min)*.js'], ['js']);
    gulp.watch("src/*.html").on('change', browserSync.reload);
});

// Default Task
gulp.task('default', ['serve']);