<?php
/**
 * Adding all the sidebars
 *
 * @package Chalets_et_caviar
 */
 function chaletsetcaviar_widgets_init(){
   register_sidebar( array(
   'name' => 'Pied de page 1',
   'id' => 'footer-sidebar-1',
   'description' => 'Zone pied de page 1',
   'before_widget' => '<aside id="%1$s" class="widget %2$s">',
   'after_widget' => '</aside>',
   'before_title' => '<h3 class="widget-title">',
   'after_title' => '</h3>',
   ) );
   register_sidebar( array(
   'name' => 'Pied de page 2',
   'id' => 'footer-sidebar-2',
   'description' => 'Zone pied de page 2',
   'before_widget' => '<aside id="%1$s" class="widget %2$s">',
   'after_widget' => '</aside>',
   'before_title' => '<h3 class="widget-title">',
   'after_title' => '</h3>',
   ) );
   register_sidebar( array(
   'name' => 'Pied de page 3',
   'id' => 'footer-sidebar-3',
   'description' => 'Zone pied de page 3',
   'before_widget' => '<aside id="%1$s" class="widget %2$s">',
   'after_widget' => '</aside>',
   'before_title' => '<h3 class="widget-title">',
   'after_title' => '</h3>',
   ) );
   register_sidebar( array(
   'name' => 'zone droite pages',
   'id' => 'page-sidebar-1',
   'description' => 'Zone a droite des pages',
   'before_widget' => '<div id="%1$s" class="widget %2$s">',
   'after_widget' => '</div>',
   'before_title' => '<h2 class="widget-title entry-title">',
   'after_title' => '</h2>',
   ) );
 }
add_action('widgets_init', 'chaletsetcaviar_widgets_init');
