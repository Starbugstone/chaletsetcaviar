<div class="index_article_post_image">
  <?php
  if(!is_single()){
    ?>
    <a class="index_article_post_image_link" href="<?php the_permalink(); ?>">
    <?php
  }else{
    ?>
    <p class="index_article_post_image_link">
    <?php
  }
   ?>
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

  if(!is_single()){
    ?>
  </a>
    <?php
  }else{
    ?>
  </p>
    <?php
  }
  ?>
</div>