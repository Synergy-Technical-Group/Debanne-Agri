const gulp        = require('gulp');
const gulpif      = require('gulp-if');
const browserSyncConst = require('browser-sync').create();
const sass        = require('gulp-sass')(require('sass'));
const prefixer    = require('gulp-autoprefixer');
const sourcemaps  = require('gulp-sourcemaps');
const webpack     = require('webpack-stream');
const path = require("path");
const glob = require('glob');
const postcss = require('gulp-postcss');
const pxtorem = require('postcss-pxtorem');

const themeName = 'theme',
      host      = 'http://localhost.local';
var   mode      = 'production';

function browserSync(done) {
    browserSyncConst.init({
        proxy: host,
        serveStatic: [
            {
                route: '/wp-content/themes/' + themeName + '/dist/css',
                dir: 'dist/css'
            },
            {
                route: '/wp-content/themes/' + themeName + '/dist/js',
                dir: 'dist/js'
            }
        ],
        files: ['dist/css/*.css', 'dist/js/*.js', 'dist/vendors/**/*.*']
    });
    done();
}

function startWatch(done) {
    gulp.watch(['**/*.php']).on('change', browserSyncConst.reload);
    gulp.watch('src/js/**/*.js', buildScripts).on('change', browserSyncConst.reload);
    gulp.watch('src/scss/**/*.scss', buildStyles).on('change', browserSyncConst.reload);
    done();
}

function buildStyles() {
    return gulp.src(['src/scss/**/*.scss'])
        .pipe(gulpif(mode === 'development',  sourcemaps.init()))
        .pipe(sass({
            outputStyle: 'compressed',
            includePaths: ['node_modules']
        }).on('error', sass.logError))
        .pipe(postcss([
            pxtorem({
                rootValue: 16,      // 1rem = 16px
                unitPrecision: 5,
                propList: ['*'],
                replace: true,
                mediaQuery: true,
                minPixelValue: 1
            })
        ]))
        .pipe(gulpif( mode === 'production', prefixer('last 4 version')))
        .pipe(gulpif( mode === 'development', sourcemaps.write()))
        .pipe(gulp.dest('dist/css/'))
        .pipe(browserSyncConst.stream());
}

function buildScripts() {
    const entries = {};
    glob.sync('./src/js/**/*.js').forEach(f => {
        const relativePath = path.relative('./src/js', f);
        const entryName = relativePath.replace(/\.js$/, '');
        entries[entryName] = f;
    });

    const webpackConfig = {
        mode: mode,
        entry: entries,
        output: {
            filename: '[name].min.js',
            path: path.resolve(__dirname, 'dist/js'),
        },
        module: {
            rules: [{
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: { presets: ['@babel/preset-env'] }
                }
            }]
        }
    };

    return webpack(webpackConfig, require('webpack'))
        .pipe(gulp.dest('dist/js'))
        .pipe(browserSyncConst.stream())
}

const build = gulp.series(buildScripts, buildStyles);

exports.build_styles = buildStyles;
exports.build_js     = buildScripts;
exports.build        = build;
exports.default      = gulp.parallel(build, browserSync, startWatch);
