<?php
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
