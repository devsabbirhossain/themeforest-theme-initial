<?php 
    if ( ! defined( 'ABSPATH' ) ) { 
        die( 'Direct access forbidden.' ); 
    }

    /**
     * define some values like theme url, theme textdomain, version etc.
     */
    //---shorthand constants
	define( 'DEVSABBIR_THEME', 'Dev Sabbir' );
	define( 'DEVSABBIR_VERSION', '1.0.0' );
	define( 'DEVSABBIR_MINWP_VERSION', '1.0.0' );
	define( 'DEVSABBIR_TEXTDOMAIN', 'devsabbir' );
    // echo DEVSABBIR_TEXTDOMAIN;

    // define('DEVSABBIR_', '');

	//-----------------------------------------------------------
	//---shorthand constants for theme assets url
	define( 'DEVSABBIR_THEME_URI', get_template_directory_uri() );
	define( 'DEVSABBIR_ADMIN_URI', DEVSABBIR_THEME_URI.'/assets/admin' );
	define( 'DEVSABBIR_FRONTEND_URI', DEVSABBIR_THEME_URI.'/assets/frontend' );

	define( 'DEVSABBIR_ADMIN_IMG_URI', DEVSABBIR_ADMIN_URI.'/images' );
	define( 'DEVSABBIR_ADMIN_CSS_URI', DEVSABBIR_ADMIN_URI.'/css' );
	define( 'DEVSABBIR_ADMIN_JS_URI', DEVSABBIR_ADMIN_URI.'/js' );

    define( 'DEVSABBIR_FRONTEND_IMG_URI', DEVSABBIR_FRONTEND_URI.'/images' );
	define( 'DEVSABBIR_FRONTEND_CSS_URI', DEVSABBIR_FRONTEND_URI.'/css' );
	define( 'DEVSABBIR_FRONTEND_JS_URI', DEVSABBIR_FRONTEND_URI.'/js' );

	//------------------------------------------------------------
	//---shorthand constants for theme assets directory path
	define( 'DEVSABBIR_THEME_DIR', get_template_directory() );
	define( 'DEVSABBIR_ADMIN_DIR', DEVSABBIR_THEME_DIR.'/assets/admin' );
	define( 'DEVSABBIR_FRONTEND_DIR', DEVSABBIR_THEME_DIR.'/assets/frontend' );

	define( 'DEVSABBIR_ADMIN_IMG_DIR', DEVSABBIR_ADMIN_DIR.'/images' );
	define( 'DEVSABBIR_ADMIN_CSS_DIR', DEVSABBIR_ADMIN_DIR.'/css' );
	define( 'DEVSABBIR_ADMIN_JS_DIR', DEVSABBIR_ADMIN_DIR.'/js' );

    define( 'DEVSABBIR_FRONTEND_IMG_DIR', DEVSABBIR_FRONTEND_DIR.'/images' );
	define( 'DEVSABBIR_FRONTEND_CSS_DIR', DEVSABBIR_FRONTEND_DIR.'/css' );
	define( 'DEVSABBIR_FRONTEND_JS_DIR', DEVSABBIR_FRONTEND_DIR.'/js' );


    //------------------------------------------------------------
	//---shorthand constants for theme assets directory path
	define( 'DEVSABBIR_INC', DEVSABBIR_THEME_DIR.'/inc');
	define( 'DEVSABBIR_INC_ADMIN', DEVSABBIR_THEME_DIR.'/assets/css' );
	define( 'DEVSABBIR_INC_FRONTEND', DEVSABBIR_THEME_DIR.'/assets/js' );

    /**
     * after setup action hook setup
     */
    if( ! function_exists( 'devsabbir_after_setup_theme_function' )):
        function devsabbir_after_setup_theme_function(){
            /*
            * Make Theme available for translation.
            */
            load_theme_textdomain( DEVSABBIR_TEXTDOMAIN, DEVSABBIR_THEME_DIR . '/languages' );

            // Add RSS feed links to <head> for posts and comments.
            add_theme_support( 'automatic-feed-links' );

            add_theme_support( 'custom-background');
            add_theme_support( 'title-tag' );

            // Enable support for Post Thumbnails.
            add_theme_support( 'post-thumbnails' );
        }
    endif;
    add_action( 'after_setup_theme', 'devsabbir_after_setup_theme_function' );


    /**
     * wp_enqueue_script this hook is use to show js and css file in frontend
     */
    function devsabbir_wp_enqueue_script_function(){
        wp_enqueue_script( 'devsabbir_custom', DEVSABBIR_FRONTEND_JS_DIR . '/custom.js', [ 'jquery' ], '1.0.0', true );
    }
    add_action( 'wp_enqueue_scripts', 'devsabbir_wp_enqueue_script_function' );

    if( file_exists( DEVSABBIR_INC . '/init.php' ) ){
        require_once( DEVSABBIR_INC . '/init.php' );
    }


