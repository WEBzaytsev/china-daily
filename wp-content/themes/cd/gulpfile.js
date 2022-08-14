const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const del = require('del');
const browserSync = require('browser-sync').create();
const webpack = require('webpack-stream');
const autoprefixer = require('autoprefixer');
const postcss = require('gulp-postcss');
const tailwindcss = require('tailwindcss');
const replace = require('gulp-replace');
const eslint = require('gulp-eslint');
const prettier = require('gulp-prettier');

let isDev = false;
let isProd = !isDev;

let webpackConfig = {
    output: {
        filename: '[name].js',
        path: __dirname + './dist',
    },
    entry: {
        main: './app/js/main.js',
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                loader: 'babel-loader',
                exclude: '/node_modules/', //исключения
            },
        ],
    },
    mode: isDev ? 'development' : 'production',
};

function fonts() {
    return gulp.src('./app/fonts/*')
        .pipe(gulp.dest('./dist/fonts'));
}

function styles() {
    return gulp.src('./app/sass/**/*.scss', {
        allowEmpty: true
    })
        .pipe(sass.sync({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(postcss([
            tailwindcss('./tailwind.config.js'),
            require('autoprefixer')
        ]))
        .pipe(replace('../../', '../'))
        .pipe(gulp.dest('./dist/css'));
}

async function scripts() {
    return await gulp.src('./app/js/main.js')
        .pipe(eslint.formatEach('compact', process.stderr))
        .pipe(webpack(webpackConfig))
        .pipe(gulp.dest('./dist/js'));
}

function img() {
    return gulp.src('./app/img/**/**/**/*')
        .pipe(gulp.dest('./dist/img'));
}

function svg() {
    return gulp.src('./app/img/*.svg')
        .pipe(gulp.dest('./dist/img'));
}

function watch() {
    browserSync.init({
        server: {
            baseDir: './',
        },
    });
    gulp.watch('./*.php', styles);
    gulp.watch('./vector-images/**/*.php', styles);
    gulp.watch('./template-parts/**/*.php', styles);
    gulp.watch('./pages/**/*.php', styles);
    gulp.watch('./includes/*.php', styles);
    gulp.watch('./inc/*.php', styles);
    gulp.watch('./app/sass/**/*.scss', styles);
    gulp.watch('./app/js/**/*.js', scripts);
    gulp.watch('./app/js/**/*.js', styles);
}

function clean() {
    return del(['./dist/*']);
}

gulp.task('styles', styles);
gulp.task('watch', watch);

gulp.task('img', img);

let build = gulp.series(clean,
    gulp.parallel(gulp.series(styles), scripts, img, svg, fonts),
);

gulp.task('build', build);
gulp.task('dev', gulp.series('build', 'watch'));
