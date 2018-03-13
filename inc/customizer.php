<?php
/**
 * Chalets et caviar Theme Customizer
 *
 * @package Chalets_et_caviar
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function chaletsetcaviar_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'chaletsetcaviar_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'chaletsetcaviar_customize_partial_blogdescription',
		) );
	}

	//Custom Settings for the carousel
	//https://premium.wpmudev.org/blog/wordpress-theme-customizer-guide/
	//https://developer.wordpress.org/themes/customize-api/customizer-objects/
	$wp_customize->add_section( 'chaletsetcaviar_carousel' , array(
    'title'      => 'Carrousel',
    'priority'   => 30,
	) );

	//
	for ($i=1; $i < 6; $i++) {
		if($i == 1){
			$defaultCarouselImage = get_template_directory_uri().'/img/default_carousel.jpg';
			//echo($defaultCarouselImage);
		}else{
			$defaultCarouselImage = '';
		}
		$wp_customize->add_setting( 'carousel_image_'.$i , array(
	    'default'     => $defaultCarouselImage,
	    'transport'   => 'refresh',
		) );

		$wp_customize->add_setting( 'carousel_image_title_'.$i , array(
	    'transport'   => 'refresh',
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		) );

		$wp_customize->add_setting( 'carousel_image_subtitle_'.$i , array(
	    'transport'   => 'refresh',
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image_control_'.$i, array(
			'label' => 'Image du Carrousel '.$i,
		  'section' => 'chaletsetcaviar_carousel',
			'settings'   => 'carousel_image_'.$i,
		) ) );

		$wp_customize->add_control( 'image_control_title_'.$i, array(
			'type' => 'text',
			'label' => 'Titre du Carrousel '.$i,
		  'section' => 'chaletsetcaviar_carousel',
			'settings'   => 'carousel_image_title_'.$i,
		) );

		$wp_customize->add_control( 'image_control_subtitle_'.$i, array(
			'type' => 'text',
			'label' => 'Sous-titre du Carrousel '.$i,
		  'section' => 'chaletsetcaviar_carousel',
			'settings'   => 'carousel_image_subtitle_'.$i,
		) );
	}
}
add_action( 'customize_register', 'chaletsetcaviar_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function chaletsetcaviar_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function chaletsetcaviar_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function chaletsetcaviar_customize_preview_js() {
	wp_enqueue_script( 'chaletsetcaviar-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'chaletsetcaviar_customize_preview_js' );
