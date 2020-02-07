const gulp        = require('gulp');
const runSequence = require('run-sequence');

const jsTask = require('lvgs-laravel-gulp').JsTask;
const bootstrap = require('lvgs-bootstrap-admin')();

gulp.task('default', () => {
    runSequence([
        'bootstrap',
        'js',
    ]);
});

gulp.task('watch', () => {
    runSequence([
        'bootstrap_watch',
        'js_watch',
    ]);
});

gulp.task('js', () => {
    runSequence([
        '_js_pages',
        '_js_common_pc',
        '_js_common_sp',
        '_js_head_pc',
        '_js_head_sp',
    ]);
});

gulp.task('js_watch', () => {
    runSequence([
        '_js_pages_watch',
        '_js_common_pc_watch',
        '_js_common_sp_watch',
        '_js_head_pc_watch',
        '_js_head_sp_watch',
    ]);
});

bootstrap.importTasks(gulp);

jsTask.globalOption('aliases', {
    "@modules": "./resources/assets/js/modules",
    "@views":   "./resources/views",
});

gulp.task('_js_pages',     jsTask.task('{pc,sp}/pages/**/*.js'));
gulp.task('_js_common_pc', jsTask.bundle('pc/common.js').task('pc/common/**/*.js'));
gulp.task('_js_common_sp', jsTask.bundle('sp/common.js').task('sp/common/**/*.js'));
gulp.task('_js_head_pc',   jsTask.bundle('pc/head.js').task('pc/head/**/*.js'));
gulp.task('_js_head_sp',   jsTask.bundle('sp/head.js').task('sp/head/**/*.js'));

gulp.task('_js_pages_watch',     jsTask.watch('{pc,sp}/pages/**/*.js'));
gulp.task('_js_common_pc_watch', jsTask.bundle('pc/common.js').watch('pc/common/**/*.js'));
gulp.task('_js_common_sp_watch', jsTask.bundle('sp/common.js').watch('sp/common/**/*.js'));
gulp.task('_js_head_pc_watch',   jsTask.bundle('pc/head.js').watch('pc/head/**/*.js'));
gulp.task('_js_head_sp_watch',   jsTask.bundle('sp/head.js').watch('sp/head/**/*.js'));
