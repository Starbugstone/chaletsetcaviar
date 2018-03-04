<?php
//Grab the price
$sellPrice = get_field('prix_de_vente');

if($sellPrice){
  $sellPrice = number_format($sellPrice,2,","," ");
  ?>
  <p class="propertyPrice">
    Prix de vente : <?=$sellPrice?> Euros
  </p>
  <?php
}

$surface = get_field('surface');
if($surface){
  ?>
  <p class="propertySurface">
    Surface : <?=$surface?> m²
  </p>
  <?php
}
