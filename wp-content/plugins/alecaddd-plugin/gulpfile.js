var gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));


gulp.task('scss',function(){
    return gulp.src('src/scss/mystyle.scss')
    .pipe(sass())
    .pipe(gulp.dest('assets'));

});


gulp.task('watch', function() {
  gulp.watch('src/scss/*.scss', gulp.series('scss')); 
});
