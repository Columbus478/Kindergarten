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

// gulp init
var gulp = require('gulp'),
    gp_concat = require('gulp-concat'),
    gp_rename = require('gulp-rename'),
    gp_uglify = require('gulp-uglify'),
    gp_watch  = require('gulp-watch');
    // sass = require(' gulp-ruby-sass');
    const sass = require('gulp-ruby-sass');

//script files
gulp.task('js-fef', function(){
    return gulp.src('public/js/*.js')
        .pipe(gp_concat('concat.js'))
        .pipe(gulp.dest('minjs'))
        .pipe(gp_rename('uglify.js'))
        .pipe(gp_uglify())
        .pipe(gulp.dest('minjs'));
});

//style files

gulp.task('sass', () =>
    sass('public/css/*.scss')
        .on('error', sass.logError)
        .pipe(gulp.dest('result'))
);
// gulp.task('scss-fef', function(){
//     return gulp.src('public/css/*.scss')
               
//         .pipe(sass())
//         .pipe(gulp.dest('minscss'));
  
// });

 // watch
  gulp.task('watch',function(){
  	gulp.watch('public/js/*.js',['js-fef']);
  });

  //run
gulp.task('default', ['js-fef','sass','watch']);
 