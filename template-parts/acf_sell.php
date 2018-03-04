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

//Only on post page
if(is_single()){
  $surface = get_field('surface');
  if($surface){
    ?>
    <p class="propertySurface">
      Surface : <?=$surface?> m²
    </p>
    <?php
  }

  $ges = get_field('ges');
  if($ges){
    ?>
    <p class="ges">
      GES : <?=$ges?>
    </p>
    <?php
  }

  $classe_energetique = get_field('classe_energetique');
  if($classe_energetique){
    ?>
    <p class="classe_energetique">
      Classe Energetique : <?=$classe_energetique?>
    </p>
    <?php
  }

  $nombre_de_pieces = get_field('nombre_de_pieces');
  if($nombre_de_pieces){
    ?>
    <p class="nombre_de_pieces">
      Nombre de pieces : <?=$nombre_de_pieces?>
    </p>
    <?php
  }

}
