<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Chalets_et_caviar
 */

get_header(); ?>

	<div id="primary" class="main-content-area content-area">
		<main id="main" class="site-main">

			<?php
			/*
			====================================================
			Testing the Carrousel, need to WORDPRESS IT
			====================================================
			*/
			?>
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<?php //Need to add a loop connected to customizer ?>
					<!-- Slide One - Set the background image for this slide in the line below -->
					<div class="carousel-item active" style="background-image: url('http://www.appartements-exception.com/wp-content/uploads/sites/2/2016/08/503160068.jpg')">
						<div class="carousel-caption d-none d-md-block">
							<h3>First Slide</h3>
							<p>This is a description for the first slide.</p>
						</div>
					</div>
					<!-- Slide Two - Set the background image for this slide in the line below -->
					<div class="carousel-item" style="background-image: url('http://www.courchevel.com/images/upload/video_home/visuel_fin_home_amis_42.jpg')">
						<div class="carousel-caption d-none d-md-block">
							<h3>Second Slide</h3>
							<p>This is a description for the second slide.</p>
						</div>
					</div>
					<!-- Slide Three - Set the background image for this slide in the line below -->
					<div class="carousel-item" style="background-image: url('https://holidaze.reslogic.com/photos/ff_dFRCO3.jpg')">
						<div class="carousel-caption d-none d-md-block">
							<h3>Third Slide</h3>
							<p>This is a description for the third slide.</p>
						</div>
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Precedent</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Suivant</span>
				</a>
			</div>
			<?php
			/*
			====================================================
			Testing the Carrousel, need to WORDPRESS IT
			====================================================
			*/
			?>

		<?php
		if ( have_posts() ) {

			if ( is_home() && ! is_front_page() ) { ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			}	//endif;
			/*
			====================================================
			Get all the categories and grab the first 3 posts
			====================================================
			*/
			$categories = get_categories();

			foreach ( $categories as $category ) {
				//var_dump($category);
				$args = array(
					'cat' => $category->term_id,
					'post_type' => 'post',
					'posts_per_page' => 3
				);
				$query = new WP_Query( $args );
				//var_dump($query);
				if ( $query->have_posts() ) { ?>

				    <section class="<?php echo $category->slug; ?> listing">
				        <h2>Dernieres <?php echo $category->name; ?>:</h2>
								<div class="row align-items-center">
					        <?php while ( $query->have_posts() ) {

					            $query->the_post();
					            ?>
											<div class="col-md-4">
						            <article id="post-<?php the_ID(); ?>" <?php post_class( 'category-listing' ); ?>>
						                <?php if ( has_post_thumbnail() ) { ?>
						                    <a href="<?php the_permalink(); ?>">
						                        <?php the_post_thumbnail( 'medium' ); //Medium is 300x300 ?>
						                    </a>
						                <?php } ?>

						                <h3 class="entry-title">
						                    <a href="<?php the_permalink(); ?>">
						                        <?php the_title(); ?>
						                    </a>
						                </h3>

						                <?php the_excerpt(  ); ?>

						            </article>
											</div>

					        <?php } // end while ?>
								</div>

				    </section>

				<?php } // end if

				// Use reset to restore original query.
				wp_reset_postdata();
				echo('<hr>');
			} //end foreach categories

		} //endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar(); //EDIT : No sidebar needed
get_footer();
