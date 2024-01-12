//----------------------------------------------------------------------
//  モード
//----------------------------------------------------------------------
"use strict";

//----------------------------------------------------------------------
//  モジュール読み込み
//----------------------------------------------------------------------
const { src, dest, series, parallel, watch } = require("gulp");

const sass = require('gulp-dart-sass');
const sourcemaps = require('gulp-sourcemaps');
const autoprefixer = require('gulp-autoprefixer');
const postcss = require('gulp-postcss');
const purgecss = require('gulp-purgecss')
const plumber = require('gulp-plumber')//空値や誤記でwatchをとめない
const notify = require("gulp-notify"); // エラー発生時のアラート出力
const mqpacker = require('css-mqpacker'); //メディアクエリをまとめる
const cleancss = require('gulp-clean-css')
const uglify = require("gulp-uglify");
const rename = require("gulp-rename");
const del = require('del');
const bs = require('browser-sync');

//----------------------------------------------------------------------
//  定数設定
//----------------------------------------------------------------------
const proj = {
  dev: "./",
  pro: "./dist/"
}

const paths = {
  clean: {
    src: `${proj.pro}**`
  },
	css: {
    src: `${proj.dev}css/**`,
		dest: `${proj.pro}css`,
	},
  scss: {
		src: `${proj.dev}sass/*.scss`,
		dest: `${proj.dev}css`,
  },
  html: {
		src: `${proj.dev}**/*.html`,
  },
  php: {
		src: `${proj.dev}**/*.php`,
  },
  js: {
		src: `${proj.dev}js/**/*.js`,
		dest: `${proj.pro}js`,
  },
}

const TARGET_BROWSERS = [
    "last 2 versions",
    "ie >= 11",
    "Android >= 4"
];

//----------------------------------------------------------------------
//  関数定義
//----------------------------------------------------------------------

const clean = (done) => {
  del(paths.clean.src)
  done()
}

const development = (done) => {
  src(paths.scss.src, {
  sourcemaps: true
  })
  .pipe(sourcemaps.init())
  .pipe(plumber({
  errorHandler: function(err) {
    console.log(err.messageFormatted);
    this.emit('end');
    }
  }))
  .pipe(sass({ outputStyle: 'expanded' }))
  .pipe(autoprefixer(TARGET_BROWSERS))
  .pipe(postcss([mqpacker()])) // メディアクエリをまとめる
  .pipe(sourcemaps.write())
  .pipe(dest(paths.scss.dest))
  .pipe(notify({
    message: 'Sassをコンパイルしました！',
    onLast: true
  }))

  done()
}

const production = (done) => {
  // CSS
  src(paths.css.src)
    .pipe(
      purgecss({
        content: [
          paths.html.src,
          paths.php.src,
          paths.js.src
        ],
      })
    )
    .pipe(sourcemaps.init())
    .pipe(cleancss())
    .pipe(sourcemaps.write('./'))
    .pipe(dest(paths.css.dest))

  // JS
  src(paths.js.src, {
      sourcemaps: true
    })
    .pipe(sourcemaps.init())
    .pipe(uglify())
    // .pipe(rename({
    //     extname: '.min.js'
    // }))
    .pipe(sourcemaps.write('./'))
    .pipe(dest(paths.js.dest))
  done()
}

const bsInit = (done) => {
  bs.init({
    proxy: "http://wp-insole.localhost",
    host: "http://wp-insole.localhost",
    port: 80,
    notify: false,             // ブラウザ更新時に出てくる通知を非表示にする
		injectChanges: true
  });

  done();
}

const bsReload = (done) => {
  console.log('bs reload')
  bs.reload();

  done();
}

function watchTask(done) {
  watch(
    ["./**/*.scss", "!./*.css"],           // 監視対象とするパスはお好みで
    series(development, bsReload)   // 実行するタスク
  );
  done();
}

//----------------------------------------------------------------------
//  タスク定義
//----------------------------------------------------------------------
exports.clean = clean;
exports.development = series(development, bsInit, bsReload, watchTask);
exports.production = series(production);

/************************************************************************/
/*  END OF FILE                                                         */
/************************************************************************/
