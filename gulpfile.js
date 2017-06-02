'use strict';

// Gulp requirements
var	gulp 			= require('gulp'),
	sass 			= require('gulp-ruby-sass'),
	notify 			= require("gulp-notify"),
	nano 			= require("gulp-cssnano"),
	bower 			= require('gulp-bower'),
	concat 			= require('gulp-concat'),
	imagemin 		= require('gulp-imagemin'),
	postcss      	= require('gulp-postcss'),
	rename			= require('gulp-rename'),
	uglify 			= require('gulp-uglify'),
	autoprefixer 	= require('autoprefixer'),
	pngquant 		= require('imagemin-pngquant'),
	browserSync 	= require('browser-sync').create(),
	strip 			= require('gulp-strip-comments');

// build path. Move folder to server location on deployment
var build = 		'./dist';

// Config paths.
var	config = {
	bowerDir: 		'./bower_components',
  	sassPath: 		'./css',
  	javaPath: 		'./js',
  	imgPath: 		'./img',
};

// Destination paths.
var dist = {
    css: 			build,
    js: 			build + '/js',
    img: 			build + '/img',
    php: 			build
}

// Run Bower task
gulp.task('bower', function() {
    return bower()
		.pipe(gulp.dest(config.bowerDir))
});

// Image task. Optimize size with imagemin and improve with pngquant
gulp.task('img', function(){
    return gulp.src(config.imgPath + '/**/*')
        .pipe(imagemin({
            progressive: true,
            svgoPlugins: [
                {removeViewBox: false},
                {cleanupIDs: false}
            ],
            use: [pngquant()]
        }))
        .pipe(gulp.dest(dist.img));
});

// PHP Function and browserSync stream auto-inject
gulp.task('php', function(){
    return gulp.src('*.php')
        .pipe(gulp.dest(dist.php))
		.pipe(browserSync.stream());
});

// SASS/css function. Defines path where our main scss file is and error handling
// PostCSS autoprefixer to automatically render prefix latest standards for browsers
gulp.task('css', function() {
    return sass(config.sassPath + '/style.scss', {
        precision: 6,
        stopOnError: true,
        cacheLocation: '../../cache',
        loadPath: [
            './css/sass'
			]
        })
		.pipe(postcss([ autoprefixer() ]))
        .on("error", notify.onError(function (error) {
           return "Error: " + error.message;
        }))
        .pipe(gulp.dest(dist.css))
		.pipe(browserSync.stream());
});

// Locations of our javascripts files.
var javascript = [
    config.javaPath + '/**.*'
    ]

// Javascript task
gulp.task('js', function(){
    return gulp.src(javascript)
        .pipe(concat('main.js'))
        .pipe(gulp.dest(dist.js))
		.pipe(browserSync.stream());;
});

// Initialize browserSync. Rerun the task when a watched file changes
// Set to ignore /wp-admin/ urls to avoid update of admin panel on save in editor
gulp.task('watch', ['default'], function() {

	browserSync.init({
		notify: false,
		// proxy: "http://localhost/xe/",
		snippetOptions: {
			ignorePaths: "wp-admin/**"
		}
	});

    gulp.watch('*.php', ['php']);
    gulp.watch(config.sassPath + '/**/*.scss', ['css']);
    gulp.watch(config.javaPath + '/*.js', ['js']);
});

// compress and minify css task with gulpnano. Runs css task before executing to build .min.css file
gulp.task('compress-css', ['css'], function(){
    return gulp.src(dist.css + '/**/*.css')
		.pipe(concat('style.css'))
		.pipe(gulp.dest(dist.css))
		.pipe(rename('style.min.css'))
        .pipe(nano())
        .pipe(gulp.dest(dist.css));
});

//compress and minify javascript task with uglify. Runs Javascript task before executing to build .min.js file
gulp.task('compress-js', ['js'], function() {
	return gulp.src(dist.js + '/**/*.js')
		.pipe(concat('main.js'))
		.pipe(gulp.dest(dist.js))
		.pipe(rename('main.min.js'))
	    .pipe(uglify())
	    .pipe(gulp.dest(dist.js));
});

// Don't run this task. This is incorporated into 'production' task.
gulp.task('compress', ['compress-css', 'compress-js']);

// Default task. No compressing
gulp.task('default', ['bower', 'css', 'php', 'js']);

// Production task. Use before using on live site.
gulp.task('production',['default', 'compress','img']);
