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

if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'postCarousel', 800, 400,false );
}

/*
*Overriding the gallery component from Wordpress to output a carousel gallery
*/
add_filter('post_gallery','chaletsetcaviar_customFormatGallery',10,2);

function chaletsetcaviar_customFormatGallery($string,$attr){
	//creating a static instance to avoid the multiple galeries on page
	static $instance = 0;
	$instance++;

    $output = '<div id="pageCarousel-'.$instance.'" class="carousel slide postCarouselContainer mx-4" data-ride="carousel">';
		$output .= '<div class="carousel-inner" role="listbox">';
    $posts = get_posts(array(
			//'include' => $attr['ids'],
			'post__in' => explode(',',$attr['ids']),
			'orderby' => 'post__in',
			'post_type' => 'attachment'
		));
		$i = 0;
    foreach($posts as $imagePost){
			$i+=1;
			if($i == 1){
				$output .='<div class="carousel-item active">';
			}else{
				$output .='<div class="carousel-item">';
			}
				$output .= '<a class="carouselPostFlex" href="'.wp_get_attachment_image_src($imagePost->ID, 'full')[0].'" data-toggle="lightbox">';
        $output .= '<img class="d-block img-fluid" src="'.wp_get_attachment_image_src($imagePost->ID, 'postCarousel')[0].'" alt="'.$imagePost->post_title.'" width="'.wp_get_attachment_image_src($imagePost->ID, 'postCarousel')[1].'" height="'.wp_get_attachment_image_src($imagePost->ID, 'postCarousel')[2].'" />';
				$output .="</a><!-- End  carouselPostFlex -->";
				$output .="</div><!-- End  carousel-item -->";
    }

    $output .= '</div><!-- End carousel-inner -->
		<a class="carousel-control-prev" href="#pageCarousel-'.$instance.'" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only">Precedent</span>
  	</a>
  	<a class="carousel-control-next" href="#pageCarousel-'.$instance.'" role="button" data-slide="next">
    	<span class="carousel-control-next-icon" aria-hidden="true"></span>
    	<span class="sr-only">Suivant</span>
  	</a>
		</div><!-- End carousel -->';

    return $output;
}


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

	wp_enqueue_style('chaletsetcaviar-ekko-lightbox-css', '//cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css', array(), '5.3.0');

	wp_enqueue_style('chaletsetcaviar-google-fonts', '//fonts.googleapis.com/css?family=Rozha+One');

	wp_enqueue_script( 'chaletsetcaviar-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'chaletsetcaviar-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'pooper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', false, '1.12.9', true ); // register the pooper js for BS

	wp_enqueue_script( 'chaletsetcaviar-bs-js', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array('jquery'), '4.0.0', true ); //And register the BS

	wp_enqueue_script('chaletsetcaviar-ekko-lightbox-js', '//cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js', array('jquery'), '5.3.0');

	wp_enqueue_script('chaletsetcaviar-script-js', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.0');

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
 * Register the sidebars.
 */
require get_template_directory() . '/inc/sidebars.php';

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
