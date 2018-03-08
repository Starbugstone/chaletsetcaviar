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

							<?php if ( get_edit_post_link() ) : ?>
								<footer class="entry-footer">
									<?php
										edit_post_link(
											sprintf(
												wp_kses(
													/* translators: %s: Name of current post. Only visible to screen readers */
													__( 'Edit <span class="screen-reader-text">%s</span>', 'chaletsetcaviar' ),
													array(
														'span' => array(
															'class' => array(),
														),
													)
												),
												get_the_title()
											),
											'<span class="edit-link">',
											'</span>'
										);
									?>
								</footer><!-- .entry-footer -->
							<?php endif; ?>
						</article><!-- #post-<?php the_ID(); ?> -->
					<?php
						//get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						// if ( comments_open() || get_comments_number() ) :
						// 	comments_template();
						// endif;

					endwhile; // End of the loop.
					?>

				</div><!-- End Row -->
			</div> <!-- End Container-fluid -->



		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
