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
			$backgroundImage = get_template_directory_uri().'/img/search.jpg';

			?>

			<header class="page-header">
				<div class="full_bg_image" style="background-image: url('<?=$backgroundImage?>');"></div>
				<h1>Recherche : <?php echo get_search_query(); ?></h1>
			</header><!-- .page-header -->
			<div class="container-fluid">
				<div class="row">
					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();
						?>
						<div class="col-12 my-2 px-md-5">
							<?php

							get_template_part( 'template-parts/content_line');
							?>
						</div>
						<?php
					endwhile;
					?>
				</div>
			</div>
			<?php
			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
