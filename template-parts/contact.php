<?php
/**
 * Template part for displaying the search bar
 *
 * @package Chalets_et_caviar
 */
$contactId = get_theme_mod('contactId');
?>

<div id="contact-sidebar" class="d-print-none">
  <div id="contactForm" class="mr-2" style="display: none;">
    <p>demandez plus de renseignements</p>
    <?php echo do_shortcode( '[contact-form-7 id="'.$contactId.'" title="Formulaire de contact article"]' ); ?>
  </div>
  <div id="contactLogo" data-searching="no">
    <span class="fa fa-envelope-o fa-2x" aria-hidden="true"></span>
  </div>
</div>
