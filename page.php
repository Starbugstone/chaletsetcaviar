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
				?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-10 category-listing'); ?>>
						<header class="entry-header">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
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
				endwhile; // End of the loop.
				?>
			</div><!-- End Row -->
		</div> <!-- End Container-fluid -->

	</main><!-- #main -->
</div><!-- #primary -->
<?php // Edit Link
if ( get_edit_post_link() ) : ?>
	<div class="editLink">
		<a href="<?php get_edit_post_link(); ?>" class="btn btn-dark">
			Editer le post
		</a>
	</div><!-- .editLink -->
<?php endif; ?>
<?php
//get_sidebar();
get_footer();
