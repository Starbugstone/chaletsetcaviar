<div class="row">
  <?php
  //Grab the price
  $sellPrice = get_field('prix_de_vente');

  if($sellPrice){
    $sellPrice = number_format($sellPrice,2,","," ");
    $iconLogo = get_template_directory_uri().'/img/icons/money.png';
    ?>
    <div class="col-lg-4 col-md-6 text-center">
      <img src="<?=$iconLogo?>" alt="prix" title="Prix de vente" />
      <p class="propertyPrice">
        <?=$sellPrice?> €
      </p>
    </div>
    <?php
  }

    $surface = get_field('surface');
    $iconLogo = get_template_directory_uri().'/img/icons/surface.svg';
    if($surface){
      ?>
      <div class="col-lg-4 col-md-6 text-center">
        <img src="<?=$iconLogo?>" alt="Surface" title="Surface" />
        <p class="propertySurface">
          <?=$surface?> m²
        </p>
      </div>
      <?php
    }

    $nombre_de_pieces = get_field('nombre_de_pieces');
    if($nombre_de_pieces){
      $iconLogo = get_template_directory_uri().'/img/icons/lit.svg';
      ?>
      <div class="col-lg-4 col-md-6 text-center">
        <img src="<?=$iconLogo?>" alt="Pieces" title="Nombre de pieces" />
        <p class="nombre_de_pieces">
          <?=$nombre_de_pieces?> pieces
        </p>
      </div>
      <?php
    }
    ?>
</div>
  <?php
    //Only on post page
    if(is_single()){
      ?>
      <div class="row">
        <?php
        $ges = get_field_object('ges');
        if($ges){
          ?>
          <div class="col-xl-6">
            <p>GES</p>
            <?php
            //var_dump($ges);
            $gesVal = $ges['value'];
            $default = false;
            switch ($gesVal){
              case "A":
                $gesImg = get_template_directory_uri().'/img/ges/a.png';
                break;
              case "B":
                $gesImg = get_template_directory_uri().'/img/ges/b.png';
                break;
              case "C":
                $gesImg = get_template_directory_uri().'/img/ges/c.png';
                break;
              case "D":
                $gesImg = get_template_directory_uri().'/img/ges/d.png';
                break;
              case "E":
                $gesImg = get_template_directory_uri().'/img/ges/e.png';
                break;
              case "F":
                $gesImg = get_template_directory_uri().'/img/ges/f.png';
                break;
              case "G":
                $gesImg = get_template_directory_uri().'/img/ges/g.png';
                break;
              default:
                $default=true;
                $gesImg = get_template_directory_uri().'/img/ges/g.png';
            }
            if(!$default){
              ?>
              <img src="<?=$gesImg?>" alt="GES" />
              <?php
            }else{
              ?>
              <p>Non renseigné</p>
              <?php
            }
            ?>
          </div>
          <?php
        }

        $classe_energetique = get_field_object('classe_energetique');
        if($classe_energetique){
          ?>
          <div class="col-xl-6">
            <p>Classe Energetique</p>
            <?php
            //var_dump($ges);
            $dpeVal = $classe_energetique['value'];
            $default = false;
            switch ($dpeVal){
              case "A":
                $dpeImg = get_template_directory_uri().'/img/dpe/a.png';
                break;
              case "B":
                $dpeImg = get_template_directory_uri().'/img/dpe/b.png';
                break;
              case "C":
                $dpeImg = get_template_directory_uri().'/img/dpe/c.png';
                break;
              case "D":
                $dpeImg = get_template_directory_uri().'/img/dpe/d.png';
                break;
              case "E":
                $dpeImg = get_template_directory_uri().'/img/dpe/e.png';
                break;
              case "F":
                $dpeImg = get_template_directory_uri().'/img/dpe/f.png';
                break;
              case "G":
                $dpeImg = get_template_directory_uri().'/img/dpe/g.png';
                break;
              default:
                $default = true;
                $dpeImg = get_template_directory_uri().'/img/dpe/g.png';
            }
            if(!$default){
            ?>
              <img src="<?=$dpeImg?>" alt="DPE" />
            <?php
            }else{
            ?>
              <p>Non renseigné</p>
            <?php
            }
            ?>

          </div>
          <?php
        }
        ?>
      </div>
      <?php
    }
  ?>
