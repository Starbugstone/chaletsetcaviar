<?php

function getIcon($i){
  $returniconHTML = geticonHtml('question', 'Option inconnu');
  switch($i){
    case 'Wifi':
      $returniconHTML = geticonHtml('wifi', 'Wifi');
      break;
    case 'PMR':
      $returniconHTML = geticonHtml('wheelchair', 'Acces PMR');
      break;
    case 'Animaux':
      $returniconHTML = geticonHtml('paw', 'Animaux Admis');
      break;
    case 'Television':
      $returniconHTML = geticonHtml('television', 'Television');
      break;
    case 'Parking':
      $returniconHTML = geticonHtml('car', 'Parking');
      break;
    case 'Restaurant':
      $returniconHTML = geticonHtml('cutlery', 'Restaurant à proximité');
      break;
  }
  return $returniconHTML;
}

function geticonHtml($iconID, $iconTitle){
  $returniconHTML = '<span class="fa fa-'.$iconID.'" aria-hidden="true" title="'.$iconTitle.'"></span>';
  return $returniconHTML;
}
