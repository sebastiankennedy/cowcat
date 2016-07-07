var elixir = require('laravel-elixir');

elixir(function (mix) {
    // jQuery
    mix.copy('node_modules/jquery/dist/jquery.min.js', 'resources/assets/backend/js/');

    // Bootstrap
    mix.copy('node_modules/bootstrap/dist/js/bootstrap.min.js', 'resources/assets/backend/js/');
    mix.copy('node_modules/bootstrap/dist/css/bootstrap.min.css', 'resources/assets/backend/css/');
    mix.copy('node_modules/bootstrap/dist/fonts/', 'public/assets/backend/fonts/');

    // AdminLTE
    mix.copy('node_modules/admin-lte/dist/img/', 'public/assets/backend/images/');
    mix.copy('node_modules/admin-lte/dist/js/app.min.js', 'resources/assets/backend/js/adminlte.min.js');
    mix.copy('node_modules/admin-lte/dist/css/AdminLTE.min.css', 'resources/assets/backend/css/adminlte.min.css');
    mix.copy('node_modules/admin-lte/dist/css/skins/skin-black.min.css', 'resources/assets/backend/css/adminlte-skin.min.css');

    mix.copy('node_modules/admin-lte/plugins/*', 'public/assets/backend/plugins/');
    mix.copy("node_modules/admin-lte/plugins/select2/select2.min.css", "resources/assets/backend/css/");
    mix.copy("node_modules/admin-lte/plugins/select2/select2.full.min.js", "resources/assets/backend/js/");
    mix.copy("node_modules/admin-lte/plugins/daterangepicker/moment.min.js", "resources/assets/backend/js/");
    mix.copy("node_modules/admin-lte/plugins/daterangepicker/daterangepicker.js", "resources/assets/backend/js/");
    mix.copy("node_modules/admin-lte/plugins/daterangepicker/daterangepicker-bs3.css", "resources/assets/backend/css/");

    // Font-Awesome
    mix.copy('node_modules/font-awesome/css/font-awesome.min.css', 'resources/assets/backend/css/');
    mix.copy('node_modules/font-awesome/fonts/', 'public/build/assets/backend/fonts/');

    // Login Background Images
    mix.copy('resources/assets/images/background/', 'public/assets/backend/images/background/');

    // SweetAlter
    mix.copy("node_modules/sweetalert/dist/sweetalert.css", "resources/assets/backend/css");
    mix.copy("node_modules/sweetalert/dist/sweetalert.min.js", "resources/assets/backend/js");

    // 合并指定文件夹的CSS样式文件
    mix.styles([
        'select2.min.css',
        'daterangepicker-bs3.css',
        'bootstrap.min.css',
        'font-awesome.min.css',
        'adminlte.min.css',
        'adminlte-skin.min.css',
        'sweetalert.css',
        'common.css'
    ], 'public/assets/backend/css/app.min.css','resources/assets/backend/css');

    // 合并指定文件夹的Javascript脚本文件
    mix.scripts([
        'jquery.min.js',
        'bootstrap.min.js',
        'select2.full.min.js',
        'moment.min.js',
        'daterangepicker.js',
        'adminlte.min.js',
        'sweetalert.min.js',
        'common.js'
    ], 'public/assets/backend/js/app.min.js','resources/assets/backend/js');

    // 监控文件变动，自动刷新浏览器
    mix.browserSync({
        files: ['app/**/*', 'public/**/*', 'resources/views/**/*'],
        port: 5000,
        proxy: 'localhost:8000'
    });

    // 生成版本和缓存清除
    mix.version(['assets/backend/js/app.min.js', 'assets/backend/css/app.min.css']);
});


