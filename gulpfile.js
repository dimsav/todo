var gulp = require('gulp');
var minifycss = require('gulp-minify-css');
var sass = require('gulp-ruby-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');

var cssFiles = [
    'assets/vendor/bootstrap/dist/css/bootstrap.css',
    'assets/vendor/flat-ui/dist/css/flat-ui.css',
    'assets/css/main.css'
];

var jsFiles = [
    'assets/vendor/modernizr/modernizr.js',
    'assets/vendor/jquery/dist/jquery.js',
    'assets/vendor/angular/angular.js',
    'assets/vendor/angular-resource/angular-resource.js',
    'assets/js/app.js',
    'assets/js/services.js',
    'assets/js/controllers.js',
    'assets/js/main.js'
];

var imgFiles = [
    'assets/vendor/flat-ui/dist/img/**'
];

var fontFiles = [
    'assets/vendor/bootstrap/dist/fonts/*',
    'assets/vendor/flat-ui/dist/fonts/**'
];

var dirs = {

    devCss:    'public/dev/css',
    devJs:     'public/dev/js',
    devFonts:  'public/dev/fonts',
    devImg:    'public/dev/img',

    prodCss:   'public/css',
    prodJs:    'public/js',
    prodFonts: 'public/fonts',
    prodImg:   'public/img',

    css:     'assets/css',
    js:      'assets/js'
};

// Tasks

gulp.task('css', function(){
    return gulp.src(cssFiles, {base: dirs.prodCss})
        .pipe(concat('main.css'))
        .pipe(gulp.dest(dirs.devCss))
        .pipe(minifycss())
        .pipe(gulp.dest(dirs.prodCss))
        ;
});

gulp.task('js', function(){
    return gulp.src(jsFiles, {base: dirs.js})
        .pipe(concat('main.js'))
        .pipe(gulp.dest(dirs.devJs))
        .pipe(uglify())
        .pipe(gulp.dest(dirs.prodJs))
});

gulp.task('fonts', function(){
    return gulp.src(fontFiles)
        .pipe(gulp.dest(dirs.devFonts))
        .pipe(gulp.dest(dirs.prodFonts))
});

gulp.task('img', function(){
    return gulp.src(imgFiles)
        .pipe(gulp.dest(dirs.devImg))
        .pipe(gulp.dest(dirs.prodImg))
});

gulp.task('watch', function(){
    gulp.watch(dirs.css + '/**/*.css', ['css']);
    gulp.watch(dirs.js  + '/**/*.js',  ['js']);
});

gulp.task('default', ['watch', 'update']);
gulp.task('update', ['css', 'js', 'fonts', 'img']);