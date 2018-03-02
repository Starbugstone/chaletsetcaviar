<?php
/**
 * Template part for displaying posts in a 3x3 grid with bootstrap
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Chalets_et_caviar
 */

?>

<div class="col-md-4">
  <article id="post-<?php the_ID(); ?>" <?php post_class( 'category-listing' ); ?>>
    <h3 class="entry-title">
        <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
        </a>
    </h3>
    <div class="index_article_post_image">
      <a class="index_article_post_image_link" href="<?php the_permalink(); ?>">
      <?php
      if ( has_post_thumbnail() ){
          the_post_thumbnail( array(400,300), array('alt' => esc_attr( get_the_title() )  ) );
      }else{
        //default image
        $defaultImageUri = get_template_directory_uri().'/img/image_non_disponible.png';
        echo '<img src="'.$defaultImageUri.'" alt="Pas d\'image" />';
      }

      /*
      =====================================
      Get  additionnel Images
      =====================================
      */
      if(get_field('coup_de_coeur')){
        ?>
        <span class="overlayIcons coup_de_coeur"><img src="<?php echo (get_template_directory_uri().'/img/coup_de_coeur.png'); ?>" alt="Coup de coeur"></span>
        <?php
      }

      if(get_field('vendu')){
        ?>
        <span class="overlayIcons vendu"><img src="<?php echo (get_template_directory_uri().'/img/vendu.png'); ?>" alt="Produit Vendu"></span>
        <?php
      }
      ?>
      </a>
    </div>

      <?php the_excerpt(  ); ?>

  </article>
</div>
