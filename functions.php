<?php
/**
 * Chalets et caviar functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Chalets_et_caviar
 */

if ( ! function_exists( 'chaletsetcaviar_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function chaletsetcaviar_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Chalets et caviar, use a find and replace
		 * to change 'chaletsetcaviar' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'chaletsetcaviar', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'chaletsetcaviar' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		/*add_theme_support( 'custom-background', apply_filters( 'chaletsetcaviar_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );*/
		//EDIT, Do not need for our theme

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'chaletsetcaviar_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function chaletsetcaviar_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'chaletsetcaviar_content_width', 1170 ); //--EDIT-- Max width of imported content default 640
}
add_action( 'after_setup_theme', 'chaletsetcaviar_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function chaletsetcaviar_scripts() {
	wp_enqueue_style( 'chaletsetcaviar-style', get_stylesheet_uri() );

	wp_enqueue_style( 'chaletsetcaviar-custom-style', get_template_directory_uri() . '/css/style.css' ); // Our own custom CSS file

	wp_enqueue_style( 'chaletsetcaviar-bs-style', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css', array(), '4.0.0' ); //Bootstrap 4 from CDN

	wp_enqueue_style( 'chaletsetcaviar-fontawsome-style', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' ); //Font Awsome from CDN

	wp_enqueue_script( 'chaletsetcaviar-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'chaletsetcaviar-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'pooper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', false, '1.12.9', true ); // register the pooper js for BS
	//wp_enqueue_script('pooper');

	wp_enqueue_script( 'chaletsetcaviar-bs-js', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array('jquery'), '4.0.0', true ); //And register the BS

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'chaletsetcaviar_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 *Needed Plugins.
 */
//require get_template_directory() . '/inc/required-plugins.php'; EDIT - Included directly into the theme
include_once('advanced-custom-fields/acf.php');
require get_template_directory() . '/inc/acf_paramaters.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
