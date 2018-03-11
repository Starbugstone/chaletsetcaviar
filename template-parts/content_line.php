<?php
/**
 * Template part for displaying posts in a 3x3 grid with bootstrap
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Chalets_et_caviar
 */

?>


  <article id="post-<?php the_ID(); ?>" <?php post_class( 'category-listing hoverLine postArticle' ); ?> data-post-link="<?php the_permalink(); ?>">
    <div class="row justify-content-center no-gutters">
      <div class="col-md-10 text-center">
        <h2 class="entry-title">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
      </div>
    </div>

    <div class="row align-items-center no-gutters">
      <div class="col-md-3">
        <?php
        get_template_part( 'template-parts/article_image');
        ?>
      </div>
      <div class="col-md-4 px-2 text-center">
        <?php
        // checking if sell or rent
        $typeOfProperty = get_field('type_de_bien');
        if($typeOfProperty == 'rent'){
          get_template_part( 'template-parts/acf_rent');
        }
        if($typeOfProperty == 'sell'){
          get_template_part( 'template-parts/acf_sell');
        }
        ?>
      </div>
      <div class="col-md-5 pr-2 text-justify ">
        <?php the_excerpt(  ); ?>
      </div>
    </div>
  </article>
