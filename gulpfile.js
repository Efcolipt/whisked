let gulp = require('gulp');
let rename = require('gulp-rename');
let sass = require('gulp-sass');
let autoprefixer = require('gulp-autoprefixer');
let sourcemaps = require('gulp-sourcemaps');
let concat = require('gulp-concat');
let uglify = require('gulp-uglify');

function reCss(done){
	gulp.src('./dev/sass/**/*.scss')
		.pipe(sourcemaps.init())
		.pipe(sass({
			errorLogToConsole: true,
			outputStyle: 'compressed'
		}))
		.on('error' , console.error.bind(console))
		.pipe(autoprefixer({
			overrideBrowserslist: ['last 4 versions'],
			cascade: false
		}))
		.pipe(rename({suffix: '.min'}))
		.pipe(gulp.dest('./public/css/'));

		done();
}

function reJs(done){
    gulp.src('./dev/js/**/*.js')
    .pipe(concat('app.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('./public/js/'));
    done();
}

function watchFiles(){
	gulp.watch("./dev/sass/*",reCss);
	gulp.watch("./dev/js/*",reJs);
}

gulp.task('default', gulp.parallel(watchFiles));
