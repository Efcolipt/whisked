let gulp = require('gulp');
let rename = require('gulp-rename');
let sass = require('gulp-sass');
let autoprefixer = require('gulp-autoprefixer');
let sourcemaps = require('gulp-sourcemaps');
let concat = require('gulp-concat');

function reCss(done){
	gulp.src('./sass/*.scss')
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
		.pipe(gulp.dest('./public/css/'))
	done()

}

function reJs(done){
 	gulp.src(['./public/js/modules/_base.js','./public/js/modules/*.js'])
		.pipe(sourcemaps.init())
	   	.pipe(concat('app.js'))
		.pipe(sourcemaps.write())
	   	.pipe(gulp.dest('./public/js/'))
		done()
}



function watchFiles(){
	gulp.watch("./sass/*",reCss)
	gulp.watch("./public/js/modules/*",reJs)
}

gulp.task('default', gulp.parallel(watchFiles))
