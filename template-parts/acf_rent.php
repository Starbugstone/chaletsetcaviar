<?php

//grab the rent icons
$icons = get_field('icones');
if($icons){
  ?>
  <p class="rentIcons">
    <?php
    foreach ($icons as $icon) {
      echo getIcon($icon);
    }
    ?>
  </p>
<?php
} // End if icons
?>
<div class="row">
<?php
//Grab the price
$rentPrice = get_field('prix_par_semaine');
if($rentPrice){
  $rentPrice = number_format($rentPrice,2,","," ");
  $iconLogo = get_template_directory_uri().'/img/icons/money.png';
  ?>
  <div class="col-lg-4 col-md-6 text-center">
    <img src="<?=$iconLogo?>" alt="prix" title="Prix par semaine" />

    <p class="propertyPrice">
      <?=$rentPrice?> € / Sem
    </p>
  </div>
  <?php
}
//if(is_single()){
  $surface = get_field('surface');
  if($surface){
    $iconLogo = get_template_directory_uri().'/img/icons/surface.svg';
    ?>
    <div class="col-lg-4 col-md-6 text-center">
      <img src="<?=$iconLogo?>" alt="Surface" title="Surface" />
      <p class="propertySurface">
        <?=$surface?> m²
      </p>
    </div>
    <?php
  }

  $nombre_de_personnes = get_field('nombre_de_personnes');
  if($nombre_de_personnes){
    $iconLogo = get_template_directory_uri().'/img/icons/personnes.svg';
    ?>
    <div class="col-lg-4 col-md-6 text-center">
      <img src="<?=$iconLogo?>" alt="Surface" title="Surface" />
      <p class="nombre_de_personnes">
        <?=$nombre_de_personnes?> Personnes
      </p>
    </div>
    <?php
  }
//}
?>
</div>
