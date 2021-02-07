<?php
	
	/********************/
	/* Define Constants */
	/********************/
	define('CONFIGURATOR_NAME', 'configurator');

	define('CONFIGURATOR_DIR', get_template_directory());
	define('CONFIGURATOR_URI', get_template_directory_uri());
		
	define('CONFIGURATOR_FRAMEWORK',     CONFIGURATOR_DIR . '/framework');
	define('CONFIGURATOR_FRAMEWORK_URI', CONFIGURATOR_URI . '/framework');

	define( 'CONFIGURATOR_CUSTOMIZER',			CONFIGURATOR_FRAMEWORK . 		'/customizer' );
	define( 'CONFIGURATOR_CUSTOMIZER_URI',		CONFIGURATOR_FRAMEWORK_URI . 	'/customizer' );

	//Wordpress Admin
	define( 'CONFIGURATOR_ADMIN',				CONFIGURATOR_FRAMEWORK . 		'/admin' );
	define( 'CONFIGURATOR_ADMIN_URI',			CONFIGURATOR_FRAMEWORK_URI . 	'/admin' );

	define('CONFIGURATOR_CUSTOM_STYLES',		CONFIGURATOR_FRAMEWORK . 		'/custom_styles');
	define('CONFIGURATOR_CUSTOM_STYLES_URI', 	CONFIGURATOR_FRAMEWORK_URI . 	'/custom_styles');
		
	define('CONFIGURATOR_PLUGINS', 		 		CONFIGURATOR_FRAMEWORK . 		'/plugins');
	define('CONFIGURATOR_PLUGINS_URI', 	 		CONFIGURATOR_FRAMEWORK_URI . 	'/plugins');	
	define( 'CONFIGURATOR_HELPERS',				CONFIGURATOR_FRAMEWORK . 		'/helpers' );
	define( 'CONFIGURATOR_HELPERS_URI',			CONFIGURATOR_FRAMEWORK_URI .   '/helpers' );
	define('CONFIGURATOR_FUNCTIONS', 		 	CONFIGURATOR_FRAMEWORK . 		'/required-functions');
	define('CONFIGURATOR_FUNCTIONS_URI',	 	CONFIGURATOR_FRAMEWORK_URI .  '/required-functions');
	define('CONFIGURATOR_WIDGETS', 		 		CONFIGURATOR_FRAMEWORK . 		'/widgets');
	define('CONFIGURATOR_ADMIN_EDITOR', 	 	CONFIGURATOR_FRAMEWORK . 		'/editor');
	define('CONFIGURATOR_ADMIN_EDITOR_URI', 	CONFIGURATOR_FRAMEWORK_URI .  '/editor');
	define('CONFIGURATOR_ADMIN_OPTION',			CONFIGURATOR_FRAMEWORK .		'/theme-options');
	define( 'CONFIGURATOR_EXTRAS',				CONFIGURATOR_FRAMEWORK . 		'/extras' );
	define( 'CONFIGURATOR_EXTRAS_URI',			CONFIGURATOR_FRAMEWORK_URI . 	'/extras' );
	
	configurator_require_file ( CONFIGURATOR_FRAMEWORK. '/tgm-config.php'); //Install required plugins
	
	configurator_require_file ( CONFIGURATOR_HELPERS . '/helpers.php' ); //Helper ThemeFuntion
	
	configurator_require_file ( CONFIGURATOR_HELPERS . '/header-helpers.php' ); //Theme Header functions
	
	configurator_require_file ( CONFIGURATOR_HELPERS . '/blog-helpers.php' ); //Theme Header functions

	configurator_require_file ( CONFIGURATOR_HELPERS . '/customizer-helpers.php' ); //Theme Header functions
	

	if ( class_exists( 'Woocommerce' ) ) {
		configurator_require_file ( CONFIGURATOR_HELPERS .			'/woo-helpers.php' ); //Theme Header functions
	}

	configurator_require_file( CONFIGURATOR_EXTRAS. 		'/extras.php' ); //Install required plugins

	/* Admin File */
	configurator_require_file ( CONFIGURATOR_ADMIN . '/admin.php' );
	
	if( class_exists( 'Kirki' ) ) {
		configurator_require_file ( CONFIGURATOR_CUSTOMIZER . '/customizer.php' );
	}
	

	configurator_require_file ( CONFIGURATOR_WIDGETS . '/widgets.php' ); //All Widgets
	
	/*******************/
	/* Include Plugins */
	/*******************/
	configurator_require_file ( CONFIGURATOR_PLUGINS . '/plugins.php' );

