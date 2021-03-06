<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
					get_template_part( 'template-parts/contact');
					?>
						<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-10 category-listing'); ?>>
							<div class="row">
								<div class="col-md-4 mt-3">
							    <?php
									//grab the image
									get_template_part( 'template-parts/article_image');
									//Get the legal stuff
									?>
									<div class="sidebarDetails px-2 py-1  mt-2">
										<?php
										$typeOfProperty = get_field('type_de_bien');
								    if($typeOfProperty == 'rent'){
								      get_template_part( 'template-parts/acf_rent');
								    }
								    if($typeOfProperty == 'sell'){
								      get_template_part( 'template-parts/acf_sell');
								    }
										$category = get_the_category();
										?>
										<p class="returnToCategory d-print-none"><a href="<?php echo get_category_link($category[0]->term_id); ?>">Autres <?=$category[0]->name?></a></p>
									</div>
								</div>
								<div class="col-md-8">
									<?php
									the_title( '<h2 class="entry-title">', '</h2>' );
									?>
									<div class="entry-content">
										<?php
											the_content( sprintf(
												wp_kses(
													/* translators: %s: Name of current post. Only visible to screen readers */
													__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'chaletsetcaviar' ),
													array(
														'span' => array(
															'class' => array(),
														),
													)
												),
												get_the_title()
											) );

											wp_link_pages( array(
												'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'chaletsetcaviar' ),
												'after'  => '</div>',
											) );
										?>
									</div><!-- .entry-content -->

								</div>

								<?php // Edit Link
								if ( get_edit_post_link() ) : ?>
									<div class="editLink d-print-none">
										<a href="<?php echo get_edit_post_link(); ?>" class="btn btn-dark">
											Editer le post
										</a>
									</div><!-- .editLink -->
								<?php endif; ?>
							</div><!-- End Row -->
						</article>
					<?php
					endwhile; // End of the loop.
					?>
				</div>
			</div> <!-- End Container-fluid -->


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_template_part( 'template-parts/searchbar');
get_footer();
