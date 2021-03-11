var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('default', ['styles']);

gulp.task('styles', function () {
    return gulp.src('./assets/sass/style.scss')
        .pipe(sass({outputStyle: 'compressed'})
            .on('error', sass.logError)
        )
        .pipe(gulp.dest('./'));
});
/*
gulp.task('scripts', function() {
    gulp.src(['./development/js/scripts.js'])
        .pipe( include() )
        .pipe( minify() )
        .pipe( gulp.dest("./") );
});
*/

gulp.task('watch', function () {
    gulp.watch('./assets/sass/**/*.scss', ['styles'] );
    //gulp.watch('./development/js/*.js', ['scripts'] );
});