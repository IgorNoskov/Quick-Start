'use strict';

import {dest, parallel, series, src, watch} from 'gulp';
import del from 'del';
import sourcemaps from 'gulp-sourcemaps';
import autoprefixer from 'gulp-autoprefixer';
import concat from 'gulp-concat';
import babel from 'gulp-babel';
import uglify from 'gulp-uglify';
import stylus from 'gulp-stylus';
import rename from 'gulp-rename';

// Build Directories
const dirs = {
    src: 'src'
};

// File Sources for Styles
// ----
const sources = {
    styles: [
        `${dirs.src}/stylus/main.styl`
    ],
    scripts: [
        `${dirs.src}/js/*.js`
    ]
};

// Styles
export const buildStyles = () => src(sources.styles)
    .pipe(autoprefixer({
        browsers: ['> 1%', 'IE 11'],
        cascade: false,
    }))
    .pipe(sourcemaps.init())
    .pipe(stylus({
        compress: true,
        'include css': false
    }))
    .pipe(rename('public-theme-styles.min.css'))
    .pipe(sourcemaps.write('.'))
    .pipe(dest('assets/public/css'));

// Scripts
export const buildScripts = () => src(sources.scripts)
    .pipe(babel({
        presets: ['env']
    }))
    .pipe(sourcemaps.init())
    .pipe(concat('public-theme-scripts.min.js'))
    .pipe(uglify())
    .pipe(sourcemaps.write('.'))
    .pipe(dest('assets/public/js'));

// Clean
export const clean = () => del([
    'assets/public/css',
    'assets/public/js'
]);

// Watch Task
export const devWatch = () => {
    watch(`${dirs.src}/stylus/**/*.styl`, buildStyles);
    watch(sources.scripts, buildScripts);
};

// Development Task
export const dev = series(clean, parallel(buildStyles, buildScripts), devWatch);

// Serve Task
export const build = series(clean, parallel(buildStyles, buildScripts));

// Default task
export default dev;
