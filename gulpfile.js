var elixir = require('laravel-elixir');

elixir(function(mix) {
	// jQuery
    mix.copy('node_modules/jquery/dist/jquery.min.js','resources/assets/js/');

    // Bootstrap
    mix.copy('node_modules/bootstrap/dist/js/bootstrap.min.js','resources/assets/js/');
    mix.copy('node_modules/bootstrap/dist/css/bootstrap.min.css','resources/assets/css/');
    mix.copy('node_modules/bootstrap/dist/fonts/','public/assets/fonts/');

	// AdminLTE
	mix.copy('node_modules/admin-lte/dist/js/app.min.js','resources/assets/js/adminlte.min.js');
    mix.copy('node_modules/admin-lte/dist/img/','public/assets/images/');
	mix.copy('node_modules/admin-lte/dist/css/AdminLTE.min.css','resources/assets/css/adminlte.min.css');
	mix.copy('node_modules/admin-lte/dist/css/skins/skin-black.min.css','resources/assets/css/adminlte-skin.min.css');
    mix.copy('node_modules/admin-lte/plugins/*','public/assets/plugins/');

    // Ionicons
    mix.copy('node_modules/ionicons/dist/css/ionicons.min.css','resources/assets/css/');
    mix.copy('node_modules/ionicons/dist/fonts/','public/assets/fonts/');

    // Font-Awesome
    mix.copy('node_modules/font-awesome/css/font-awesome.min.css','resources/assets/css/');
    mix.copy('node_modules/font-awesome/fonts/','public/assets/fonts/');

    // 合并指定文件夹的CSS样式文件
    mix.styles([
        'bootstrap.min.css',
        'font-awesome.min.css',
        'ionicons.min.css',
        'adminlte.min.css',
        'adminlte-skin.min.css',
        'common.css'
    ],'public/assets/css/app.min.css');

    // 合并指定文件夹的Javascript脚本文件
    mix.scripts([
        'jquery.min.js',
        'bootstrap.min.js',
        'adminlte.min.js'
    ],'public/assets/js/app.min.js');

    // 监控文件变动，自动刷新浏览器
    mix.browserSync({
        files: ['app/**/*', 'public/**/*', 'resources/views/**/*'],
        port: 5000,
        proxy: 'localhost:8000'
    });
});


