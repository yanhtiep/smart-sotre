//var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

// elixir(function(mix) {
//     mix.sass('app.scss');
// });

var gulp = require('gulp');
var ugligy = require('gulp-uglify');
var concat = require('gulp-concat');
var cssMin = require('gulp-css');

gulp.task('css', function(){

    gulp.src([
        './public/assets/backEnd/template/css/bootstrap.min.css',
        './public/assets/backEnd/template/css/bootstrap-reset.css',
        './public/assets/backEnd/template/css/animate.css',
        './public/assets/backEnd/template/font-awesome/css/font-awesome.css',
        './public/assets/backEnd/template/ionicon/css/ionicons.min.css',
        './public/assets/backEnd/template/tagsinput/jquery.tagsinput.css',
        './public/assets/backEnd/template/toggles/toggles.css',
        './public/assets/backEnd/template/timepicker/bootstrap-timepicker.min.css',
        './public/assets/backEnd/template/timepicker/bootstrap-datepicker.min.css',
        './public/assets/backEnd/template/colorpicker/colorpicker.css',
        './public/assets/backEnd/template/jquery-multi-select/multi-select.css',
        './public/assets/backEnd/template/select2/select2.css',
        './public/assets/backEnd/template/sweet-alert/sweet-alert.min.css',
        './public/assets/backEnd/template/dropzone/dropzone.css',
        './public/assets/backEnd/template/form-wizard/jquery.steps.css',
        './public/assets/backEnd/template/css/style.css',
        './public/assets/backEnd/template/css/helper.css',
        './public/assets/backEnd/template/css/style-responsive.css',
        './public/assets/backEnd/template/css/editor.css',
        './public/assets/backEnd/template/css/custom.css'
    ])
        .pipe(concat('app.css'))
        .pipe(cssMin())
        .pipe(gulp.dest('./public/assets/backEnd/template/css'))

});

gulp.task('js', function(){

    gulp.src([
        './public/assets/backEnd/template/js/jquery-2.1.4.min.js',
        './public/assets/backEnd/template/js/bootstrap.min.js',
        './public/assets/backEnd/template/js/modernizr.min.js',
        './public/assets/backEnd/template/js/pace.min.js',
        './public/assets/backEnd/template/js/wow.min.js',
        './public/assets/backEnd/template/js/jquery.nicescroll.js',
        './public/assets/backEnd/template/tagsinput/jquery.tagsinput.min.js',
        './public/assets/backEnd/template/toggles/toggles.min.js',
        './public/assets/backEnd/template/timepicker/bootstrap-timepicker.min.js',
        './public/assets/backEnd/template/timepicker/bootstrap-datepicker.js',
        './public/assets/backEnd/template/colorpicker/bootstrap-colorpicker.js',
        './public/assets/backEnd/template/jquery-multi-select/jquery.multi-select.js',
        './public/assets/backEnd/template/jquery-multi-select/jquery.quicksearch.js',
        './public/assets/backEnd/template/bootstrap-inputmask/bootstrap-inputmask.min.js',
        './public/assets/backEnd/template/spinner/spinner.min.js',
        './public/assets/backEnd/template/select2/select2.min.js',
        './public/assets/backEnd/template/form-wizard/bootstrap-validator.min.js',
        './public/assets/backEnd/template/form-wizard/jquery.steps.min.js',
        './public/assets/backEnd/template/jquery.validate/jquery.validate.min.js',
        './public/assets/backEnd/template/form-wizard/wizard-init.js',
        './public/assets/backEnd/template/sweet-alert/sweet-alert.min.js',
        './public/assets/backEnd/template/sweet-alert/sweet-alert.init.js',
        './public/assets/backEnd/template/js/editor.js',
        './public/assets/backEnd/template/js/jquery.app.js',
        './public/assets/backEnd/template/dropzone/dropzone.min.js'
    ])
        .pipe(concat('app.js'))
        .pipe(ugligy())
        .pipe(gulp.dest('./public/assets/backEnd/template/js'))


});


gulp.task('default',['css','js']);