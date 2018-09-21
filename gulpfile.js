/**
 * Commands:
 * 'gulp' - development build
 * 'gulp build' - production build
 * 'gulp sync' - browsersync task
 * 'gulp watch' - watch task
 * 'gulp clean' - destination directory full clean
 */

var dev = true;

const
    gulp = require('gulp'),
    fs = require('fs'),
    del = require('del'),
    browserSync = require('browser-sync'),
    plugins = require('gulp-load-plugins')(),
    runSequence = require('run-sequence').use(gulp),
    streamQueue = require('streamqueue'),
    merge = require('merge2'),
    cfg = JSON.parse(fs.readFileSync('./gulp.json'));

// Styles
gulp.task('styles', () => {
    var scssStream = gulp.src(cfg.paths.base.src + cfg.paths.styles.main)
        .pipe(plugins.plumber({
            errorHandler: plugins.notify.onError("Error (styles): <%= error.message %>")
        }))
        .pipe(plugins.sass({
            includePaths: cfg.paths.vendors.styles.scss,
            outputStyle: 'compressed'
        }))
        .pipe(plugins.concat('scss-files.css'));

    var cssStream = gulp.src(cfg.paths.vendors.styles.css)
        .pipe(plugins.plumber({
            errorHandler: plugins.notify.onError("Error (styles): <%= error.message %>")
        }))
        .pipe(plugins.concat('css-files.css'));

    var mergedStream = merge(scssStream, cssStream)
        .pipe(plugins.plumber({
            errorHandler: plugins.notify.onError("Error (styles): <%= error.message %>")
        }))
        .pipe(plugins.concat('bundle.css'))
        .pipe(plugins.cleanCss({
            compatibility: 'ie8',
            level: {
                1: {
                    specialComments: 0
                }
            }
        }))
        .pipe(plugins.autoprefixer({
            browsers: cfg.autoprefixer,
            cascade: false
        }))
        .pipe(plugins.if((dev == true), plugins.sourcemaps.write('./')))
        .pipe(gulp.dest(cfg.paths.base.dest + cfg.paths.styles.dest))
        .pipe(plugins.if((dev == false), plugins.rev()))
        .pipe(plugins.if((dev == false), gulp.dest(cfg.paths.base.dest + cfg.paths.styles.dest)))
        .pipe(plugins.if((dev == false), plugins.rev.manifest()))
        .pipe(gulp.dest(cfg.paths.base.dest + cfg.paths.styles.dest))
        .pipe(plugins.if((dev == true), browserSync.reload({
            stream: true
        })));

    return mergedStream;

});

// Scripts
gulp.task('scripts', () => {
    var stream = streamQueue({
        objectMode: true
    });

    stream.queue(gulp.src(cfg.jsQueue));

    return stream.done()
        .pipe(plugins.plumber())
        .pipe(plugins.sourcemaps.init())
        .pipe(plugins.concat('bundle.js'))
        .pipe(plugins.if((dev == false), plugins.uglify()))
        .pipe(plugins.if((dev == false), plugins.rev()))
        .pipe(plugins.if((dev == true), plugins.sourcemaps.write('./')))
        .pipe(plugins.if((dev == false), gulp.dest(cfg.paths.base.dest + cfg.paths.scripts.dest)))
        .pipe(plugins.if((dev == false), plugins.rev.manifest()))
        .pipe(gulp.dest(cfg.paths.base.dest + cfg.paths.scripts.dest))
        .pipe(browserSync.reload({
            stream: true
        }));
});

gulp.task('scripts.vendors', () => {
    if (cfg.paths.vendors.scripts != null) {
        return gulp.src(cfg.paths.vendors.scripts)
            .pipe(plugins.plumber())
            .pipe(plugins.concat('_vendors.js'))
            .pipe(gulp.dest(cfg.paths.base.src + cfg.paths.scripts.src));
    }
});

// Static files copy
gulp.task('static', () => {
    return gulp.src(cfg.paths.base.src + cfg.paths.static.src + '/**')
        .pipe(plugins.plumber())
        .pipe(gulp.dest(cfg.paths.base.dest + cfg.paths.static.dest));
});

// Icon font
gulp.task('iconfont', ['iconfont.generate'], (cb) => {
    gulp.src([cfg.paths.base.dest + cfg.paths.static.dest + '/fonts/iconfont/_iconfont.scss'])
        .pipe(plugins.plumber())
        .pipe(gulp.dest(cfg.paths.base.src + cfg.paths.iconfont.dest));

    return del([cfg.paths.base.dest + cfg.paths.static.dest + '/fonts/iconfont/_iconfont.scss'], cb);
});

gulp.task('iconfont.generate', () => {
    return gulp.src([cfg.paths.base.src + cfg.paths.iconfont.src + '/*.svg'])
        .pipe(plugins.plumber())
        .pipe(plugins.iconfontCss({
            fontName: 'iconfont',
            path: cfg.paths.base.src + cfg.paths.iconfont.src + '/template.scss',
            targetPath: '_iconfont.scss',
            fontPath: '../static/fonts/iconfont/'
        }))
        .pipe(plugins.iconfont({
            fontName: 'iconfont',
            appendCodepoints: true,
            centerHorizontaly: true,
            normalize: true,
            prependUnicode: false,
            fontHeight: 1001,
            formats: ['ttf', 'eot', 'woff', 'woff2', 'svg'],
            timestamp: Math.round(Date.now() / 1000)
        }))
        .pipe(gulp.dest(cfg.paths.base.dest + cfg.paths.static.dest + '/fonts/iconfont/'));
});

// Images
gulp.task('images', function () {
    return gulp.src(cfg.paths.base.src + cfg.paths.images.src + '/*.*')
        .pipe(plugins.changed(cfg.paths.base.dest + cfg.paths.images.dest))    
        .pipe(plugins.plumber({
            errorHandler: plugins.notify.onError("Error (image optimize): <%= error.message %>")
        }))
        .pipe(plugins.imagemin({
            verbose: true,
            plugins: [
                plugins.imagemin.optipng({
                    optimizationLevel: 6
                })
            ]
        }))
        .pipe(gulp.dest(cfg.paths.base.dest + cfg.paths.images.dest));
});

// Clean unused assets
gulp.task('clean', (cb) => {
    return del(cfg.paths.base.dest, cb);
});

gulp.task('clean.css', (cb) => {
    // // Load manifests
    let manifestCSS = JSON.parse(fs.readFileSync(cfg.paths.base.dest + cfg.paths.styles.dest + '/rev-manifest.json'));

    return del([
        // Clean CSS
        cfg.paths.base.dest + cfg.paths.styles.dest + '/**',
        '!' + cfg.paths.base.dest + cfg.paths.styles.dest,
        '!' + cfg.paths.base.dest + cfg.paths.styles.dest + '/' + manifestCSS['bundle.css'],
        '!' + cfg.paths.base.dest + cfg.paths.styles.dest + '/' + manifestCSS['bundle.css'] + '.map',
        '!' + cfg.paths.base.dest + cfg.paths.styles.dest + '/rev-manifest.json'
    ], cb);
});

gulp.task('clean.js', (cb) => {
    // Load manifests
    let manifestJS = JSON.parse(fs.readFileSync(cfg.paths.base.dest + cfg.paths.scripts.dest + '/rev-manifest.json'));

    return del([
        // Clean JS
        cfg.paths.base.dest + cfg.paths.scripts.dest + '/**',
        '!' + cfg.paths.base.dest + cfg.paths.scripts.dest,
        '!' + cfg.paths.base.dest + cfg.paths.scripts.dest + '/' + manifestJS['bundle.js'],
        '!' + cfg.paths.base.dest + cfg.paths.scripts.dest + '/' + manifestJS['bundle.js'] + '.map',
        '!' + cfg.paths.base.dest + cfg.paths.scripts.dest + '/rev-manifest.json'
    ], cb);
});

// Watch
gulp.task('watch', ['default'], () => {
    dev = true;
    // Watch CSS
    gulp.watch(cfg.paths.base.src + cfg.paths.styles.src + '/**/*.scss', () => {
        return new Promise(resolve => {
            runSequence('styles', 'clean.css', resolve);
        });
    });
    // Watch JS
    gulp.watch(cfg.paths.base.src + cfg.paths.scripts.src + '/**/*.js', () => {
        return new Promise(resolve => {
            runSequence('scripts', 'clean.js', resolve);
        });
    });
});

// Browsersync
gulp.task('sync', ['watch'], () => {
    dev = true;
    browserSync.init({
        ghostMode: {
            scroll: false
        },
        notify: false,
        open: cfg.browserSync.open,
        proxy: cfg.browserSync.url,
        port: 5757,
        files: [
            '**/*.{html,php}'
        ]
    });
});

// Default gulp task
gulp.task('default', () => {
    dev = true;
    return new Promise(resolve => {
        runSequence(['scripts.vendors'], 'iconfont', ['images', 'styles', 'scripts', 'static'], resolve);
    });
});

// Production gulp task
gulp.task('build', () => {
    dev = false;
    return new Promise(resolve => {
        runSequence(['scripts.vendors'], 'iconfont', ['images', 'styles', 'scripts', 'static'], ['clean.css', 'clean.js'], resolve);
    });
});