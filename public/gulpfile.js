    const gulp  = require('gulp');
    const uglify = require('gulp-uglify');
    const minifyCSS = require('gulp-csso');
    const concat = require('gulp-concat');
    const sass = require('gulp-sass');
    const sassDir = 'styles/scss';
    const cssDir = 'styles/css';
    const JSDir = 'js';

    var JSFiles = [
        JSDir + "/index.js"
    ];
    var sassFiles = [
        sassDir + "/index.scss"
    ];

    var browserSync = require('browser-sync').create();
    var reload      = browserSync.reload;

    gulp.task('css', function () {
        return gulp.src(sassFiles)
            .pipe(sass())
            .pipe(minifyCSS())
            .pipe(concat('all.css'))
            .pipe(gulp.dest(cssDir))

    });
    gulp.task('js', function () {
        return gulp.src(JSFiles)
            .pipe(uglify())
            .pipe(concat('all.js'))
            .pipe(gulp.dest(JSDir))


    });
    gulp.task('serve', function () {
        browserSync.init({
            server: {
                baseDir: "./"
            }
        });

        gulp.watch('*.html').on('change', reload);
        gulp.watch('js/*.js').on('change', reload);
        gulp.watch('css/*.css').on('change', reload);
    });

    gulp.task('watch', function () {
        gulp.watch(JSDir + "/**/*.js", ['js']);
        gulp.watch(sassDir + "/**/*.scss", ['css']);
    });

    gulp.task('default',['css','js', 'watch', 'serve']);

