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


//Grab the price
$rentPrice = get_field('prix_par_semaine');
if($rentPrice){
  $rentPrice = number_format($rentPrice,2,","," ");
  ?>
  <p class="propertyPrice">
    Prix par semaine : <?=$rentPrice?> Euros Charges Comprises
  </p>
  <?php
}
if(is_single()){
  $surface = get_field('surface');
  if($surface){
    ?>
    <p class="propertySurface">
      Surface : <?=$surface?> m²
    </p>
    <?php
  }

  $nombre_de_personnes = get_field('nombre_de_personnes');
  if($nombre_de_personnes){
    ?>
    <p class="nombre_de_personnes">
      Nombre de personnes : <?=$nombre_de_personnes?> m²
    </p>
    <?php
  }
}
