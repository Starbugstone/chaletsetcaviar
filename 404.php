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
			//set default background image
			$backgroundImage = get_template_directory_uri().'/img/skiFall.jpg';
			?>

			<header class="page-header">
				<div class="full_bg_image" style="background-image: url('<?=$backgroundImage?>');"></div>

			</header><!-- .page-header -->
			<div class="container-fluid">
				<div class="row mt-2 align-items-center justify-content-md-center">
					<div class="col-md-5 col-lg-4">
						<h1>Il n'y a rien ici</h1>
						<p>Essayez d'utilizer la recherche</p>
					</div>
					<div class="col-md-4">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
				<?php
				the_posts_navigation();
 				?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
