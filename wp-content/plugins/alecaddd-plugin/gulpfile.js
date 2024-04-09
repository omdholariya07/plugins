const { src, dest, task,series,watch} = require('gulp');
const sass = require('gulp-sass')(require('sass'));
//const rename = require('gulp-rename');
const sourcemaps = require('gulp-sourcemaps');

const styleSRC = ['./src/scss/mystyle.scss', './src/scss/form.scss'];
const styleDIST = './assets/';
const styleWatch = './src/scss/**/*.scss';

const jsSRC = './src/js/myscript.js';
const jsDIST = './assets/';
const jsWatch = './src/js/**/*.js';

function compileSass() {
    return src(styleSRC)
        .pipe(sourcemaps.init())
        .pipe(sass({    
            errorLogToConsole: true,
            outputStyle: 'compressed'
        })
        .on('error', sass.logError))
       // .pipe(rename({ suffix: '.min' }))
        .pipe(sourcemaps.write('./'))
        .pipe(dest(styleDIST));
}

function copyJS() {
    return src(jsSRC) 
    .pipe(sourcemaps.init())
   // .pipe(rename({ suffix: '.min' }))
    .pipe(sourcemaps.write('./'))
    .pipe(dest(jsDIST));
}

task('style', compileSass);
task('js', copyJS);


task('default', series('style', 'js'));

task('watch', function() {
    watch(styleWatch, series('style'));
    watch(jsWatch, series('js'));
});
