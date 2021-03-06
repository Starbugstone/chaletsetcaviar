<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Chalets_et_caviar
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<div class="container-fluid singlePost">
			<div class="row justify-content-center">

				<?php
				while ( have_posts() ) : the_post();

				if(is_active_sidebar('page-sidebar-1')){
					$widthClass = "col-lg-6 mr-lg-3 pt-1";
				}else{
					$widthClass = "col-lg-10 pt-1";
				}

				?>

					<article id="post-<?php the_ID(); ?>" <?php post_class($widthClass.' category-listing'); ?>>
						<header class="entry-header">
							<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
						</header><!-- .entry-header -->

						<?php chaletsetcaviar_post_thumbnail(); ?>

						<div class="entry-content">
							<?php
								the_content();

								wp_link_pages( array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'chaletsetcaviar' ),
									'after'  => '</div>',
								) );
							?>
						</div><!-- .entry-content -->
					</article><!-- #post-<?php the_ID(); ?> -->

					<?php
					if(is_active_sidebar('page-sidebar-1')){
						?>
						<aside class="col-lg-4 category-listing pageSidebar pt-1">
							<?php
							dynamic_sidebar('page-sidebar-1');
							?>
						</aside>
						<?php
					}
					?>

					<?php // Edit Link
					if ( get_edit_post_link() ) : ?>
						<div class="editLink">
							<a href="<?php echo get_edit_post_link(); ?>" class="btn btn-dark">
								Editer le post
							</a>
						</div><!-- .editLink -->
					<?php endif; ?>
				<?php
				endwhile; // End of the loop.
				?>
			</div><!-- End Row -->
		</div> <!-- End Container-fluid -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_template_part( 'template-parts/searchbar');
//get_sidebar();
get_footer();
