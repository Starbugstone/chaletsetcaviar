<?php
/**
 * Adding all the sidebars
 *
 * @package Chalets_et_caviar
 */
 function chaletsetcaviar_widgets_init(){
   register_sidebar( array(
   'name' => 'Footer Sidebar 1',
   'id' => 'footer-sidebar-1',
   'description' => 'Zone pied de page 1',
   'before_widget' => '<aside id="%1$s" class="widget %2$s">',
   'after_widget' => '</aside>',
   'before_title' => '<h3 class="widget-title">',
   'after_title' => '</h3>',
   ) );
   register_sidebar( array(
   'name' => 'Footer Sidebar 2',
   'id' => 'footer-sidebar-2',
   'description' => 'Zone pied de page 2',
   'before_widget' => '<aside id="%1$s" class="widget %2$s">',
   'after_widget' => '</aside>',
   'before_title' => '<h3 class="widget-title">',
   'after_title' => '</h3>',
   ) );
   register_sidebar( array(
   'name' => 'Footer Sidebar 3',
   'id' => 'footer-sidebar-3',
   'description' => 'Zone pied de page 3',
   'before_widget' => '<aside id="%1$s" class="widget %2$s">',
   'after_widget' => '</aside>',
   'before_title' => '<h3 class="widget-title">',
   'after_title' => '</h3>',
   ) );
 }
add_action('widgets_init', 'chaletsetcaviar_widgets_init');
