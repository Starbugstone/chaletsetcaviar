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
				<div class="row">
					<?php
					while ( have_posts() ) : the_post();
					?>

						<div class="col-md-4">
					    <?php
							//grab the image
							get_template_part( 'template-parts/article_image');
							//Get the legal stuff
							?>
							<div class="sidebarDetails">
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
								<p class="returnToCategory"><a href="<?php echo get_category_link($category[0]->term_id); ?>">Autres <?=$category[0]->name?></a></p>
							</div>
						</div>
						<div class="col-md-8">
							<?php
							the_title( '<h1 class="entry-title">', '</h1>' );
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
get_footer();
