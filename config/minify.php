<?php

return [
	//config
	'combine' => true,

	// css files
	'css' => [
		'min_path' => 'css/main.min.css',
		'files' => [
			'vendors/jquery-ui/jquery-ui.min.css',
			'vendors/bootstrap/css/bootstrap.min.css',
			'vendors/font-awesome/css/font-awesome.min.css',
			'vendors/animate.css',
			'vendors/owlcarousel/assets/owl.carousel.min.css',
			'vendors/owlcarousel/assets/owl.theme.default.min.css',
			'vendors/smartmenus/css/sm-core-css.css',
			'vendors/smartmenus/css/sm-simple/sm-simple.css',
			'vendors/smartmenus/addons/bootstrap-4/jquery.smartmenus.bootstrap-4.css',
			'stylesheets/app.css',
		],
	],

	//js file
	'js' => [
		'min_path' => 'js/main.min.js',
		'files' => [
			'vendors/jquery-3.7.1.min.js',
			'vendors/jquery-migrate-3.4.1.min.js',
			'vendors/jquery-ui/jquery-ui.min.js',
			'vendors/smartmenus/jquery.smartmenus.min.js',
			'vendors/popper.min.js',
			'vendors/jquery.easing.min.js',
			'vendors/bootstrap/js/bootstrap.min.js',
			'vendors/owlcarousel/owl.carousel.min.js',
			'vendors/smartmenus/addons/bootstrap-4/jquery.smartmenus.bootstrap-4.js',
			'vendors/jquery.rd-navbar.min.js',
			'vendors/Chart.min.js',
			'vendors/chartjs-plugin-datalabels.js',
			'js/custom.js',
		],
	],
];
