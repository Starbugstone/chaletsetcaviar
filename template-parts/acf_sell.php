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
