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
			The Carrousel
			====================================================
			*/
			?>

			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

				<div class="carousel-inner" role="listbox">

					<?php //Need to add a loop connected to customizer
					for ($i=1; $i < 6; $i++) {
						$image = get_theme_mod('carousel_image_'.$i);
						$title = get_theme_mod('carousel_image_title_'.$i);
						$subtitle = get_theme_mod('carousel_image_subtitle_'.$i);

						if($i ==1){
							if ($image == null){
								$image = get_template_directory_uri().'/img/default_carousel.jpg';
							}
							$carouselItemClass = 'carousel-item active';
						}else{
							$carouselItemClass = 'carousel-item';
						}

						if($image != null){

							?>
							<div class="<?=$carouselItemClass?>" style="background-image: url('<?=$image?>')">
								<div class="carousel-caption d-none d-md-block">
									<h2><?=$title?></h2>
									<p><?=$subtitle?></p>
								</div>
							</div>
							<?php
						}
						//echo $image.'<br>';
						$title = get_theme_mod('carousel_image_title_'.$i);
						//echo $title.'<br><br>';
					}//end For loop
					?>

				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Precedent</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Suivant</span>
				</a>
			</div>
		</div>
			<?php
			/*
			====================================================
			End of the carousel
			====================================================
			*/
			?>
			<section class="container-fluid">
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
					$do_not_duplicate = array();  //empty array that we will fill to avoid duplicates

					foreach ( $categories as $category ) {
						$args = array(
							'cat' => $category->term_id,
							'post_type' => 'post',
							'posts_per_page' => 3,
							'post__not_in' => $do_not_duplicate
						);
						$query = new WP_Query( $args );
						if ( $query->have_posts() ) { ?>

						    <section class="<?php echo $category->slug; ?> listing">
						        <!--<h2>Dernieres <?php echo $category->name; ?>:</h2>-->
										<h2><a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php echo (__( 'Last', 'chaletsetcaviar' )." ". $category->name);?></a></h2>
										<div class="row  justify-content-center">
							        <?php while ( $query->have_posts() ) {

												$postCount =  $query->post_count;
												if($postCount >2){
													$mdClass = "col-md-4";
												}elseif ($postCount = 2) {
													$mdClass = "col-md-6";
												}else{
													$mdClass = "col-md-8";
												}
							            $query->the_post();
													$do_not_duplicate[] = get_the_ID(); //store the ID of each post into the array. this post will no longer apear in the other sections

							            ?>


													<div class="<?=$mdClass?> postCol">
														<?php
								            get_template_part( 'template-parts/content_col');
														?>
													</div>

							        <?php } // end while ?>
										</div>

						    </section>
								<hr />
						<?php } // end if

						// Use reset to restore original query.
						wp_reset_postdata();
						//echo('<hr>');
					} //end foreach categories

				} //endif; ?>
			</section><!-- end container section  -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar(); //EDIT : No sidebar needed
get_footer();
