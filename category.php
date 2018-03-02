<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Chalets_et_caviar
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :
			// get the current taxonomy term
			$term = get_queried_object();

			//set default background image
			$backgroundImage = get_template_directory_uri().'/img/default_header.jpg';

			//update with ACF field
			if(get_field('image_dentete', $term)){
				$backgroundImage = get_field('image_dentete', $term);
			}
			?>

			<header class="page-header">
				<div class="full_bg_image" style="background-image: url('<?=$backgroundImage?>');"></div>
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );

				?>
			</header><!-- .page-header -->
			<section class="container-fluid">
				<div class="row">
					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content_col3', get_post_format() );

					endwhile;
					?>
				</div>
			</section>
			<?php
			//the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
