<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Chalets_et_caviar
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function chaletsetcaviar_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'chaletsetcaviar_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function chaletsetcaviar_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'chaletsetcaviar_pingback_header' );

/*
* Adding classes to the prev and next buttons
*/
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="btn btn-light"';
}
