var elixir = require('laravel-elixir');

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
var nodeModules = '../../../node_modules';


elixir(function(mix) {
    // mix.sass('app.scss');
    
    // mix.copy('node_modules/bootstrap/fonts', 'public/build/fonts');
    // mix.copy('node_modules/ionicons/dist/fonts', 'public/build/fonts');
    // mix.copy('node_modules/font-awesome/fonts', 'public/build/fonts');
    // mix.copy('node_modules/datatables.net-dt/images', 'public/build/images');
    // mix.copy('node_modules/summernote/dist/font', 'public/build/css/font');
    // mix.copy('node_modules/icheck/skins/square/blue.png', 'public/build/css');

	mix.styles([		
        nodeModules + '/bootstrap/dist/css/bootstrap.min.css',

        nodeModules + '/admin-lte/dist/css/AdminLTE.min.css',
        nodeModules + '/admin-lte/dist/css/skins/_all-skins.css',
        nodeModules + '/admin-lte/plugins/daterangepicker/daterangepicker.css',
        nodeModules + '/animate.css/animate.css',
        nodeModules + '/bootstrap-datepicker/dist/css/bootstrap-datepicker.css',
        // nodeModules + '/bootstrap-material-design/dist/css/bootstrap-material-design.css',
        // nodeModules + '/bootstrap-material-design/dist/css/ripples.css',
        // nodeModules + '/datatables.net-bs/css/dataTables.bootstrap.css',
        // nodeModules + '/datatables.net-buttons-dt/css/buttons.dataTables.css',
        // nodeModules + '/datatables.net-dt/css/jquery.dataTables.css',
        nodeModules + '/dropzone/dist/dropzone.css',
        nodeModules + '/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css',
        nodeModules + '/font-awesome/css/font-awesome.css',
        nodeModules + '/icheck/skins/square/blue.css',
        nodeModules + '/ionicons/dist/css/ionicons.css',
        nodeModules + '/select2-bootstrap-theme/dist/select2-bootstrap.css',
        nodeModules + '/select2/dist/css/select2.css',
        nodeModules + '/morris.js/morris.css',
        nodeModules + '/summernote/dist/summernote.css',
        'my-css-updates.css',
        // 'btn-raised.css',
	]);

	mix.scripts([		
        nodeModules + '/jquery/dist/jquery.js',
        nodeModules + '/bootstrap/dist/js/bootstrap.js',
        nodeModules + '/admin-lte/plugins/daterangepicker/moment.js',
        
        nodeModules + '/admin-lte/dist/js/app.js',
        nodeModules + '/admin-lte/plugins/daterangepicker/daterangepicker.js',
        nodeModules + '/bootbox/bootbox.js',
        nodeModules + '/bootstrap-datepicker/dist/js/bootstrap-datepicker.js',
        nodeModules + '/bootstrap-timepicker/js/bootstrap-timepicker.js',
        // nodeModules + '/bootstrap-material-design/dist/js/material.js',
        // nodeModules + '/bootstrap-material-design/dist/js/ripples.js',
        // nodeModules + '/datatables.net-buttons/js/dataTables.buttons.js',
        // nodeModules + '/datatables.net/js/jquery.dataTables.js',
        nodeModules + '/dropzone/dist/dropzone.js',
        nodeModules + '/eonasdan-bootstrap-datetimepicker/src/js/bootstrap-datetimepicker.js',
        nodeModules + '/icheck/icheck.js',
        nodeModules + '/morris.js/morris.js',
        nodeModules + '/raphael/raphael.js',
        nodeModules + '/chart.js/dist/Chart.js',
        nodeModules + '/js-cookie/src/js.cookie.js',
        nodeModules + '/select2/dist/js/select2.js',
        nodeModules + '/summernote/dist/summernote.js',

        // nodeModules + '/datatables.net-bs/js/dataTables.bootstrap.js',
        'app.js',
        'ajaxSetup.js',
        'myFormSubmit.js',
        'confirmBeforeDestroy.js',
        'destroyFlashMessage.js',
	]);

    // mix.browserify('passwords/app.js', 'public/js/passwords.js');
    mix.browserify('escalations/app.js');

	mix.version([
        'js/all.js', 
        'js/app.js', 
		'css/all.css'
	]);

	// mix.browserSync({
	// 	browser: "google chrome",
 //        proxy: 'localhost:8000',
 //        port: 8000
	// });
    
});