const globalPolyfill = require('global');
globalPolyfill.global = globalPolyfill;

const { src, dest, task, series, watch } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const sourcemaps = require('gulp-sourcemaps');

const styleSRC = ['./src/scss/mystyle.scss', './src/scss/form.scss', './src/scss/slider.scss','./src/scss/auth.scss'];
const styleDIST = './assets/';
const styleWatch = './src/scss/**/*.scss';

function compileSass() {
    return src(styleSRC)
        .pipe(sourcemaps.init())
        .pipe(sass({    
            errorLogToConsole: true,
            outputStyle: 'compressed'
        }).on('error', sass.logError))
        .pipe(sourcemaps.write('./'))
        .pipe(dest(styleDIST));
}

task('style', compileSass);
task('default', series('style'));

task('watch', function() {
    watch(styleWatch, series('style'));
});
