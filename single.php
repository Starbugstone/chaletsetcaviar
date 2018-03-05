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
							?>
					</div>
						<?php
						?>
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
						/*get_template_part( 'template-parts/content', get_post_type() );

						the_post_navigation();
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;*/

					endwhile; // End of the loop.
					?>
				</div>
			</div>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
