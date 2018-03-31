<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Chalets_et_caviar
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer py-2 px-4 container-fluid">
		<div class="row px-3 d-print-none">
			<div class="col-md-4 text-left">
				<?php
				if(is_active_sidebar('footer-sidebar-1')){
					dynamic_sidebar('footer-sidebar-1');
				}
				?>
			</div>
			<div class="col-md-4 text-center">
				<?php
				if(is_active_sidebar('footer-sidebar-2')){
					dynamic_sidebar('footer-sidebar-2');
				}
				?>
			</div>
			<div class="col-md-4 text-right">
				<?php
				if(is_active_sidebar('footer-sidebar-3')){
					dynamic_sidebar('footer-sidebar-3');
				}
				?>
			</div>
		</div>
		<div class="row float-right">
			<div class="site-info">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'chaletsetcaviar' ) ); ?>"><?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Proudly powered by %s', 'chaletsetcaviar' ), 'WordPress' );
				?></a>
				<span class="sep"> | </span>
				<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( 'Theme: %1$s by %2$s.', 'chaletsetcaviar' ), 'chaletsetcaviar', '<a href="https://starbugstone.eu">StarbugStone</a>' );
				?>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
