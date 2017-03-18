//Gulp requirements
var	gulp = require('gulp');
var sass = require('gulp-ruby-sass');
var notify = require("gulp-notify");
var nano = require("gulp-cssnano");
var bower = require('gulp-bower');
var concat = require('gulp-concat');
var imagemin = require('gulp-imagemin');
var pngquant = require('imagemin-pngquant');
var uglify = require('gulp-uglify');
var browserSync = require('browser-sync').create();
var sassdoc = require('sassdoc');
var strip = require('gulp-strip-comments');

//build path. Change to server location
var build = './dist';

//Config paths.
var	config = {
	bowerDir: './bower_components',
  sassPath: './css',
  javaPath: './js',
  imgPath: './img',
  fontPath: './font'
};

//Distination paths.
var dist = {
    css: build,
    js: build + '/js',
    font: build + '/fonts',
    img: build + '/img',
    php: build
}

//Run Bower task
gulp.task('bower', function() {
    return bower()
		.pipe(gulp.dest(config.bowerDir))
});

//Icons task. Just relocates them
gulp.task('icons', function() {
    return gulp.src(config.bowerDir + '/font-awesome/fonts/**.*')
        .pipe(gulp.dest(dist.font));
});

//Fonts task
gulp.task('fonts', function(){
    return gulp.src(config.fontPath + '/*')
        .pipe(gulp.dest(dist.font));
});

//Image task. Optimize size
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

//php Function
gulp.task('php', function(){
    return gulp.src('*.php')
        .pipe(gulp.dest(dist.php))
				.pipe(browserSync.stream());
});

//SASS/css function. Defines path where our sass is, for our main.scss to locate them via import.
gulp.task('css', function() {
    return sass(config.sassPath + '/style.scss', {
        precision: 6,
        stopOnError: true,
        cacheLocation: '../../cache',
        loadPath: [
            './css/sass'
			]
        })
        .on("error", notify.onError(function (error) {
           return "Error: " + error.message;
        }))
        .pipe(gulp.dest(dist.css))
			.pipe(browserSync.stream());
});

//Locations of our javascripts files.
var javascript = [
    config.javaPath + '/functions.js'
    ]

//Javascript task
gulp.task('js', function(){
    return gulp.src(javascript)
        .pipe(concat('main.js'))
        .pipe(gulp.dest(dist.js))
		.pipe(browserSync.stream());;
});

// Rerun the task when a file changes
gulp.task('watch', ['default'], function() {

		browserSync.init({
			proxy: "http://localhost/xebooking/"
		});

    gulp.watch('*.php', ['php']);
    gulp.watch(config.sassPath + '/**/*.scss', ['css']);
    gulp.watch('/*.js', ['js']);
});

//compress css task with gulpnano. Runs css task before executing
gulp.task('compress-css', ['css'], function(){
    return gulp.src(dist.css + '*.css')
        .pipe(nano())
        .pipe(gulp.dest(dist.css))
});

//compress javascript. Uses gulpuglify. Runs Javascript task before executing
gulp.task('compress-js', ['js'], function() {
  return gulp.src(dist.js + '*.js')
    .pipe(uglify())
    .pipe(gulp.dest(dist.js));
});

// SassDoc for documentation
// http://localhost:3000/xebooking/wp-content/themes/divi-child/dist/docs/
gulp.task('sassdoc', function () {
  var options = {
    dest: 'dist/docs',
    verbose: true,
    display: {
      access: ['public', 'private'],
      alias: true,
      watermark: true,
    },
    groups: {
      colors: 'Colors',
    },
    basePath: 'https://github.com/omattman/xebooking/tree/master/css',
  };

  return gulp.src('css/**/*.scss')
    .pipe(sassdoc(options));
});

gulp.task('compress', ['compress-css', 'compress-js']);

//Default task. No compressing
gulp.task('default', ['bower', 'icons', 'css', 'php', 'js', 'fonts', 'sassdoc']);

//Production task. Use before using on live site.
gulp.task('production',['default', 'compress','img']);
