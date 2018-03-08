<div class="index_article_post_image">
  <?php
  if(!is_single()){
    ?>
    <a class="index_article_post_image_link hoverImage" href="<?php the_permalink(); ?>">
    <?php
  }else{
    ?>
    <span class="index_article_post_image_link">
    <?php
  }
   ?>
  <?php
  if( function_exists('has_post_thumbnail') ){
    if ( has_post_thumbnail() ){
      $post_thumbnail_id = get_post_thumbnail_id();
      $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
      //the_post_thumbnail( array(400,300), array('alt' => esc_attr( get_the_title() )  ) );
      echo ('<div class="postThumbnail" style="background-image : url('.$post_thumbnail_url.')">');

      echo ('</div>');
    }else{
      //default image
      $defaultImageUri = get_template_directory_uri().'/img/image_non_disponible.png';
      echo '<img src="'.$defaultImageUri.'" alt="Pas d\'image" />';
    }
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

  if(!is_single()){
    ?>
  </a>
    <?php
  }else{
    ?>
  </span>
    <?php
  }
  ?>
</div>
