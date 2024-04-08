var gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
//const jsMinify = require('gulp-terser');

gulp.task('scss',function(){
return gulp.src('src/scss/mystyle.scss')
.pipe(sass())
.pipe(gulp.dest('assets'));

});
gulp.task('scss', function() {
    return gulp.src('src/scss/form.scss')
        .pipe(sass())
        .pipe(gulp.dest('assets/form.css'));
});


gulp.task('watch', function() {
gulp.watch('src/scss/*.scss', gulp.series('scss')); 
});

// gulp.task('scss',function(){
// return gulp.src('src/js/myscript.js')
// .pipe(jsMinify())
// .pipe(gulp.dest('assets'));

// });